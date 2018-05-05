<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
    $Password = isset($_POST["Password"])?$_POST["Password"] : "";
    $error = "";
	  
	// creer un message d'alerte pour mauvaise entrée
	function Alert($_message)
	{
		echo '<script type="text/javascript">';
		echo 'alert("'.$_message.'");';
		echo '</script>';
		echo '<meta http-equiv="Refresh" content="0;URL=ConnexionAdmin.php"/>';
		exit();
		
	}
	
	// liste de couples stockes dans le serveur
	$logs = array(
		"Come" => "1111",
		"Pierre" => "2222",
		"Quiterie" => "3333",);
		
		
	// variable pour verifier la présence de l'administrateur dans le serveur 
	$valide = 0;

	
	// verifier que les champs sont bien remplis 
	if($Login == "") { $error .= "       Login vide      ";}
	if($Password == "") { $error .= "    Mot de passe vide     ";}
 	if ($error != "") {
		Alert($error);
 	}
	else
	{
		foreach($logs as $x => $x_value){
			if($Login == $x && $Password == $x_value)
			{
				$valide=1;
				break;
			}
			
		}
		
		// message en cas d'erreur
		if ($valide == 0){
			$error = "Login ou mot de passe incorrect !";
			Alert($error);
		}
		elseif($valide != 0){
		// si le nom et le numero de l'empoyee dans serveur, on continue
			header('Location: HomeAdmin.php');
			exit();
		}
	}
	
?>