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




<center>
    <br>
    <br>
    <img src="assets/images/Icon_ECEBond.PNG" />
</center>

<br>
<br>

<div class="main">
    <form name="myform" action="Pagedaccueil_traitement.php" method="post" >

        <div id="alertbox" class="alert alert-danger alert-dismissable fade in" style="display: none; color: black; white-space: pre-wrap;">

        </div>

        <br>
        <br>
        <left>
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Auteur" name="Auteur" />
        </left>
        <br>
        <br>

        <br>
        <br>
        <left>
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Administrateur" name="Administrateur"/>
        </left>

    </form>
</div>

</body>

</html>