<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        .img-profil {
            padding: 3%;
            border-radius: 50%;
            width: 130;
            height: 130;
        }
        .img-post {
            padding: 2%;
            border-radius: 50%;
            width: 80;
            height: 80;
        }

        .panel-default {
            margin-top: 4%;
        }
    </style>
    <style>
        form {
            margin-top: 10px;
            margin-bottom: 100px;
            margin-right: 400px;
            margin-left: 400px;
        }


        tr.spaceUnder>td {
            padding-bottom: 1em;
        }

        textarea:focus {
            height: 4em;
        }
    </style>

</head>
<body>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid input-group">
            <div class="navbar-header">
                <a class="navbar-brand" href="Pagedaccueil.php">ECE Bond</a>
            </div>

        </div>
    </nav>

    <left>
        <br>
        <br>
        <img src="assets/images/Icon_ECEBond.PNG" />
    </left>
    <center>
        <h2> Auteur</h2>
    </center>

    <br>
    <br>

    <div class="main">
        <form name="myform"  action="co_auteur_traitement.php" method="POST">
            
            <table>
                <tr class="spaceUnder">
                    <td>Login :</td>
                    <td>
                        <input class="form-control" type="text" name="Login1">
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Mot de Passe:</td>
                    <td>
                        <input class="form-control" type="password" name="Password">
                    </td>
                </tr>

            </table>
            <br>
            <br>
            <left>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Se connecter"  />
            </left>
            <br>
            <br>
		</form>
		
		<form name="myform" action="val_ins_traitement.php" method="POST">
            
            <table>
                <tr class="spaceUnder">
                    <td>Login :</td>
                    <td>
                        <input class="form-control" type="text" name="Login2" >
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Adresse mail:</td>
                    <td>

                        <input class="form-control" type="text" name="Email" >
                    </td>
                    <td> <p>@edu.ece.fr</p></td>
                </tr>

            </table>
            <br>
            <br>
            <left>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="S'inscrire" />
            </left>
        </form>
    </div>

</body>
</html>