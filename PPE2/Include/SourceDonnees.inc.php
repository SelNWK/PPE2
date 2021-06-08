<?php

function SGBDConnect() {
    try {
        $connexion = New PDO('mysql:host=localhost;dbname=gsb', 'root', '');
        $connexion->query('SET NAME UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'erreur :' . $e->getMessage() . '<br/>';
        exit();
    }
    return $connexion;
}

?>
<?php

function getListPracticiens() {
    $requete = 'select PRA_NUM, concat(PRA_NOM,\' \',PRA_PRENOM) '
            . ' From praticien '
            . ' order by PRA_NOM ,PRA_PRENOM';
    $resultat = SGBDConnect()->query($requete);

    return $resultat;
}

function getinfopraticien($PRA_NUM) {
    $connexion = SGBDConnect();
    $sql = 'SELECT PRA_NOM, PRA_PRENOM, PRA_ADRESSE, Concat(PRA_CP,\' \',PRA_VILLE) as \'PRA_VILLE\', PRA_COEF, TYP_LIEU , TYP_LIBELLE '
            . 'FROM praticien '
            . 'INNER JOIN type_praticien ON Praticien.pra_type = Type_praticien.typ_code '
            . 'WHERE praticien.PRA_NUM ="' . $PRA_NUM . '"';
    $info = $connexion->query($sql);
    return $info;
}

function getListFamilleMedicament() {
    $requete = 'SELECT FAM_CODE, FAM_LIBELLE '
            . 'FROM famille';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
}

function getListeMedicament($FAM_CODE) {
    $requete = 'select MED_CODE, MED_NOM '
            . 'from medicament inner join famille '
            . 'on MED_FAMILLE = FAM_CODE '
            . 'where MED_FAMILLE = \'' . $FAM_CODE . '\'';
    $resultat = SGBDConnect()->query($requete);
    return $resultat;
}

function getListeInfosMedicament($MED_CODE) {
    $requete = ' SELECT MED_NOM, MED_COMPO, MED_EFFETS, MED_LABO, MED_CONTREINDIC '
            . ' FROM medicament '
            . ' where MED_CODE = \'' . $MED_CODE . '\'';

    $resultat = SGBDConnect()->query($requete);
    $resultat->setFetchMode(PDO::FETCH_NUM);
    return $resultat->fetch();
}




function existeCompteVisiteur($user, $mdp) {
    $connexion = SGBDConnect();
    $requete = 'SELECT VIS_CODE, VIS_PASSE '
            . 'FROM visiteur '
            . 'WHERE VIS_CODE = "' . $user . '" AND VIS_PASSE = "' . $mdp . '"';

    $resultat = $connexion->query($requete);

    return ($resultat->rowCount() == 1);
}


function getInfoUser($utilisateur) {
    $connexion = SGBDConnect();

    $requete = 'SELECT VIS_NOM, VIS_PRENOM, VIS_VILLE '
            . 'FROM visiteur '
            . 'WHERE VIS_CODE = "' . $utilisateur . '"';

    $resultat = $connexion->query($requete);
    return $resultat;
}
