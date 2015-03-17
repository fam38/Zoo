<?php
$titre = 'Milou a eu une rage de dents (version 1)';
include('entete.php');

// construction de la requete
$requete = "insert into lesMaladies values ('Milou', 'rage de dents') ";

// analyse de la requete et association au curseur
$curseur = oci_parse ($lien, $requete) ;

// execution de la requete
$res = oci_execute ($curseur,OCI_NO_AUTO_COMMIT) ;

if ($res) {
  echo LeMessage ("majOK") ;
  // terminaison de la transaction : validation
  oci_commit ($lien) ;
}
else {
  echo LeMessage ("majRejetee") ;
  // terminaison de la transaction : annulation
  oci_rollback ($lien) ;
}

include('pied.php');
?>