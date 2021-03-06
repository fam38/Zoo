<?php
$titre = 'Ajout d\'un animal';
include('entete.php');

if( (!isset($_POST['nomE']) && empty($_POST['nomE'])) && (isset($_POST['nomA']) && !empty($_POST['nomA'])) && (isset($_POST['sexe']) && !empty($_POST['sexe'])) && (isset($_POST['type']) && !empty($_POST['type']))&& (isset($_POST['anNais']) && !empty($_POST['anNais']))&& (isset($_POST['pays']) && !empty($_POST['pays']))&& (isset($_POST['noCage']) && !empty($_POST['noCage'])))
{
    $nomA = $_POST['nomA'];
    $sexe = $_POST['sexe'];
    $type = $_POST['type'];
    $anNais = $_POST['anNais'];
    $pays = $_POST['pays'];
    $noCage = $_POST['noCage'];
    $requete = "select distinct nomE from LesGardiens where noCage = lower(:n) " ;
	$curseur = oci_parse ($lien, $requete) ;
	oci_bind_by_name ($curseur, ":n", $noCage) ;
  	oci_execute ($curseur) ;
	$res = oci_fetch ($curseur);

  if(!$res) {
	  echo "<form method=\"post\" action=\"#\">";    	 
	  echo" Choisir un gardien pour cette cage non gardée :   <p><select size=\"3\" name=\"nomE\"> <br />";
	  $requete = " select distinct nomE from LesGardiens order by nomE";
	  $curseur = oci_parse ($lien, $requete) ;
	  oci_execute ($curseur) ;
	  $res = oci_fetch($curseur);
	  do {
		$ungardien = oci_result ($curseur,1);
		echo "<option value=\"$ungardien\">$ungardien</option> ";
	    } while (oci_fetch ($curseur)); 
	    oci_free_statement ($curseur);
	 	    echo "</select> </p>";
	  echo "<input type=\"hidden\" name=\"nomA\" value=\"$nomA\" />";
	  echo "<input type=\"hidden\" name=\"sexe\" value=\"$sexe\" />";
	  echo "<input type=\"hidden\" name=\"type\" value=\"$type\" />";
	  echo "<input type=\"hidden\" name=\"anNais\" value=\"$anNais\" />";
	  echo "<input type=\"hidden\" name=\"pays\" value=\"$pays\" />";
	  echo "<input type=\"hidden\" name=\"noCage\" value=\"$noCage\" />";
	  echo "<p> <input type=\"submit\" value=\"OK\"/> 
	              <input type=\"reset\" value=\"Remise à zéro\"/> </p>";
	  echo "</form>";
  }
  else
  {
	 $requete = "insert into LesAnimaux values ('{$_POST['nomA']}', '{$_POST['sexe']}', '{$_POST['type']}', '{$_POST['pays']}', {$_POST['anNais']}, {$_POST['noCage']}) ";
	 $curseur = oci_parse ($lien, $requete) ;
	 $res = oci_execute ($curseur,OCI_NO_AUTO_COMMIT) ;
	if(res){
		oci_commit ($lien) ;
		echo LeMessage ("majOK") ;
		// terminaison de la transaction : validation
		}
	  else {
		echo LeMessage ("majRejetee") ;
		// terminaison de la transaction : annulation
		oci_rollback ($lien) ;
		}
 }

}
else if (isset($_POST['nomE']) && !empty($_POST['nomE']) && (isset($_POST['nomA']) && !empty($_POST['nomA'])) && (isset($_POST['sexe']) && !empty($_POST['sexe'])) && (isset($_POST['type']) && !empty($_POST['type']))&& (isset($_POST['anNais']) && !empty($_POST['anNais']))&& (isset($_POST['pays']) && !empty($_POST['pays']))&& (isset($_POST['noCage']) && !empty($_POST['noCage'])))
{

  // construction de la requete
  $requete = "insert into LesAnimaux values ('{$_POST['nomA']}', '{$_POST['sexe']}', '{$_POST['type']}', '{$_POST['pays']}', {$_POST['anNais']}, {$_POST['noCage']}) ";
  $requete2 = "insert into LesGardiens values({$_POST['noCage']},'{$_POST['nomE']}')";
 
 // analyse de la requete et association au curseur
  $curseur = oci_parse ($lien, $requete) ;
$curseur2 = oci_parse ($lien, $requete2) ;

  // execution de la requete
  $res = oci_execute ($curseur,OCI_NO_AUTO_COMMIT) ;
  $res2 = oci_execute ($curseur2,OCI_NO_AUTO_COMMIT) ;

if($res2 && $res)
{
echo LeMessage ("majOK") ;
    // terminaison de la transaction : validation
oci_commit ($lien) ;
}
else
{
    echo LeMessage ("majRejetee") ;
    // terminaison de la transaction : annulation
    oci_rollback ($lien) ;
}
}
else
{
$requete = " select noCage from LesCages order by noCage";
	  $curseur = oci_parse ($lien, $requete) ;
	  oci_execute ($curseur) ;
	  $res = oci_fetch($curseur);


	  if ($res) {
	    echo "<form method=\"post\" action=\"#\">";
	    echo "Nom : <input type=\"text\" name=\"nomA\" /> <br />";

	    echo "sexe: <input type=\"radio\" name=\"sexe\" value=\"male\" checked=\"checked\" />male ";
	    echo " <input type=\"radio\" name=\"sexe\" value=\"femelle\" /> femelle";
	    echo " <input type=\"radio\" name=\"sexe\" value=\"hermaphrodite\" /> hermaphrodite <br />";

	    echo "Type : <input type=\"text\" name=\"type\" /> <br />";
	    echo "pays : <input type=\"text\" name=\"pays\" /> <br />";
	    echo "anNais : <input type=\"text\" name=\"anNais\" /> <br />";
	    
	    echo "Choisir une cage (une seule): <p><select size=\"3\" name=\"noCage\"> <br />";
	    do {
		$unecage = oci_result ($curseur,1);
		echo "<option value=\"$unecage\">$unecage</option> ";
	    } while (oci_fetch ($curseur)); 
	    oci_free_statement ($curseur);
	    
	    echo "</select> </p>"; 
	    echo "<p> <input type=\"submit\" value=\"OK\"/> 
	              <input type=\"reset\" value=\"Remise à zéro\"/> </p>";
	    echo "</form>";
	  }
	  else {
	    echo LeMessage ("animalinconnu") ;
	  }
}

@oci_free_statement ($curseur) ;
include('pied.php');
?>
