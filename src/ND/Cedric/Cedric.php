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
use Slim\Http\Request;
use Slim\Http\Response;
use Predis\Client;
use PHPMailer\PHPMailer\PHPMailer;
use ND\Cedric\Propel\Utilisateur;
use ND\Cedric\Propel\UtilisateurQuery;
use ND\Cedric\Propel\UtilisateurDepartements;
use ND\Cedric\Propel\UtilisateurDepartementsQuery;

class Cedric extends \Slim\App {
    private $redis;
    
    private function getRedis() {
	if (!$this->redis) {
	    $this->redis = new Client('tcp://redis:6379');
	}
	return $this->redis;
    }
    
    /**
     * 
     * @return PHPMailer
     */
    private function getMailer() {
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->setFrom("cedric@jecodepourlanature.tk");
	$mail->setLanguage("fr");
	$mail->Host = "anacreon.damiens.info";
	$mail->Port = "25";
	$mail->SMTPAuth = false;
	$mail->CharSet = "utf-8";
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = "error_log";
	$mail->SMTPOptions = array(
	    'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	    )
	);
	return $mail;
    }
    
    /**
     * 
     * @param string $email
     * @param string $objet departement ou commune
     * @param string $valeur
     * @return string
     */
    public function registerToken($email, $objet, $valeur) {
	$id = uniqid("", TRUE);
	$this->getRedis()->set($id, json_encode([
	    "objet" => $objet,
	    "valeur" => $valeur,
	    "email" => $email
	]));
	$this->getRedis()->expire($id, 3600);
	return $id;
    }

    public function getToken($token) {
	$token_json = $this->getRedis()->get($token);
	if (!$token_json) {
	    return false;
	}
	return json_decode($token_json, true);
    }
    
    
    public function setup() {
	// Get container
	$container = $this->getContainer();

	// Register component on container
	$container['view'] = function ($container) {
	    $view = new \Slim\Views\Twig("/opt/app/templates/", [
		'cache' => false
	    ]);

	    // Instantiate and add Slim specific extension
	    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
	    $view->addExtension(new \Slim\Views\TwigExtension($container->get('router'), $basePath));

	    return $view;
	};
	
	$this->get('/', function (Request $request, Response $response, $args) {
	    return $this->view->render($response, 'index.html', [
		'name' => "coin"
	    ]);
	});
	$this->get('/ajouter/{quoi}', function (Request $request, Response $response, $args) {
	    if (!in_array($args['quoi'], ['departement','commune'])) {
		throw new \Exception("404");
	    }
	    return $this->view->render($response, "{$args['quoi']}.html");
	});
	$app = $this;
	$this->post('/ajouter/{quoi}', function(Request $request, Response $response, $args) use ($app) {
	    if (!in_array($args['quoi'], ['departement','commune'])) {
		throw new \Exception("404");
	    }
	    $token = $app->registerToken(
		    $request->getParam("email"),
		    $args['quoi'],
		    $request->getParam("id")
	    );
	    $mail = $app->getMailer();
	    $mail->addAddress($request->getParam("email"));
	    $mail->Subject = "[CEDRIC] Activer un nouveau moniteur";
	    switch ($args['quoi']) {
		case 'departement':
		    $what = "du département ".$request->getParam("id");
		    break;
		default:
		    throw new \Exception("oups");
	    }
	    $mail->Body = "Bonjour,\n\n".
		    "Il semble que souhaitez activer la surveillance $what.\n".
		    "Pour l'activer, il suffit de consulter cette adresse :\n".
		    "\n\t https://cedric.jecodepourlanature.tk/confirm/$token \n\n".
		    "Merci.\n";
	    error_log("send");
	    if (!$mail->send()) {
		error_log($mail->ErrorInfo);
	    }
	    error_log("ok");
	    return $this->view->render($response, "{$args['quoi']}_post.html");
	});
	$this->get('/confirm/{tokenid}', function (Request $request, Response $response, $args) use ($app) {
	    $subscribe = $app->getToken($args['tokenid']);
	    if (!$subscribe) {
		throw new \Exception("404");
	    }
	    switch ($subscribe['objet']) {
		case 'departement':
		    $utilisateur = UtilisateurQuery::create()->findOneByEmail($subscribe['email']);
		    if (!$utilisateur) {
			$utilisateur = new Utilisateur();
			$utilisateur->setEmail($subscribe['email']);
			$utilisateur->save();
		    }
		    $utilisateurDepartement = new UtilisateurDepartements();
		    $utilisateurDepartement->setUtilisateurId($utilisateur->getId());
		    $utilisateurDepartement->setNumDept($subscribe['valeur']);
		    try {
			$utilisateurDepartement->save();
		    } catch (\Exception $e) {
			return $this->view->render($response, "alreadysubscribed.html");
		    }
		    break;
		default:
		    throw new \Exception("sais pas faire");
	    }
	    return $this->view->render($response, "subscribed.html");
	});
	$this->get("/abos", function (Request $request, Response $response, $args) use ($app) {
	    return $this->view->render($response, "sendabo.html");
	});
	$this->post('/abos', function (Request $request, Response $response, $args) use ($app) {
	    $utilisateur = UtilisateurQuery::create()->findOneByEmail($request->getParam("email"));
	    if (!$utilisateur) {
		error_log("user not found : ".$request->getParam("email"));
		return $this->view->render($response, "sentabo.html");
	    }
	    $body = "Bonjour,\nVoici la liste de vos abonnements sur chaque ligne vous".
		    " trouverez un lien pour supprimer l'abonnement.\n\n";
	    $depts = UtilisateurDepartementsQuery::create()->findByUtilisateurId($utilisateur->getId());
	    foreach ($depts as $dept) {
		$token = $app->registerToken(
		    $utilisateur->getEmail(),
		    "departement",
		    $dept->getNumDept()
		);
		$body .= " - Département ".$dept->getNumDept()."\n";
		$body .= "     Annulation : https://cedric.jecodepourlanature.tk/annul/$token\n";
	    }
	    $mail = $app->getMailer();
	    $mail->addAddress($utilisateur->getEmail());
	    $mail->Subject = "[CEDRIC] Liste de vos abonnements";
	    $mail->Body = $body;
	    $mail->send();
	    return $this->view->render($response, "sentabo.html");
	});
	$this->get("/annul/{token_id}", function (Request $request, Response $response, $args) use ($app) {
	   $abo = $app->getToken($args['token_id']);
	   if (!$abo) {
	       throw new \Exception("404");
	   }
	   $utilisateur = UtilisateurQuery::create()->findOneByEmail($abo['email']);
	   if ($abo['objet'] == "departement") {
		$abodept = UtilisateurDepartementsQuery::create()
		     ->filterByUtilisateurId($utilisateur->getId())
		     ->filterByNumDept($abo['valeur'])
		     ->findOne();
		if ($abodept) {
		    $abodept->delete();
		}
	   }
	   return $this->view->render($response, "delabo.html");
	});
    }
}
