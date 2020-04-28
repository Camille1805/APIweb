<?php
error_reporting(E_STRICT | E_ALL);
date_default_timezone_set('Europe/Paris');
setlocale (LC_TIME, 'fr_FR.utf8','fra');


// =====================  Initialisation
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('URL_BASE', 'http://'.$_SERVER['SERVER_NAME'].(($_SERVER['SERVER_PORT'] == '80')?'':':'.$_SERVER['SERVER_PORT']).((dirname($_SERVER['SCRIPT_NAME']) == DS)?'':dirname($_SERVER['SCRIPT_NAME'])) );
define('CONTROLLERS', ROOT.DS.'controllers');
define('VIEWS', ROOT.DS.'views');
define('MODELS', ROOT.DS.'models');
define('VENDORS', ROOT.DS.'vendors');
define('CLASSES', ROOT.DS.'classes');
define('URL_APIBASE','http://localhost/projects/uha/2020/tds/uha_archiweb_2020/api');

// =====================  Détermination du controleur à utiliser: Est-ce que j'ai un paramètre 'url' dans mon URL?
require_once CLASSES.DS.'router.php';
$r = new Router();
$r->url();
$r->exec();
?>