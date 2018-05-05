<?php
	// les variables
	$Login1 = isset($_POST["Login1"])?$_POST["Login1"] : ""; 
	$Password = isset($_POST["Password"])?$_POST["Password"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	// recuperer tout le contenu de la table utilisateur
	$reponse = $bdd->query("SELECT * FROM utilisateur WHERE login = '".$Login1."' AND password = '".$Password."'");

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
	if($Login1 == "") { $error .= "     Login vide      ";}
	if($Password == "") { $error .= "     Mot de passe vide     ";}
 	if ($error != "") {
		Alert($error);
 	}
 	else {
		//echo "on continue";
		$donnees = $reponse->fetch();
		$log = $donnees['login'];
		$log_2 = $donnees['password'];
		if($log != "" && $log_2 != "")
		{
			//echo "bon identifiants : connexion réussie ";
			// mettre sate et heure de la connexion : echo $maintenant;
			$bdd->exec("UPDATE utilisateur SET dateco ='".$maintenant."' WHERE login = '".$Login1."' AND password = '".$Password."'");
			//echo "modification réalisée";
			// html : mettre lien vers l'interface de l'auteur qui vient de se connecter
			// identifier quelle session est ouverte : récupérer le login 
			session_start();
			$_SESSION['login']= $Login1;
			header('Location: index.php');
		}
		else 
		{
			$error = "    Login ou mot de passe incorect !   ";
			Alert($error);
		}
 	}

?>