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

define('DB_HOST', 'localhost');
define('DB_DBNAME', 'adwfull');
define('DB_CHARSET', 'utf8');
define('DB_DSN', 'mysql:host='.DB_HOST.';dbname='.DB_DBNAME.';charset='.DB_CHARSET);
define('DB_USERNAME', 'root');
define('DB_USERPWD', '');

// =====================  Détermination du controleur à utiliser: Est-ce que j'ai un paramètre 'url' dans mon URL?
require_once CLASSES.DS.'router.php';
$r = new Router();
$r->url();
$r->exec();
?>