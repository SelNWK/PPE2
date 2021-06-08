<?php
session_start();
require_once './Include/constante.inc.php';
require_once './Include/Bibliotheque01.inc.php';
require_once './Include/SourceDonnees.inc.php';

SGBDConnect();

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 100;
}


switch ($_REQUEST['action']) {
    default:
        require_once './Identif.php';
        break;

    case 10:
//        require_once './index.php';
        break;

    case 1:
        require_once "./formPRATICIEN.php";
        break;

    case 2:
        require_once './formPRATICIEN.php';
        break;

    case medecin_Affichage_Liste:
        require_once './formMEDICAMENT.php';
        break;


    case medecin_Liste_Medicament:
        require_once './formMEDICAMENT.php';
        break;


    case medicament_Affichage_Info:
        require_once './formMEDICAMENT.php';
        break;

    case 20:
        require_once './Include/entete.inc.php';
        break;
}
