<?php
require_once './Include/Securite.inc.php';
?>
<html lang="fr">
<head> 
<title>GSB : Suivi de la Visite médicale </title>
<meta charset="UTF-8" /> 
<link rel="stylesheet" href="styles/gcr.css" >
</head>
<body>
<div id="haut"><h1><img src="images/logo.jpg" alt="logo" width="100" height="60"/>Gestion des visites</h1></div>
<div id="gauche">
	 <?php
                if (estSessionUtilisateurOuverte()) {
                    echo '<p class="infosUtil">';
                    echo $_SESSION['userNOM'] . ' ';
                    echo $_SESSION['userPRENOM'] . '<br/>';
                    echo $_SESSION['userVILLE'] . '<br/>';
                    echo '</p>';
                }
                ?>
            
            <h2>Outils</h2>
	<ul>
            <li>Comptes-Rendus</li>
		
			<li><a href="formRAPPORT_VISITE.html" >Nouveaux</a></li>
			<li>Consulter</li>
		</ul>
		 
                 <ul><li>Consulter</li> 
                 <li><a href="index.php?action=<?php echo medecin_Affichage_Liste; ?>" >Médicaments</a></li>
                 <li><a href="index.php?action=1" >Praticiens</a></li>
                 <li><a href="formVISITEUR.html" >Autres visiteurs</a></li>
		</ul>
	
</div>
<div id="droite">