<?php
	// les variables
	$Login = isset($_POST["Login"])?$_POST["Login"] : ""; 
    $Password = isset($_POST["Password"])?$_POST["Password"] : "";
    $error = "";
	  
	// verifier que les champs sont bien remplis 
	if($Login == "") { $error .= "Login vide <br/>";}
	if($Password == "") { $error .= "Mot de passe vide <br/>";}
 	if ($error == "") {
		echo "Formulaire plein ! <br/> ";
 	}
 	else {
		echo "Erreur : $error";

 	}

	// liste de couples stockes dans le serveur
	$logs = array(
		"Come" => "1111",
		"Pierre" => "2222",
		"Quiterie" => "3333",);
		
	// variable pour verifier la présence de l'administrateur dans le serveur 
	$valide = 0;

	// si formulaire plein on continue les actions
	if($Login!="" && $Password!="")
	{
		foreach($logs as $x => $x_value){
			if($Login == $x && $Password == $x_value)
			{
				$valide ++;
				exit;
			}
		}
	  
		// message en cas d'erreur
		if ($valide == 0){
			echo "Login ou mot de passe incorrect !";
		}
		
		// si le nom et le numero de l'empoyee dans serveur, on continue
		if($valide == 1){
			echo "vous etes connecté : page administrateur ";
		}
	}
?>