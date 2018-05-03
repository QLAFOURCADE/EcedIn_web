<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Password = isset($_POST["Password"])?$_POST["Password"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login."' AND password = '".$Password."'");

	
	// verifier que les champs sont bien remplis
	if($Login == "") { $error .= "Login vide <br/>";}
	if($Password == "") { $error .= "Password vide <br/>";}
 	if ($error == "") {
		echo "Formulaire plein ! <br/> ";
 	}
 	else {
		echo "Erreur : $error";

 	}


	// si formulaire plein on continue les actions
	if($Login!="" && $Password!=""){
	$donnees = $reponse->fetch();
	$log = $donnees['login'];
	$log_2 = $donnees['password'];
		if($log != "" && $log_2 != "")
		{
			echo "bon identifiants : connexion réussie ";
			// html : mettre lien vers l'interface de l'auteur qui vient de se connecter 
		}
		else 
		{
			echo "Login ou mot de passe incorect ! ";
		}
		
	}

?>