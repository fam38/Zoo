<?php
$titre = 'Contenu des relations fournies';
include('entete.php');

        //Affichage table LesCages
   echo "<h3>LesCages</h3>";

   $requete ="select * from zoo.LesCages";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;

   // execution
   oci_execute ($curseur) ;

   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucune cage </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $noCage = oci_result ($curseur, 1) ;
       $fonction = oci_result ($curseur, 2) ;
       $noAllee = oci_result ($curseur, 3) ;

       $insertion ="insert into lesCages values($noCage,'$fonction',$noAllee)";
       $curseur2 = oci_parse ($lien, $insertion) ;
 
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
	}
      else
	{
	  echo"insertion ok";
	}

      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }



   //Affichage table LesAnimaux
   echo "<h3>LesAnimaux</h3>";
  
//echo $_SESSION['login'];
   $requete ="select * from zoo.LesAnimaux";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;
   
   // execution
   oci_execute ($curseur) ;
   
   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucun animal </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $nomA = oci_result ($curseur, 1) ;
       $sexe = oci_result ($curseur, 2) ;
       $type = oci_result ($curseur, 3) ;
       $pays = oci_result ($curseur, 4) ;
       $anNais = oci_result ($curseur, 5) ;
       $noCage = oci_result ($curseur, 6) ;
   
       $insertion ="insert into LesAnimaux values('$nomA','$sexe','$pays','$type',$anNais,$noCage)";
       $curseur2 = oci_parse ($lien, $insertion) ;
       
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
      }
      else
      {
	echo" $nomA est ajouté <br />";
      }

      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }

   //Affichage table LesMaladies
   echo "<h3>LesMaladies</h3>";

   $requete ="select * from zoo.LesMaladies";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;
   
   // execution
   oci_execute ($curseur) ;
   
   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucune maladie </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $nomA = oci_result ($curseur, 1) ;
       $nomM = oci_result ($curseur, 2) ;
   
	
	$insertion ="insert into lesMaladies values('$nomA','$nomM')";
       $curseur2 = oci_parse ($lien, $insertion) ;
        
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
      }
  else
	{
	  echo"insertion ok";
	}
      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }


   //Affichage table LesEmployes
   echo "<h3>LesEmployes</h3>";

   $requete ="select * from zoo.LesEmployes";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;

   // execution
   oci_execute ($curseur) ;

   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucun Employe </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $nomE = oci_result ($curseur, 1) ;
       $adresse = oci_result ($curseur, 2) ;
       
       
      $insertion ="insert into lesEmployes values('$nomE','$adresse')";
       $curseur2 = oci_parse ($lien, $insertion) ;
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
      }
  else
	{
	  echo"insertion ok";
	}

      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }

   //Affichage table LesGardiens
   echo "<h3>LesGardiens</h3>";

   $requete ="select * from zoo.LesGardiens";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;

   // execution
   oci_execute ($curseur) ;

   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucun Gardien </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $noCage = oci_result ($curseur, 1) ;
       $nomE = oci_result ($curseur, 2) ;
       
       
      $insertion ="insert into lesGardiens values($noCage,'$nomE')";
       $curseur2 = oci_parse ($lien, $insertion) ;
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
      }
  else
	{
	  echo"insertion ok";
	}
      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }

   //Affichage table LesResponsables
   echo "<h3>LesResponsables</h3>";

   $requete ="select * from zoo.LesResponsables";

   // analyse de la requete
   $curseur = oci_parse ($lien, $requete) ;

   // execution
   oci_execute ($curseur) ;

   $res = oci_fetch($curseur);

   if (!$res) {
     // no row selected
     echo "<p class=\"erreur\"><b> Aucun responsable </b></p>";
   }
   else {
     // Affichage des colonnes
     do {    
       $noAllee = oci_result ($curseur, 1) ;
       $nomE = oci_result ($curseur, 2) ;
       
       
       $insertion ="insert into lesresponsables values($noAllee,'$nomE')";
       $curseur2 = oci_parse ($lien, $insertion) ;
   
       if(!oci_execute ($curseur2)) {
	  echo"erreur";
      }
      else
	{
	  echo"insertion ok";
	}

      oci_free_statement ($curseur2) ;
     } while (oci_fetch ($curseur));
     oci_free_statement ($curseur) ;
   }

include('pied.php');
?>
