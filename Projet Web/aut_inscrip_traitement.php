<?php
	// les variables
	$Prenom = isset($_POST["Prenom"])?$_POST["Prenom"] : "";
	$Password = isset($_POST["Password"])?$_POST["Password"] : ""; 
	$Anniversaire = isset($_POST["Anniversaire"])?$_POST["Anniversaire"] : "";
	$Choix = isset($_POST["Choix"])?$_POST["Choix"] : "";
	$Choix2 = isset($_POST["Choix2"])?$_POST["Choix2"] : "";
	$Travail = isset($_POST["Travail"])?$_POST["Travail"] : ""; 
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');

	// identifier quelle session est ouverte : récupérer le login 
	session_start();
	//echo $_SESSION['login'];
	$Log = $_SESSION['login'];
	$Date_con = $_SESSION['dateco'];

	// creer un message d'alerte pour mauvaise entrée
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=aut_inscrip.php"/>';
		exit();
		
	}
	
	// verifier que les champs sont bien remplis
	if($Prenom == "") { $error .= "      Prenom vide      ";}
	if($Password == "") { $error .= "    Mot de passe vide      ";}
	if($Anniversaire == "") { $error .= "      Anniversaire vide    ";}
	if($Choix == 0) { $error .= "      Promotion vide     ";}
	if($Choix2 == 0) { $Majeure = "NULL";}// mettre variable à NULL pour le UPDATE
	if($Travail == ""){ $Travail = "NULL";}
 	if ($error != "") {
		Alert($error);
 	}
	
	// bonne entrée pour la requete de la promotion
	if ($Choix==1) {
		$Promotion = "ING1";
	}
	if ($Choix==2) {
		$Promotion = "ING2";
	}
	if ($Choix==3) {
		$Promotion = "ING3";
	}
	if ($Choix==4) {
		$Promotion = "ING4";
	}
	if ($Choix==5) {
		$Promotion = "ING5";
	}
	if ($Choix==6) {
		$Promotion = "ALUMNI";
	}
	
	// bonne entree pour la requete des majeures
	if ($Choix2==1) {
		$Majeure = "SI";
	}
	if ($Choix2==2) {
		$Majeure = "SE";
	}
	if ($Choix2==3) {
		$Majeure = "Finance";
	}
	if ($Choix2==4) {
		$Majeure = "Sante";
	}
	if ($Choix2==5) {
		$Majeure = "Energie et environnement";
	}
	if ($Choix2==6) {
		$Majeure = "OCRES";
	}
		
	// si formulaire plein on continue les actions
	if($Prenom!="" && $Anniversaire!="" && $Choix != 0){
	$bdd->exec("UPDATE utilisateur SET prenom ='".$Prenom."' , password ='".$Password."', anniversaire ='".$Anniversaire."', travail = '".$Travail."' , promotion ='".$Promotion."', majeure = '".$Majeure."' , dateco = '".$Date_con."' WHERE login = '".$Log."'");
	///echo "modification réalisée";
	header('Location: index.php');
	exit();
	}

?>