<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Email = isset($_POST["Email"])?$_POST["Email"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login."' AND email = '".$Email."@edu.ece.fr'");

	
	// verifier que les champs sont bien remplis
	if($Login == "") { $error .= "Login vide <br/>";}
	if($Email == "") { $error .= "Email vide <br/>";}
 	if ($error == "") {
		echo "Formulaire plein ! <br/> ";
 	}
 	else {
		echo "Erreur : $error";

 	}


	// si formulaire plein on continue les actions
	if($Login!="" && $Email!=""){
	$donnees = $reponse->fetch();
	$log = $donnees['login'];
	$log_2 = $donnees['email'];
		if($log != "" && $log_2 != "")
		{
			echo "bon identifiants : inscription possible";
			// création d'un session et enregistrement du login
			session_start();
			$_SESSION['login'] = $Login;
			//echo '<br /><a href="aut_inscrip.php"></a>';
			// html : mettre lien vers l'interface de l'auteur qui vient de se connecter 

			header('Location: aut_inscrip.php');
		}
		else 
		{
			echo "Login ou mot de passe incorect ! ";
		}
		
	}

?>