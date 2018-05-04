<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel= "stylesheet" type "text/css" href "style.css" />
	<title> Liker </title>
</head>

<body>
	<form action="liker_traitement.php" method="post">

<?php
	// connection à la bdd
	$bdd = new PDO('mysql:host=localhost;dbname=ecebond;charset=utf8', 'root', '');

	session_start();
	$Loging_uti = $_SESSION['login'];

	// recuperer contenu posts
	$reponse = $bdd->query('SELECT * FROM posts ORDER BY d_h');


	while($donnees = $reponse->fetch())
{
?>
		<table id="Formulaire" >
			<fieldset>
			<legend> POST </legend>

<?php
	$Id_P = $donnees['id_post'];
	echo $Id_P;
		if($Id_P == "")
		{
			echo "il n'y a pas d'actualité / posts";
		}

	$L_ut = $donnees['log_utilisateur'];
		if($L_ut != "")
		{
			echo " Poste de :	".$L_ut;
			
		}
	$Com = $donnees['commentaire'];
		if($Com != "")
		{
			echo "					";
			echo " Commentaire :   ".$Com;
		}
	$Lieu = $donnees['lieu'];
		if($Lieu != "")
		{
			echo "					";
			echo " Fait à :   ".$Lieu;
		}
	$Humeur = $donnees['humeur'];
		if($Humeur != "")
		{
			echo "					";
			echo " L'utilisateur est :   ".$Humeur;
		}
	$Act = $donnees['activite'];
		if($Act != "")
		{
			echo "					";
			echo " L'utilisateur fait :   ".$Act;
		}
	$D = $donnees['d_h'];
		if($D != "")
		{
			echo "					";
			echo " Fait le :   ".$D;
		}

?>
		</fieldset>		
		</table>
		
<?php
		
		// recuperer nb de like par posts
		$reponse2 = $bdd->query("SELECT COUNT(id_post) AS c FROM liker WHERE id_post=".$Id_P);
		$donnees2 = $reponse2->fetch();
		$reponse3 = $bdd->query("SELECT * FROM liker WHERE id_utilisateur='".$Loging_uti."' AND id_post=".$Id_P);
		$donnees3 = $reponse3->fetch();
		$u = $donnees3['id_utilisateur'];
		if($u != "")
		{
		echo '<a  href = "liker_traitement_retour.php?id_post='.$Id_P.'"> Deja Liker['.$donnees2['c'].'] </a>';
			//echo "peut pas liker";
		}
		else
		{
			echo '<a  href = "liker_traitement.php?id_post='.$Id_P.'"> Liker['.$donnees2['c'].'] </a>';
			//echo "peut liker";
		}
		//$_SESSION['id_post'] = $Id_P;
?>		
		<a  href = "liker_traitement.php"> Commenter </a>
		<a  href = "liker_traitement.php"> Partager </a>

<?php
}
?>

	</form>
</body>

</html>