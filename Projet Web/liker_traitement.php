<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
	$Email = isset($_POST["Email"])?$_POST["Email"] : "";
    $error = "";

	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
	
	session_start();
	$Loging_u = $_SESSION['login'];
	
	$id_post = $_GET['id_post'];

	echo $id_post;
	
//	$bdd->exec("INSERT INTO liker(id_post, id_utilisateur) VALUES(".$id_post.", '".$Loging_u."')");
	//header('Location: liker.php');
//	echo "ajout fait";

?>