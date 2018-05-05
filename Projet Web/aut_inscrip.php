<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel= "stylesheet" type "text/css" href "style.css" />
	<title> Inscription </title>
</head>

<body>
	<?php
//session_start();
//echo $_SESSION['login'];
//echo '<form action="aut_inscrip_traitement.php?login='.$_GET['login'].'&amp;email='.$_GET['email'].'&amp;" method="post">';
?>
		<form action="aut_inscrip_traitement.php" method="post">
		<table id="Formulaire">
			<fieldset>
			<legend> Remplir ses donnees  </legend>
				<tr>
					<td>Prenom : </td>
					<td> <input type="text" name="Prenom"> </td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td> <input type="text" name="Password"> </td>
				</tr>
				<tr>
					<td>Date de naissance : </td>
					<td> <input type="date" name="Anniversaire"> </td>
				</tr>
				<tr>
					<td>Promotion:</td>
					<td> <select name="Choix" id="Promotion">
						<option value="0">...</option>
						<option value="1">ING1</option>
						<option value="2">ING2</option>
						<option value="3">ING3</option>
						<option value="4">ING4</option>
						<option value="5">ING5</option>
						<option value="6">ALUMNI</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Majeure:</td>
					<td> <select name="Choix2" id="Majeure">
						<option value="0">...</option>
						<option value="1">SI</option>
						<option value="2">SE</option>
						<option value="3">Finance</option>
						<option value="4">Sante</option>
						<option value="5">Energie et environnement</option>
						<option value="6">OCRES</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Poste actuelle : </td>
					<td> <input type="text" name="Travail"> </td>
				</tr>
				<tr>
					<td> <input type="submit" value="S'inscrire" > </td>
				</tr>
			</fieldset>
		</table>
	</form>
</body>
</html>