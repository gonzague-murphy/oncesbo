<?php
//on ouvre la session ici :
session_start();
define("RACINE_SITE","/portfolio/");
require_once("connexionBdd.php");
require_once("header.php");
require_once("menu.php");
require_once("footer.php");
require_once("fonction.php");

//ici on declare une constante pour le chemin de la racine serveur :
define("RACINE_SERVEUR", $_SERVER['DOCUMENT_ROOT']);
$msg='';