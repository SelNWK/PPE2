<?php
require_once './Include/SourceDonnees.inc.php';

function valideInfosCompteUtilisateur($id, $mdp) {
    $compteValide = existeCompteVisiteur($id, md5($mdp));
    return $compteValide;
}

function ouvreSessionUtilisateur($identifiant) {

    $infos = getInfoUser($identifiant);
    $resultat = $infos->fetch(PDO::FETCH_ASSOC);

    $_SESSION['utilId'] = $identifiant;
    $_SESSION['userNOM'] = $resultat['VIS_NOM'];
    $_SESSION['userPRENOM'] = $resultat['VIS_PRENOM'];
    $_SESSION['userVILLE'] = $resultat['VIS_VILLE'];
    //$_SESSION['userROLE'] = $resultat['VIS_ROLE'];
    //$_SESSION['userREGION'] = $resultat['VIS_REGION'];
}

function estSessionUtilisateurOuverte() {
    return isset($_SESSION['idUtilisateur']);
}

function fermeSessionUtilisateur() {
    session_destroy();
}

?>
