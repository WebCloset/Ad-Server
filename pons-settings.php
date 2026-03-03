<?php
//----------------------------------------------------------------------------
// AdAdmin config mapped to Railway MySQL environment variables
//----------------------------------------------------------------------------

// Read values provided by Railway's MySQL plugin (see Variables tab)
$railwayDbName = getenv('MYSQL_DATABASE') ?: '';
$railwayUser   = getenv('MYSQLUSER') ?: '';
$railwayPass   = getenv('MYSQLPASSWORD') ?: '';
$railwayHost   = getenv('MYSQLHOST') ?: '';

// Database configuration used by the app
define("WEBDOMAIN",   $railwayHost);   // MySQL host
define("DEFDBNAME",   $railwayDbName); // Database name
define("DEFUSERNAME", $railwayUser);   // Database user
define("DEFDBPWD",    $railwayPass);   // Database password

// language translation csv file
define("LANGUAGEFILE","en.lang.txt");

// theme
define("DOMINIODEFAULT","deepblue_theme");

// installer folder
define("INSTALLER","install");

// database table prefix
define("DB_PREFIX","");

// encryption key
define("ENCRYPTIONKEY", "CHECKMEOUT11812338184291");

//----------------------------------------------------------------------------
// advanced settings (kept same as pons-settings-install.php defaults)
//----------------------------------------------------------------------------
ini_set('default_charset', 'UTF-8');
setlocale(LC_CTYPE, 'it_IT.UTF-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

define("PRIMO_COMPONENTE_DA_MOSTRARE","BANNER");

define("LOGS_FILENAME", "data/logs/log.txt");
define("SHOW_ERRORS", true);
define("SEND_ERRORS_MAIL", "");
define("STOP_ON_ERROR", false);

// Auto-detect base path and URL (copied from installer file)
$currentdir = __FILE__;
$currentdirAr = explode("/",str_replace('\\','/',$currentdir));   // WORKS ALSO ON WINDOWS
$currentdir = $currentdirAr[ count($currentdirAr) - 2];
$currentdir = "/".ltrim($currentdir,"/");
if( !stristr($_SERVER['REQUEST_URI'] , $currentdir."/"))  $currentdir = ".";
if($currentdir!=".") {
	$currentdir = str_replace( strstr($_SERVER['REQUEST_URI'], $currentdir), "" , $_SERVER['REQUEST_URI']  ).$currentdir;
}
define("PONSDIR",$currentdir);

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $tmpurl = "https";  else $tmpurl = "http"; 
$tmpurl .= "://"; 
$tmpurl .= $_SERVER['HTTP_HOST']; 
$tmpurl .= $currentdir != "." ? $currentdir : ""; 
define("WEBURL",$tmpurl); 

