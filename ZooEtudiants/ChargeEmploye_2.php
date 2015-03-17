<?php
$titre = 'Charge d’un employé';
include('entete.php');
// ON NE DEMANDE QUE LE ROLE, LE FORMULAIRE SUIVANT DEMANDE LE NOM
?>

<form method="post" action="ChargeEmploye-action-1.php">
	<p>
		Role: <input type="radio" name="role" value="responsable" checked="checked" /> Responsable
		<input type="radio" name="role" value="gardien" /> Gardien
	</p>
	<p>
		<input type="submit" value="Soumettre" />
		<input type="reset" value="Remise à zéro" />
	</p>
</form>
<?php include('pied.php'); ?>
