<?php
	
	if(isset($_POST['Auteur']))
	{
		// utilisateur a appuyer sur auteur 
		header('Location: Connexion.php');
	}
	if(isset($_POST['Administrateur']))
	{
		// utilisateur a appuyer sur administrateur
		header('Location: ConnexionAdmin.php');
	}

?>