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

	// creer un message d'alerte pour mauvaise entrée
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=inscription.php"/>';
		exit();
		
	}
		function Alert2($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=HomeAdmin.php"/>';
		exit();
		
	}
	
	// verifier que les champs sont bien remplis
	if($Login == "") { $error .= "     Login vide    ";}
	if($Nom == "") { $error .= "      Nom vide        ";}
	if($Email == "") { $error .= "     Email vide       ";}
 	if ($error != "") {
		Alert($error);
 	}
 	else {
		// si formulaire plein on continue les actions
		$donnees = $reponse->fetch();
		$log = $donnees['login'];
		if($log != "")
		{
			// le login existe deja dans la bdd
			$error = "     Cet eleve existe deja dans le serveur EceBond ! ";
			Alert($error);
			// html : mettre un pop up impossible d'ajouter cet eleve 
		}
		else 
		{
			//echo "pas dans bdd";
			$bdd->exec("INSERT INTO utilisateur(login, nom, email) VALUES('".$Login."', '".$Nom."', '".$Email."')");
			$error  = " Cet eleve a ete ajoute il fait bien parti du serveur maintenant ! ";
			Alert2($error);
			//$req = $bdd->query("INSERT INTO utilisateur(login, nom, email) VALUES('".$Login."', '".$Nom."', '".$Email."')");
		}

 	}

?>