<?php
require_once './Include/entete.inc.php';
require_once './Include/Bibliotheque01.inc.php';
?>
<div id="droite"> 
    <?php
    switch ($_REQUEST['action']) {

        case 1:
            ?>
            <h1> Praticiens </h1>

            <form name="formListeRecherche" method="post" action="index.php?action=2">
                <?php
                echo formSelectDepuisRecordset('liste des praticien :', 'PRA_NOM', 'PRA_ID', getListPracticiens(), 10, null);
                ?>
                <input type="submit" name="bouton" id="bouton" tabindex="10">

            </form>
            <?php
            break;

        case 2:
            ?>

            <form id="formPraticien" name="formPraticien" method="post" action="index.php?action=2">
                <?php
                $PRA_NOM = $_POST['PRA_NOM'];
                echo formSelectDepuisRecordset('Liste des praticien :', 'PRA_NOM', 'PRA_ID', getListPracticiens(), 10, $PRA_NOM);
                ?>
                <input type="submit" name="bouton" id="bouton" tabindex="10">
            </form>

            <?php
            $resultat = getinfopraticien($_POST['PRA_NOM']);
            $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
            echo formInputText('txtNom', 'NOM :', 10, $ligne['PRA_NOM'], TRUE, FALSE) . '<br/>'
            . formInputText('txtPrenom', 'PRENOM', 10, $ligne['PRA_PRENOM'], TRUE, FALSE) . '<br/>'
            . formInputText('txtADR', 'ADRESSE', 30, $ligne['PRA_ADRESSE'], TRUE, FALSE) . '<br/>'
            . formInputText('txtVILLe', 'VILLE', 15, $ligne['PRA_VILLE'], TRUE, FALSE) . '<br/>'
            . formInputText('txtCN', 'COEFF NOTORIETE', 10, $ligne['PRA_COEF'], TRUE, FALSE) . '<br/>'
            . formInputText('txtLE', 'LIEU D\'EXERCICE', 30, $ligne['TYP_LIBELLE'], TRUE, FALSE) . '<br/>';
            break;
    }
    ?>
    <?php
    require_once './Include/Pied.inc';
    ?>