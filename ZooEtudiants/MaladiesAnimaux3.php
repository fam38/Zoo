<?php
$titre = 'Caractéristiques et maladies des animaux (version avec un curseur)';
include('entete.php');

$requete = "select nomA, sexe, type, pays, anNais,noCage, nomM from zoo.lesAnimaux natural left outer join zoo.lesMaladies order by nomA";
$curseur = oci_parse($lien,$requete);
oci_execute($curseur);
$res=oci_fetch($curseur);
if(!$res)
echo("aucune maladie");
else
{
  echo '<table><tr> <th>Nom</th><th>Sexe</th><th>type</th><th>pays</th><th>AnNais</th><th>NoCage</th><th>Maladie</th></tr>';

  do{
      $nomA = oci_result ($curseur, 1) ;
      if($savenomA != $nomA)
       {
       $sexe = oci_result ($curseur, 2) ;
       $type = oci_result ($curseur, 3) ;
       $pays = oci_result ($curseur, 4) ;
       $anNais = oci_result ($curseur, 5) ;
       $noCage = oci_result ($curseur, 6) ;
       $nomM = oci_result($curseur,7);

       $savenomA = $nomA;
	echo "<tr><td style=\"padding : 10 10 10 10;\" >  $nomA  </td><td>  $sexe  </td><td>  $type  </td><td>  $pays  </td><td>  $anNais  </td><td>  $noCage  </td><td> $nomM</td></tr>";
      }
      else
      {
	echo"<tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>";
	$nomM = oci_result($curseur,7);
	echo"<td>$nomM</td>";
	 echo"</tr>";
      }

    }while(oci_fetch($curseur));
    echo"</table>";



}

include('pied.php');
?>