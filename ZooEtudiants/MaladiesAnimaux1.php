<?php
$titre = 'Caractéristiques et maladies des animaux (version avec deux curseurs)';
include('entete.php');

$requete1 = "select nomA, sexe, type, pays, anNais,noCage from zoo.lesAnimaux order by nomA";
$curseur1 = oci_parse($lien,$requete1);
oci_execute($curseur1);
$res=oci_fetch($curseur1);

if(!$res)
{
    echo ("aucun animal existant !...");
}else
{
    echo '<table><tr> <th>Nom</th><th>Sexe</th><th>type</th><th>pays</th><th>AnNais</th><th>NoCage</th><th>Maladie</th></tr>';
     

     do{

       $nomA = oci_result ($curseur1, 1) ;
       $sexe = oci_result ($curseur1, 2) ;
       $type = oci_result ($curseur1, 3) ;
       $pays = oci_result ($curseur1, 4) ;
       $anNais = oci_result ($curseur1, 5) ;
       $noCage = oci_result ($curseur1, 6) ;
   
       echo "<tr><td style=\"padding : 10 10 10 10;\" >  $nomA  </td><td>  $sexe  </td><td>  $type  </td><td>  $pays  </td><td>  $anNais  </td><td>  $noCage  </td>";

	$requete2 = "select nomM from zoo.lesMaladies where lower(nomA) = lower(:n) ";

	$curseur2 = oci_parse($lien,$requete2);
	oci_bind_by_name ($curseur2, ":n", $nomA) ;
	oci_execute($curseur2);
	$res = oci_fetch($curseur2);
	if($res)
	{
		 $nomM = oci_result($curseur2,1);
		 echo"<td>$nomM</td>";
		 echo"</tr>";
		while(oci_fetch($curseur2))
		{
		echo"<tr><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td>";
		$nomM = oci_result($curseur2,1);
		echo"<td>$nomM</td>";
		echo"</tr>";
		}
	}
	else
	{
		echo"<td></td>";
		 echo"</tr>";
	}

      
	}while (oci_fetch ($curseur1));
	
	echo"</table>";
}

include('pied.php');
?>
