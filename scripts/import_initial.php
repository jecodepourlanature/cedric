<?php
/**
 * chargement de la base de la liste des communes à partir de la base des codes
 * postaux
 */
require_once(__DIR__.'/../bootstrap.php');

use ND\Cedric\Source;

$source = new Source();
$source->updateDb(isset($argv[1])?$argv[1]:null,false); // dl la liste pas de notif