<?php
/**
 * Copyright (C) 2018 Nicolas Damiens nicolas@damiens.info
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace ND\Cedric;

use GuzzleHttp\Client;
use ND\Cedric\Propel\InstallationClasseeQuery;
use ND\Cedric\Propel\InstallationClassee;
use ND\Cedric\Propel\InstallationClasseeCategorie;
use ND\Cedric\Propel\InstallationClasseeCategorieQuery;
use ND\Cedric\Propel\InstallationDoc;
use ND\Cedric\Propel\InstallationDocQuery;

class Source {
  const URL_LIST = "http://www.installationsclassees.developpement-durable.gouv.fr/ic_export.php";
  const URL_FICHE = "http://www.installationsclassees.developpement-durable.gouv.fr/ficheEtablissement.php";

  public function updateFiche(InstallationClassee $ic) {
    $client = new Client();
    list($champEtablBase,$champEtablNumero) = explode(".", $ic->getId());
    $response = $client->request("GET", self::URL_FICHE, [
      'query' => [
        "champEtablBase" => $champEtablBase,
        "champEtablNumero" => $champEtablNumero
      ]
    ]);
  }

  public function extractDocuments(\DOMElement $tableau) {
    $docs = [];
    foreach ($tableau->getElementsByTagName("tr") as $tr) {
      if ($tr->getAttribute("class") == "listeEtablenTete") {
        // skip head
        continue;
      }
      $cols = [];
      foreach ($tr->getElementsByTagName("td") as $td) {
        $cols[] = $td->nodeValue;
      }
      list($date,$type,$description,) = $cols;

      foreach ($tr->getElementsByTagName("a") as $a) {
        $url = $a->getAttribute("href");
      }

      $doc = new InstallationDoc();
      $doc->setId(hash("sha256", $url));
      list($j,$m,$a) = explode("/", $date);
      $doc->setDateDoc(new \DateTime("$a-$m-$j"));
      $doc->setTypeDoc($type);
      $doc->setUrlDoc($url);
      $doc->setDescription(trim($description));
      $docs[$doc->getId()] = $doc;
    }
    return $docs;
  }

  public function extractCategories(\DOMElement $tableau) {
    $n = 0;
    $cats = [];
    foreach ($tableau->getElementsByTagName("tr") as $tr) {
      if ($tr->getAttribute("class") == "listeEtablenTete") {
        // skip head
        continue;
      }
      $cols = [];
      foreach ($tr->getElementsByTagName("td") as $td) {
        $cols[] = $td->nodeValue;
      }
      list($rubrique,$alinea,$date_autorisation,$regime,$activite,$volume,$unite) = $cols;
      $id = hash("sha256", join(" ", $cols)." ".$n);
      $n += 1;
      $cat = new InstallationClasseeCategorie();
      $cat->setId($id);
      $cat->setRubriqueIc($rubrique);
      $cat->setAlinea($alinea);
      $cat->setDateAutorisation($date_autorisation);
      $cat->setRegime($regime);
      $cat->setActivite($activite);
      $cat->setVolume($volume);
      $cat->setUnite($unite);
      $cats[$id] = $cat;
    }
    return $cats;
  }

  public function saveCategories(InstallationClassee $ic, array $cats) {
    $catsInDb = InstallationClasseeCategorieQuery::create()->filterByInstallationId($ic->getId())->find();
    $hashInDb = [];
    //echo "cats => ".count($catsInDb)."\n";
    foreach ($catsInDb as $catDb) {
      $hashInDb[] = $catDb->getId();
    }
    $hashDejaPresent = [];
    $n_new = 0;
    foreach ($cats as $cat) {
      if (in_array($cat->getId(),$hashInDb)) {
        $hashDejaPresent[] = $cat->getId();
        continue;
      } else {
        $n_new += 1;
        $cat->setInstallationClassee($ic);
        $cat->save();
      }
    }
    $toDelete = array_diff($hashInDb, $hashDejaPresent);
    foreach ($toDelete as $cat) {
      $cat->delete();
    }
    return [count($hashInDb), $n_new];
  }

  public function saveDocuments(InstallationClassee $ic, array $docs) {
    $docsInDb = InstallationDocQuery::create()->filterByInstallationId($ic->getId());
    $hashInDb = [];
    foreach ($docsInDb as $doc) {
      $hashInDb[] = $doc->getId();
    }
    $n_new = 0;
    foreach ($docs as $doc) {
      if (in_array($doc->getId(), $hashInDb)) {
        continue;
      }
      // FIXME notification
      $doc->setInstallationClassee($ic);
      $doc->save();
      $n_new += 1;
    }
    return [count($hashInDb), $n_new];
  }

  public function parseFicheHtml(string $htmlstring) {
    $doc = new \DOMDocument();

    // il y a des lignes de tableau qui commencent avec un th et termine
    // avec un td, comme elle sont facile a repérer on va les corriger
    $lignes = explode("\n", $htmlstring);
    $htmlstring2 = "";
    $n = 0;
    foreach ($lignes as $ligne) {
      $n++;
      if (preg_match("/<th .*>(.*)<\/td>/", $ligne, $m)) {
        $htmlstring2 .= "<th>{$m[1]}</th>\n";
      } else {
        $htmlstring2 .= $ligne."\n";
      }
    }
    $doc->loadHTML($htmlstring2, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    // cherche la <div> centre
    $centre = $doc->getElementById("centre");

    // de là on va chercher les tableaux, on les distinguera avec l'attribut "summary"
    $tableaux = $centre->getElementsByTagName("table");
    $docs = [];
    $cats = [];
    foreach ($tableaux as $tableau) {
      $summary = $tableau->getAttribute("summary");
      //echo "$summary ".get_class($tableau)."\n";
      switch ($summary) {
        case "liste des résultats":
          // catégories IC
          $cats = $this->extractCategories($tableau);
          break;
        case "liste des documents disponibles":
          $docs = $this->extractDocuments($tableau);
          break;
      }
    }
    return [
      "docs" => $docs,
      "cats" => $cats
    ];
  }

  public function downloadList() {
    $f = tempnam(sys_get_temp_dir(), "ic_csv");
    $client = new Client();
    $client->request('GET', self::URL_LIST, ['sink' => $f]);
    error_log("tempfile $f");
    return $f;
  }

  public function updateDb($sourcePath=null) {
    if (is_null($sourcePath)) {
      $sourcePath = $this->downloadList();
    }

    if (!file_exists($sourcePath)) {
      throw new \Exception("file not found : $sourcePath");
    }

    $f = fopen($sourcePath, "r");
    error_log("first row :" .fgets($f)); // skip first row
    $n = 0;
    $inserts = 0;
    while ($r = fgetcsv($f,'"', ';')) {
      $r[0] = trim($r[0]);
      $ic = InstallationClasseeQuery::create()->findPK($r[0]);
      if (is_null($ic)) {
        $ic = new InstallationClassee();
        $ic->setId($r[0]);
        $inserts++;
      }
      $ic->setNomEtablissement($r[1]);
      $ic->setCodePostal($r[2]);
      $ic->setCommune($r[3]);
      $ic->setDepartement($r[4]);
      $ic->setRegime($r[5]);
      $ic->setSeveso(!($r[6] == "Non Seveso"));
      $ic->setEtatActivite($r[7]);
      $ic->setPrioriteNationale($r[8] == "Oui");
      $ic->setIEDMTD($r[9] == "Oui");
      $ic->save();
      $n++;
    }
    return [$n,$inserts];
  }
}
