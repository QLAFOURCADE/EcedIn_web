<?php
	// les variables
	$Login2 = isset($_POST["Login2"])?$_POST["Login2"] : ""; 
	$Email = isset($_POST["Email"])?$_POST["Email"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login2."' AND email = '".$Email."@edu.ece.fr'");

	// fuseau horaire + recuperer la date et l'heure à l'instant t 
	date_default_timezone_set('Europe/Paris');
	$maintenant = date("Y-m-d H:i:s");

	// creer un message d'alerte pour mauvaise entrée
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=Connexion.php"/>';
		exit();
		
	}
	
	// verifier que les champs sont bien remplis
	if($Login2 == "") {  $error .= "     Login vide      ";}
	if($Email == "") { $error .= "        Email vide      ";}
 	if ($error != "") {
		Alert($error);
 	}
 	else {
		//echo "on continue";
		$donnees = $reponse->fetch();
		$log = $donnees['login'];
		$log_2 = $donnees['email'];
		if($log != "" && $log_2 != "")
		{
			//echo "bon identifiants : inscription possible";
			// modifier la date de connexion de l'utiisateur qui va s'inscrire 
			// création d'un session et enregistrement du login
			session_start();
			$_SESSION['login'] = $Login;
			$_SESSION['dateco'] = $maintenant;
			// html : mettre lien vers l'interface de l'auteur qui vient de se connecter 
				//echo "vers inscrition";
			header('Location: aut_inscrip.php');
		}
		else 
		{
			$error = "    Login ou mot de passe incorect !   ";
			Alert($error);
		}

 	}


?>