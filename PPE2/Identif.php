<?php
require_once './Include/Securite.inc.php';
require_once './Include/entete2.inc.php';
    
if (isset($_POST['bouton'])) {
    if (valideInfosCompteUtilisateur($_POST['idUtilisateur'], $_POST['mdpUtilisateur'])) {
        ouvreSessionUtilisateur($_POST['idUtilisateur']);
        echo '<script> window.location.replace("http://localhost/Nowakowski/PPE2/index.php?action=20") </script>';
        //header('Location: index.php?action=20');
    } else {
        echo '<p class="erreur">Utilisateur et/ou Mot de passe invalide</p>';
    }
}
?>

<form id="frmIdentification" method="post" required="required" >
    <?php
    echo formInputText('idUtilisateur', 'Utilisateur : ', 20, '', false, true) . '<br/>';
    echo formInputPassword('Mot de passe ', 'mdpUtilisateur', 'mdpUtilisateur', '', 20, 40, 20, true) . '<br/>';
    echo formBoutonSubmit('bouton', 'valider', 'ok', 30) . '<br/>';
    ?>
</form>
</body>

<?php
require_once './Include/pied.inc';

