<?php

// les utilitaires pour la gestion du Zoo 

	putenv("ORACLE_SID=ufrima");

	// les messages d'erreurs
	function LeMessage ($codeErreur) {
		switch ($codeErreur) {
			case "pasdeconnexion":
				$message= "La connexion à la base de données a échoué"; break;
			case "connexionOK":
				$message= "Connexion réussie"; break;
			case "majOK":
				$message = "La mise à jour a été effectuée"; break ;
			case "maladieconnue":
				$message = "Maladie déjà enregistrée" ; break ;
			case "affectationconnue":
				$message = "Afectation déjà enregistrée" ; break ;
			case "gardienoucageinconnus":
				$message = "Le gardien ou la cage sont inconnus" ; break ;
			case "pasderesponsable":
				$message = "L'allée où est la cage n'a pas de responsable"; break;
			case "pasdegardien":
				$message = "La cage n'a pas de gardien"; break;
			case "dejaresponsable":
				$message = "Un responsable ne peut pas etre affecté à une cage"; break;
			case "majRejetee":
				$message = "La mise à jour a été rejetée"; break ;
			case "animalinconnu":
				$message = "La mise à jour a été rejetée: animal inconnu!!!"; break ;
			case "problemevariables":
				$message = "Votre navigateur ne semble pas accepter les cookies"; break ;
			case "cageougardienconnu":
				$message = "ce gardien surveille deja cette cage"; break ;
			default:
				$message = "Autre message" ; break ;
		}
		return "<p><b>".$message."</b></p>";
	}

	// les messages d'erreur Oracle
	function LeMessageOracle ($codeOracle, $messageOracle) {
		switch ($codeOracle) {
			case 1:
				$message = "-> contrainte de clef non respectée"; break ;
			case 1400:
				$message = "-> valeur absente interdite"; break ;
			case 1722:
				$message = "-> erreur de type, un nombre était attendu"; break ;
			case 2291:
				$message = "-> contrainte référentielle non respectée"; break;
			default:
				$message = "-> autre message : ".$codeOracle; break ;
		}
		$message = "<b>".$message ;
		$message .= " (".$messageOracle.") </b>" ;
		return $message ;
	}

	// Connexion : une action (deux donnees, deux resultats)
	// Connexion (n, p, c, r) etablit une connexion oracle pour
	// l'utilisateur de nom n et de mot de passe p. c est le lien
	// vers la connexion et r est le code erreur associe.

	function Connexion ($nom, $motdepasse, &$lien, &$codeerreur) {
		// @ devant le nom de l'action neutralise les messages d'erreur
		// qu'elle pourrait envoyer

	  $host = 'im2ag-oracle.e.ujf-grenoble.fr';
	  $port = '1521';
	  $service_name = 'ufrima';

	  $lien = oci_connect($nom, $motdepasse, "//$host:$port/$service_name");
	  if ($lien) {
	    $codeerreur = "connexionOK" ;
	  }
	  else {
	    $codeerreur = "pasdeconnexion" ;}
	}

	// Deconnexion : une action (une donnee)
	// Deconnexion (l) deconnecte le lien l de Oracle
	function Deconnexion ($lien) {
		oci_close ($lien) ;
	}
?>
