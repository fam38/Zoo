<?php
$titre = 'Charge d’un employé';
include('entete.php');

// TOUT SE FAIT DANS CET UNIQUE FICHIER (ENCHAINEMENT DEMANDE ROLE, CHOIX NOM, AFFICHAGE RESULTAT)
// A COMPLETER
?>

<form method="post" action="#">
	<p>
		Role: <input type="radio" name="role" value="responsable"/> Responsable
		<input type="radio" name="role" value="gardien" /> Gardien
	</p>
	<p>
  COMPLETER DANS LE MEME FICHIER PHP POUR ENCHAINER : CHOIX DU NOM PUIS AFFICHAGE DU RESULTAT
		<input type="submit" value="Soumettre" name="submit"/>
		<input type="reset" value="Remise à zéro" />
	</p>
</form>

<?php
include('pied.php'); 
?>