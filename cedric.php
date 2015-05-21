<?php
/**
 *  Copyright 2015 Nicolas Damiens <nicolas@damiens.info>
 * 
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */
if (file_exists('config.php'))
	require_once('config.php');

if (!defined('CEDRIC_DSN'))	define('CEDRIC_DSN', 'sqlite:cedric.sqlite');

define('CEDRIC_URL_BASE', 'http://nicolas.damiens.info/cedric/');
define('CEDRIC_MAIL_FROM', 'cedric@web-fr.org');

class cedric_db {
	public static function db($dsn=CEDRIC_DSN) {
		static $db;
		if (!isset($db)) {
			$db = new PDO($dsn);
		}
		return $db;
	}
}

class cedric_doc {
	protected $departement;
	protected $etablissement;
	protected $commune;
	protected $reference;
	protected $date_signature;
	protected $type_document;
	protected $modification;
	protected $doc_id;
	protected $utilisateur;

	public function __construct($id_or_array) {
		static $select_stmt;

		if (is_array($id_or_array)) {
			$vals = $id_or_array;

			// date signature
			if (preg_match("/^(\d+)\/(\d+)\/(\d+)$/", $vals[4], $m)) {
				$vals[4] = "{$m[3]}-{$m[2]}-{$m[1]}";
			}

			$this->departement = $vals[0];
			$this->etablissement = $vals[1];
			$this->commune = $vals[2];
			$this->reference = $vals[3];
			$this->date_signature = $vals[4];
			$this->type_document = $vals[5];
			$this->modification = $vals[6];
			$this->doc_id = $vals[7];
			$this->utilisateur = $vals[8];
		} else {
			if (!isset($select_stmt))
				$stmt = cedric_db::db()->prepare("select * from cedric_doc where doc_id=:doc_id");
			$stmt->execute(array(":doc_id" => $id_or_array));
			$r = $stmt->fetch(PDO::FETCH_ASSOC);
			foreach (array_keys($r) as $k)
				$this->$k = $r[$k];
		}
	}

	public function existe_en_base() {
		$stmt = cedric_db::db()->prepare("select count(*) as n from cedric_doc where doc_id=:doc_id");
		$stmt->execute(array(":doc_id" => $this->doc_id));
		$r = $stmt->fetch();
		if (!$r) {
			print_r(cedric_db::db()->errorInfo());	
			throw new Exception('query...');
		}
		return $r['n'] > 0;
	}

	public function enregistre() {
		$fields_str = "departement,etablissement,commune,reference,date_signature,type_document,modification,doc_id,utilisateur";
		$fields = explode(",",$fields_str);
		$sql = "insert into cedric_doc ($fields_str) values (";
		$data = array();
		foreach ($fields as $f) {
			$sql .= ":$f,";
			$data[":$f"] = $this->$f;
		}
		$sql = trim($sql,",").")";

		$stmt = cedric_db::db()->prepare($sql);
		echo "enregistre {$this->doc_id}\n";
		if ($stmt->execute($data)) {
			return new cedric_doc($this->doc_id);
		}
		return false;
	}

	private function pdf_path() {
		$dir = strftime("docs/%Y", strtotime($this->date_signature));
		if (!file_exists($dir))
			mkdir($dir);
		return "$dir/{$this->doc_id}.pdf";
	}

	public function dl_pdf() {
		if (file_exists($this->pdf_path()))
			return true;
		$cs = new cedric_site();
		$cs->dl_pdf($this->utilisateur, $this->doc_id, $this->pdf_path());
	}

	public function fixe_date() {
		if (preg_match("/^(\d+)\/(\d+)\/(\d+)$/", $this->date_signature, $m)) {
			$stmt = cedric_db::db()->prepare("update cedric_doc set date_signature=:date where doc_id=:doc_id");
			if (!$stmt) {
				print_r(cedric_db::db()->errorInfo());	
				exit();
			}
			$stmt->execute(array(":date"=> "{$m[3]}-{$m[2]}-{$m[1]}", ":doc_id" => $this->doc_id));
		}
	}

	public static function new_by_row($dom_tr_element,$utilisateur) {
		$vals = array();
		foreach ($dom_tr_element->getElementsByTagName('td') as $td) {
			$vals[] = trim($td->nodeValue);
		}
		$onclick = $dom_tr_element->getAttribute('onclick');
		if (preg_match("/^window.location='document.aspx\?documentId=(.*)'$/", $onclick, $m)) {
			$vals[7] = $m[1];
		} else {
			$vals[7] = "onclick: $onclick";
		}
		$vals[8] = $utilisateur;
		return new cedric_doc($vals);
	}

	public function avertir_utilisateur($destinataire) {
		require_once('Mail.php');
		require_once('Mail/mime.php');
		$chemin = CEDRIC_URL_BASE.$this->pdf_path();
		$entetes['From'] = CEDRIC_MAIL_FROM;
		$entetes['To'] = $destinataire;
		$entetes['Subject'] = "[CEDRIC] {$this->type_document} : {$this->etablissement}";
		$parametres['sendmail_path'] = '/usr/lib/sendmail';

		$corps_html = "
Bonjour,

Un nouveau document <b>{$this->etablissement}</b> a été trouvé sur la base CEDRIC.

<ul>
	<li>Département : {$this->departement}</li>
	<li>Etablissement : {$this->etablissement}</li>
	<li>Commune : {$this->commune}</li>
	<li>Référence : {$this->reference}</li>
	<li>Date signature : {$this->date_signature}</li>
	<li>Type de document :{$this->type_document}</li>
</ul>

<a href=\"$chemin\">Télécharger le PDF</a>
<br/><br/>
<small>utilisateur CEDRIC : {$this->utilisateur}</small>
";
		$mail =& Mail::factory('sendmail', $parametres);
		$params['head_charset'] = "utf-8";
		$params['text_charset'] = "utf-8";
		$params['html_charset'] = "utf-8";

		$mime = new Mail_mime($params);
		$mime->setHTMLBody($corps_html);

		$headers = $mime->headers($entetes);
		$mail->send($entetes['To'], $headers, $mime->get());

	}

}

class cedric_site {
	private $cookie_jar;
	private $ch; // curl handler

	private function login($utilisateur) {
		$this->ch = curl_init();
		$this->cookie_jar = tempnam('/tmp','cookie');
		$url_login = "http://cedric-dgpr.developpement-durable.gouv.fr/bddpi.aspx?utilisateur=$utilisateur";
		error_log("login: $url_login");
		curl_setopt($this->ch, CURLOPT_URL, $url_login);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie_jar);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);

		$r = curl_exec($this->ch);
		return $this->find_fields_with__($r);

	}
	private function find_fields_with__($html) {
		$tidy = tidy_parse_string($html, array('clean' => 'yes', 'output-html' => 'yes'), 'utf8');
		$tidy->cleanRepair();

		$doc = new DOMDocument();
		if (!$doc->loadHTML($tidy))
			throw new Exception('échec du chargement');

		$fields = array();
		foreach ($doc->getElementsByTagName('input') as $e) {
			$nom = $e->getAttribute('name');
			$val = $e->getAttribute('value');
			if (preg_match('/^__.+/',$nom)) {
				$fields[$nom] = $val;
			}
		}

		return $fields;

	}

	public function dl_pdf($utilisateur, $doc_id, $path_dest) {
		$this->login($utilisateur);
		$fields = array(
			"btnExportPdf" => "Afficher en Pdf"
		);
		curl_setopt($this->ch, CURLOPT_URL, "http://cedric-dgpr.developpement-durable.gouv.fr/recherche/document.aspx?documentId=$doc_id");
		$r = curl_exec($this->ch);
		$fields2 = $this->find_fields_with__($r);
		$fields = array_merge($fields,$fields2);
		
		$fo = fopen($path_dest,'w');
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($this->ch, CURLOPT_FILE, $fo);

		curl_exec($this->ch);
		fclose($fo);

	}

	public function liste_docs($utilisateur,$save_new=false,$alerte=false,$destinataires=null) {
		$fields = array(
			"btnRechercher" => "Rechercher",
			"ddlPrefecture" => "00000000-0000-0000-0000-000000000000",
			"ddlSignature" => "Egal",
			"ddlType" => "00000000-0000-0000-0000-000000000000",
			"rblCombinaison" => "0",
			"txtAnnee" => "",
			"txtMotsCles" => "",
			"txtReference" => "",
			"txtSignature1" => ""
		);

		$fields2 = $this->login($utilisateur);
		$fields = array_merge($fields, $fields2);

		curl_setopt($this->ch, CURLOPT_URL, "http://cedric-dgpr.developpement-durable.gouv.fr/recherche/rechercher.aspx");
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $fields);
	//	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
		$r = curl_exec($this->ch);

		curl_setopt($this->ch, CURLOPT_URL, "http://cedric-dgpr.developpement-durable.gouv.fr/recherche/rechercher.aspx?page=1&lignes=9999");

		$r = curl_exec($this->ch);
		$tidy = tidy_parse_string($r, array(
			'clean' => 'yes',
			'output-html' => 'yes',
			'char-encoding' => 'utf8',
			'input-encoding' => 'utf8',
			'output-encoding' => 'utf8',
			'output-xhtml' => true,
			'indent' => true
		));
		$tidy->cleanRepair();
		$doc = new DOMDocument();
		if (!$doc->loadHTML('<?xml encoding="UTF-8">'.$tidy))
			throw new Exception('échec du chargement');

		$n_tr = 0;
		$n_tr_tab = 0;
		$n_enreg = 0;
		foreach ($doc->getElementsByTagName('tr') as $tr) {
			$n_tr++;
			$class = $tr->getAttribute('class');
			if ($class != 'GrilleLignePair' && $class != 'GrilleLigneImpair')
				continue;
			$n_tr_tab++;
			$row = cedric_doc::new_by_row($tr,$utilisateur);
			if ($save_new && !$row->existe_en_base()) {
				if ($row->enregistre())
					$row->dl_pdf();
				if ($alerte) 
					foreach ($destinataires as $dest)
						$row->avertir_utilisateur($dest);
				$n_enreg++;
			}
		}
		error_log("n rows=$n_tr, tab rows=$n_tr_tab, n_enreg=$n_enreg"); 
	}
}
?>
