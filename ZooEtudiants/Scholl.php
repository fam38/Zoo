<?php
$titre = 'Cages gardées par Scholl';
include('entete.php');

			// construction de la requete
			$requete = "select noCage from zoo.LesGardiens where nomE = 'Scholl' ";

			// analyse de la requete et association au curseur
			$curseur = oci_parse ($lien, $requete) ;

			// execution de la requete
			$ok = oci_execute ($curseur) ;

			$res = oci_fetch ($curseur);

			if (!$res) {
				// le resultat est vide
				echo "<p class=\"erreur\"><b> Scholl inconnu </b></p>" ;
			}
			else {
				// la table qui va servir a la mise en page du resultat
				echo "<table> <tr><th> No Cage </th></tr>" ;
				// Affichage du resultat (non vide)
				do {    $noCage = oci_result($curseur,1) ;
					echo "<tr><td> $noCage </td></tr>";
				} while (oci_fetch ($curseur));
				echo "</table>";
			}
			oci_free_statement($curseur);

include('pied.php');
?>
