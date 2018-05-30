<?php
/**
 * chargement de la base de la liste des communes à partir de la base des codes
 * postaux
 */
require_once(__DIR__.'/../bootstrap.php');
use ND\Cedric\Propel\Communes;
use ND\Cedric\Propel\CommunesQuery;

CommunesQuery::create()->deleteAll();
$communes = json_decode(file_get_contents(__DIR__."/../res/laposte_hexasmal.json"), true);
$done = [];
foreach ($communes as $commune_src) {
    if (in_array($commune_src['fields']['code_commune_insee'], $done)) {
	continue;
    }
    $commune = new Communes();
    $commune->setNom($commune_src['fields']['nom_de_la_commune']);
    $commune->setCodeInsee($commune_src['fields']['code_commune_insee']);
    $commune->save();
    $done[] = $commune->getCodeInsee();
}