<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Nom = isset($_POST["Nom"])?$_POST["Nom"] : "";
    $Email = isset($_POST["Email"])?$_POST["Email"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login."'");

	
	// verifier que les champs sont bien remplis
	if($Login == "") { $error .= "Login vide <br/>";}
	if($Nom == "") { $error .= "Nom vide <br/>";}
	if($Email == "") { $error .= "Email vide <br/>";}
 	if ($error == "") {
		echo "Formulaire plein ! <br/> ";
 	}
 	else {
		echo "Erreur : $error";

 	}


	// si formulaire plein on continue les actions
	if($Login!="" && $Nom!="" && $Email!=""){
	$donnees = $reponse->fetch();
	$log = $donnees['login'];
		if($log != "")
		{
			echo "deja dans bdd";
			// html : mettre un pop up impossible d'ajouter cet eleve 
		}
		else 
		{
			echo "pas dans bdd";
			$req = $bdd->query("INSERT INTO utilisateur(login, nom, email) VALUES('".$Login."', '".$Nom."', '".$Email."')");
		}
		
	}

?>