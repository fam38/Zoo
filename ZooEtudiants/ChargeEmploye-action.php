<?php

if ( // On vérifie que les données que l’on attend sont bien là :
      isset ($_POST['nomE']) // le nom d’un employé
   && isset($_POST['role']) // son rôle
   && !empty($_POST['nomE'])
   && !empty($_POST['role'])
) {
   $nom = $_POST['nomE'];
   $role = $_POST['role'];
} else {
   $ne_pas_connecter = true; // Si ce n’est pas le cas, on ne se connecte pas à la base
}

$titre = 'Charge d\'un employé';
include('entete.php');

if(isset($ne_pas_connecter)) {
   echo '<p class="erreur"> Vous devez fournir un nom d’employé et son rôle. </p>';
} else {
	if ($role == "responsable") {
		// on interroge les responsables
		// no des allees et des cages sous leur responsabilite
		// construction de la requete
		$requete = "select noCage, noAllee from zoo.LesCages natural join zoo.LesResponsables  " ;
		$requete .= "where lower(nomE) = lower(:n) " ;
		$requete .= "order by noAllee" ;
		$entete = "<center> <b> Responsabilités affectées à ".$nom."</b></center>" ;
		$tablespec = "<table> <tr><th> No Cage </th><th> No Allée </th></tr>" ;
		}
	else {
		// on interroge les employes
		// no des cages et nom des animaux gardes
		// construction de la requete
		$requete = "select noCage, nomA from zoo.LesAnimaux natural join zoo.LesGardiens " ;
		$requete .= "where lower(nomE) = lower(:n)" ;
		$requete .= "order by noCage" ;
		$entete = "<center> <b> Surveillances affectées à ".$nom."</b></center>" ;
		$tablespec = "<table> <tr><th> No Cage </th><th> Nom animal </th></tr>" ;
	}
	// le reste du traitement de la requete s'applique aux deux cas
	// liaison des parametres de la requete aux variables php
	// analyse de la requete et association au curseur
	$curseur = oci_parse ($lien, $requete) ;
	oci_bind_by_name ($curseur, ":n", $nom) ;
	// execution de la requete
	@oci_execute ($curseur) ;
	$res = oci_fetch ($curseur);
	if (!$res) {
		// le resultat est vide
		echo "<p class=\"erreur\"><b> Nom inconnu </b> </p>" ;
	}
	else {
		echo $entete ; echo $tablespec ;
		// Affichage du resultat (non vide)
		do {    $noCage = oci_result ($curseur, 1) ;
			$noAllee = oci_result ($curseur, 2) ;
			echo "<tr><td> $noCage </td>";
			echo "<td> $noAllee </td></tr> ";
		} while (oci_fetch ($curseur));
		oci_free_statement ($curseur) ;
		echo "</table>";
	}
}
include('pied.php');
?>
