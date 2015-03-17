<?php

// AJOUTER LA VERIFICATION DES PARAMETRES ATTENDUS

$titre = 'Charge d\'un employé';
include('entete.php');

// AJOUTER : NE LANCER LA SUITE QUE SI LES PARAMETRES SONT BIEN TOUS LA

// ON PRODUIT UNE LISTE A CHOIX DE NOMS SELON LE ROLE
	echo "<form method=\"post\" action=\"ChargeEmploye-action.php\">";
	if ($role == "responsable") {
	  // on interroge les responsables
	  // construction de la requete
	  // A COMPLETER
	}
	else {
	  // on interroge les gardiens
	  // construction de la requete
	  // A COMPLETER
	}
        echo "COMPLETER POUR CHOISIR LE NOM DANS UNE LISTE";
        echo "<p> <input type=\"submit\" value=\"OK\"/> 
 	          <input type=\"reset\" value=\"Remise à zéro\"/> </p>";
        echo "</form>";

include('pied.php');
?>
