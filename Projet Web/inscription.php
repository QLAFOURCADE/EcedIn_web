<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel= "stylesheet" type "text/css" href "style.css" />
	<title> Ajout eleve </title>
</head>

<body>
	<form action="inscription_traitement.php" method="post">
		<table id="Formulaire">
			<legend> Formulaire inscription eleve </legend>
				<tr>
					<td>Login eleve: </td>
					<td> <input type="text" name="Login"> </td>
				</tr>
				<tr>
					<td>Son nom : </td>
					<td> <input type="text" name="Nom"> </td>
				</tr>
				<tr>
					<td>Son email : </td>
					<td> <input type="text" name="Email"> </td>
				</tr>
				<tr>
					<td> <input type="submit" value="Ajouter" > </td>
				</tr>
		</table>
	</form>
</body>
</html>