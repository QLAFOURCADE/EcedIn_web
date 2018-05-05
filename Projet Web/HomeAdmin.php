
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title>ECE Bond</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/docs.css">

    <style>
        table {
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            text-align: center;
        }
    </style>

</head>

<body>

<nav class="navbar-inverse navbar-fixed-top">
    <div class="container-fluid input-group">
        <div class="navbar-header">
            <a> <img src="assets/images/Icon_ECEBond.PNG" href="#"> </a>
            <a class="navbar-brand" href="HomeAdmin.php">ECE Bond</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="HomeAdmin.php">Acceuil</a></li>
            <li><a href="inscription.php">Ajout élève</a></li>
            <li><a href="#">Ajout professionnel</a></li>
            <li class="active"><a href="Pagedaccueil.php">Déconnexion</a></li>
        </ul>
    </div>
</nav>


<div>
<left>
    <br>
    <br>
    <input type="text" class="form-control" placeholder="Search" name="search"></input>
</left>
    <div>
	   <table>
<br/>
<br/>
            <tr>
                <th>  Login </th>
                <th>  Nom  </th>
                <th>  Prenom  </th>
                <th>  Email   </th>
                <th>  Promotion  </th>
                <th>  Majeure   </th>
				<th>  Travail   </th>
                <th>  Date de connexion   </th>
            </tr>
			</table>
<?php
		// connection à la bdd
		$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');
		// recuperer tout le contenu de la table utilisateur
		$reponse = $bdd->query("SELECT * FROM utilisateur ");
        $row = $reponse->fetch();
		
		while($row = $reponse->fetch())
		{
			$login = $row['login'];
		$email = $row['email'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $travail = $row['travail'];
        $promotion = $row['promotion'];
        $majeure = $row['majeure'];
		$dateco = $row['dateco'];
		

        if($login == "" && $email == "" && $nom =="") {
        $error = "Pas de donnees dans le serveur ";
        }
		if($prenom =="NULL")
		{
			$prenom = "";	
		}
		
		if($travail=="NULL")
		{
			$travail = "";	
		}
		if($promotion=="NULL")
		{
			$promotion = "";	
		}
		if($majeure=="NULL")
		{
			$majeure = "";	
		}
		if($dateco=="NULL")
		{
			$dateco = "";	
		}
		
			echo '<div> '.$login.' '.$nom.' '.$prenom.' '.$email.' '.$promotion.' '.$majeure.' '.$travail.' '.$dateco.'</div>';
		}
?>			
	</div>
<!--
			<div> '.$lastName.' '.$firstName.' '.$middleName.' '.$dateOfBirth.' '.$email.' '.$phone.' '.$troopID.'</div>';


            echo '<tr>
            <td>'.$firstName.'</td>
            <td>'.$middleName.'</td>
            <td>'.$lastName.'</td>
            <td>'.$dateOfBirth.'</td>
            <td>'.$phone.'</td>
            <td>'.$email.'</td>
            <td>'.$troopID.'</td>
        </tr>';
            }
            }
            }
            echo <<<UPTOEND
        </table>
        <br/><br/>
        <BR/><BR/>
        <center>
            <input type="button" value="*** New Search ***"
                   onClick="window.location='searchScoutsByName.php'"/>
        </center>

    </div>
-->


    <footer class="footer">
        <div class="text-center">
            <small class="copyright">Designed with <i class="fa fa-heart"></i> by Quiterie Lafourcade, Pierre-Joseph Delafosse et Côme L'Ollivier</small>
        </div>
    </footer>

</body>

</html>
