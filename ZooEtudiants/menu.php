<?php
$titre = 'Bienvenue dans l’application Zoo !';
include('entete.php');
?>
      <h2> Contenu des bases de données </h2>
      <ul class="menu"><li><a href="AfficherTablesFournies.php">
		 Contenu des relations fournies </a> </li>
      <li><a href="AfficherTablesCreees.php">
		 Contenu des relations créées </a></li>
      <li><a href="Copietable.php">
		 initialise les tables </a></li>

      </ul>

      <h2> Requêtes fournies (observer le comportement et le code) sur la BD fournie </h2>
      <ul class="menu"><li><a href="tables.php">
		 Relations appartenant au compte connecté </a> </li>
      <li><a href="Scholl.php">
		 Cages gardées par Scholl </a></li>

      <li><a href="ChargeEmploye.php">
		Cages affectées à un employé </a> </li>
      </ul>

      <h2> Requêtes à modifier sur la BD fournie</h2>
      <ul class="menu"><li><a href="DetailsAnimal.php">
		 Afficher les détails d'un animal </a> </li> 
      <li><a href="ChargeEmploye_2.php">
		Cages affectées à un employé (version améliorée 1) </a> </li>
      <li><a href="ChargeEmploye_3.php">
		Cages affectées à un employé (version améliorée 2) </a> </li>
      </ul>

      <h2> Requêtes à réaliser sur la BD fournie</h2>
      <ul class="menu"><li><a href="CagesVides.php">
		 Afficher les cages vides </a> </li>
      <li><a href="GardEtResp.php">
		Afficher les gardiens et le responsable d'un animal </a> </li>
      <li><a href="MaladiesAnimaux1.php">
		Afficher pour chaque animal ses caractéristiques et ses maladies (version avec deux curseurs) </a> </li>
      <li><a href="MaladiesAnimaux2.php">
		Afficher pour chaque animal ses caractéristiques et ses maladies (version avec un seul curseur) </a> </li>
      <li><a href="MaladiesAnimaux3.php">
		Afficher pour chaque animal ses caractéristiques et ses maladies (en tenant compte des animaux sans maladie) </a> </li>
      </ul>

      <h2> Requêtes fournies (observer le comportement et le code) sur la BD à créer </h2>
      <ul class="menu"><li><a href="Milou1.php">
		 Milou a eu une rage de dents (version 1) </a> </li>
      <li><a href="Milou2.php">
		 Milou a eu une rage de dents (version 2) </a> </li>
      <li><a href="Milou3.php">
		 Milou a eu une rage de dents (version 3) </a> </li>
      </ul>

      <h2> Requêtes à réaliser sur la BD à créer</h2>
      <ul class="menu"><li><a href="AjoutMaladie.php">
		Enregistrer une maladie </a> </li>
      <li><a href="ModifAffectGard.php">
		Modification de l'affectation d'un gardien </a> </li>
      <li><a href="AjoutAnimal.php">
		Enregistrement d'un animal </a> </li>
      <li><a href="DemenagementAnimaux.php">
		Déménagement des animaux d'une cage </a> </li>
      </ul>

<?php include('pied.php'); ?>


