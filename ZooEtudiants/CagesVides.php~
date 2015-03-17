<?php
$titre = 'Affichage des cages inoccupées';
include('entete.php');

$requete="select count(nocage) from zoo.lescages where nocage not in (select nocage from zoo.lesgardiens)";
$curseur = oci_parse($lien,$requete);
oci_execute($curseur);
$res = oci_fetch($curseur);
if(!$res)
  echo"il n'y a pas de cage inocupé";
else
{

      $noCage = oci_result($curseur,1);
      echo"il y a cage n°$noCage est inocupé. <br />";
} 
oci_free_statement ($curseur) ;
include('pied.php');
?>