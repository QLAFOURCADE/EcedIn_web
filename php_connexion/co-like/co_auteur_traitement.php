<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Password = isset($_POST["Password"])?$_POST["Password"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login."' AND password = '".$Password."'");

	date_default_timezone_set('Europe/Paris');
	$maintenant = date("Y-m-d H:i:s");

	session_start();
	//echo $_SESSION['login'];

	
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
			$_SESSION['login'] = $Login;
			// mettre sate et heure de la connexion : echo $maintenant;
			$bdd->exec("UPDATE utilisateur SET dateco ='".$maintenant."' WHERE login = '".$Login."' AND password = '".$Password."'");
			// identifier quelle session est ouverte : récupérer le login 
			
			//echo "modification réalisée";
			// html : mettre lien vers l'interface de l'auteur qui vient de se connecter
			header('Location: liker.php');
		}
		else 
		{
			echo "Login ou mot de passe incorect ! ";
		}
		
	}

?>