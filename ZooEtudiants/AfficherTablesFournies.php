<?php
$titre = 'Contenu des relations fournies';
include('entete.php');

   //Affichage table zoo.LesAnimaux
   echo "<h3>zoo.LesAnimaux</h3>";

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
     echo '<table><tr> <th>Nom</th><th>Sexe</th><th>type</th><th>pays</th><th>AnNais</th><th>NoCage</th></tr>';
     do {    
       $nomA = oci_result ($curseur, 1) ;
       $sexe = oci_result ($curseur, 2) ;
       $type = oci_result ($curseur, 3) ;
       $pays = oci_result ($curseur, 4) ;
       $anNais = oci_result ($curseur, 5) ;
       $noCage = oci_result ($curseur, 6) ;
   
       echo "<tr><td>$nomA</td><td>$sexe</td><td>$type</td><td>$pays</td><td>$anNais</td><td>$noCage</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }

   //Affichage table zoo.LesMaladies
   echo "<h3>zoo.LesMaladies</h3>";

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
     echo '<table><tr> <th>Animal</th><th>Maladie</th></tr>';
     do {    
       $nomA = oci_result ($curseur, 1) ;
       $nomM = oci_result ($curseur, 2) ;
   
       echo "<tr><td>$nomA</td><td>$nomM</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }


   //Affichage table zoo.LesCages
   echo "<h3>zoo.LesCages</h3>";

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
     echo '<table><tr> <th>noCage</th><th>fonction</th><th>noAllee</th></tr>';
     do {    
       $noCage = oci_result ($curseur, 1) ;
       $fonction = oci_result ($curseur, 2) ;
       $noAllee = oci_result ($curseur, 3) ;
       
       echo "<tr><td>$noCage</td><td>$fonction</td><td>$noAllee</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }

   //Affichage table zoo.LesEmployes
   echo "<h3>zoo.LesEmployes</h3>";

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
     echo '<table><tr><th>NomE</th><th>Adresse</th></tr>';
     do {    
       $nomE = oci_result ($curseur, 1) ;
       $adresse = oci_result ($curseur, 2) ;
       
       echo "<tr><td>$nomE</td><td>$adresse</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }

   //Affichage table zoo.LesGardiens
   echo "<h3>zoo.LesGardiens</h3>";

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
     echo '<table><tr><th>NoCage</th><th>NomE</th></tr>';
     do {    
       $noCage = oci_result ($curseur, 1) ;
       $nomE = oci_result ($curseur, 2) ;
       
       echo "<tr><td>$noCage</td><td>$nomE</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }

   //Affichage table zoo.LesResponsables
   echo "<h3>zoo.LesResponsables</h3>";

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
     echo '<table> <tr><th>NoAllee</th> <th>NomE</th></tr>';
     do {    
       $noAllee = oci_result ($curseur, 1) ;
       $nomE = oci_result ($curseur, 2) ;
       
       echo "<tr><td>$noAllee</td><td>$nomE</td></tr>";
     } while (oci_fetch ($curseur));
     echo "</table>";
     oci_free_statement ($curseur) ;
   }

include('pied.php');
?>
