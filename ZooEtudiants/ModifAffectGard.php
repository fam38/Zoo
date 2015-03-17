<?php
$titre = 'Modification de l\'affectation d\'un Gardien';
include('entete.php');

if( (isset($_POST['nomE']) && !empty($_POST['nomE'])) && (isset($_POST['noCage']) && !empty($_POST['noCage'])))
{
  // construction de la requete
  $requete = "insert into lesGardiens values ('{$_POST['noCage']}', '{$_POST['nomE']}') ";

  // analyse de la requete et association au curseur
  $curseur = oci_parse ($lien, $requete) ;

  // execution de la requete
  $res = @oci_execute ($curseur,OCI_NO_AUTO_COMMIT) ;

  if ($res) {
    echo LeMessage ("majOK") ;
    // terminaison de la transaction : validation
    oci_commit ($lien) ;
  }
  else {
    echo LeMessage ("majRejetee") ;
    // terminaison de la transaction : annulation

  $e = oci_error($curseur);
  if ($e['code'] == 1) {
    echo LeMessage ("cageougardienconnu") ;
  }
  else {
    echo LeMessageOracle ($e['code'], $e['message']) ;
  }
    oci_rollback ($lien) ;
  }


}
else
{
$requete = " select distinct nomE from lesGardiens order by nomE";
	  $curseur = oci_parse ($lien, $requete) ;
	  oci_execute ($curseur) ;
	  $res = oci_fetch($curseur);

	  if ($res) {
	    echo "<form method=\"post\" action=\"#\">";
	    //liste des pays
	    echo "Choisir un gardien (un seul): <p><select size=\"3\" name=\"nomE\"> ";
	    do {
		$unGardien = oci_result ($curseur,1);
		echo "<option value=\"$unGardien\">$unGardien</option> ";
	    } while (oci_fetch ($curseur)); 
	    oci_free_statement ($curseur);
	    echo "</select> </p>";
	     }
	  else {
	    echo LeMessage ("animalinconnu") ;
	  }



	  $requete = " select noCage from lesCages order by noCage";
	  $curseur = oci_parse ($lien, $requete) ;
	  oci_execute ($curseur) ;
	  $res = oci_fetch($curseur);
	 


	  if ($res) {
	    //liste des pays
	    echo "Choisir une cage (une seule): <p><select size=\"3\" name=\"noCage\"> ";
	    do {
		$uneCage = oci_result ($curseur,1);
		echo "<option value=\"$uneCage\">$uneCage</option> ";
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

include('pied.php');
?>