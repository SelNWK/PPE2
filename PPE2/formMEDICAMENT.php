<?php
require_once './Include/constante.inc.php';

require_once './Include/Bibliotheque01.inc.php';
require_once './Include/entete.inc.php';
?>

<div id="droite"> 
    <h1> Pharmacopée </h1>  
    <?php
    switch ($_REQUEST['action']) {


        case medecin_Affichage_Liste:
            ?>        
            <form name="formMEDICAMENT" method="post" action="index.php?action=<?php echo medecin_Liste_Medicament ?>">

                <?php
                echo formSelectDepuisRecordset('Famille de medicament :', 'FAM_CODE', 'FAM_LIBELLE', getListFamilleMedicament(), 10, null);
                echo formBoutonSubmit('bouton', 'bouton', 'ok', 10);
                ?>
                </form>
                <?php
                break;
                


           
      
        case medecin_Liste_Medicament:
            ?>
            <form id="formMEDICAMENT" method="post" action="index.php?action=<?php echo medicament_Affichage_Info ?>">

                <?php
                echo formSelectDepuisRecordset('Famille de medicament :', 'FAM_CODE', 'FAM_LIBELLE', getListFamilleMedicament(), 10, $_POST['FAM_CODE']);
                echo formBoutonSubmit('bouton', 'bouton', 'ok', 10). '<br/>';
                echo formSelectDepuisRecordset('Liste des medicaments :', 'MED_NOM', 'MED_CODE', getListeMedicament($_POST['FAM_CODE']), 10, $_POST['FAM_CODE']);
                echo formBoutonSubmit('bouton', 'bouton', 'ok', 10);
                echo formInputHidden('HdChoixFamilleMedicament', 'HdChoixFamilleMedicament', $_POST['FAM_CODE']);
                ?>           
            </form>
            <?php
            break;
            ?>


        </form>

    <?php
    case medicament_Affichage_Info:
        ?>
        <form name="formMEDICAMENT" method="post" action="index.php?action=<?php echo medicament_Affichage_Info ?>">
            <?php
            echo formSelectDepuisRecordset('Famille de medicament :', 'FAM_CODE', 'FAM_LIBELLE', getListFamilleMedicament(), 10, $_POST['FAM_CODE']);
            echo formBoutonSubmit('bouton', 'bouton', 'ok', 10). '<br/>';
            echo formSelectDepuisRecordset('Liste des medicamnets :', 'MED_NOM', 'MED_CODE', getListeMedicament($_POST['FAM_CODE']), 10, $_POST['MED_NOM']);
            echo formBoutonSubmit('bouton', 'bouton', 'ok', 10);
            echo formInputHidden('HdChoixFamilleMedicament', 'HdChoixFamilleMedicament', $_POST['FAM_CODE']);
            ?>
        </form>

        <?php
        
        $ligne=getListeInfosMedicament($_POST['MED_NOM']);
        
        echo formInputText('NomCommercial', 'NOM COMMERCIAL : ', 25, $ligne[0],true, false) . '<br/>';
        
        echo formTextArea('COMPOSITION: ', 'txtComposition', 'txtComposition', $ligne[1], 50, 5, 200, 90, true, false) . '<br/>';
        echo formTextArea('EFFETS: ', 'txtEffets', 'txtEffets', $ligne[2], 50, 5, 200, 90, true, false) . '<br/>';
        echo formTextArea('CONTRE INDICATION: ', 'txtContreIndication', 'txtContreIndication', $ligne[4], 50, 5, 200, 90, true, false ) . '<br/>';
        
        echo formInputText('txtLaboratoire', 'LABORATOIRE : ', 25, $ligne[3],true, false) . '<br/>';
        
        break;
        ?>  



    <?php
}
require_once'./Include/Pied.inc';

