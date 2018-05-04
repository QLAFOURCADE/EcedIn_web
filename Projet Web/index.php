<html>

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

</head>

<body>
    <nav class="navbar-inverse navbar-fixed-top">
        <div class="container-fluid input-group">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ECE Bond</a>
            </div>
            <form class="navbar-form navbar-left" action="">
                <div class="input-group-sm">
                    <input type="text" class="form-control" placeholder="Search" name="search"></input>
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Acceuil</a></li>
                <li><a href="reseau.php">Réseau</a></li>
                <li><a href="emploi.php">Emplois</a></li>
                <li><a href="message.php?contact=">Messagerie</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li class="active"><a href="profil.php">Vous</a></li>
            </ul>
        </div>
    </nav>

    <div class="wrappe">
        <div id="frame">
        <div class="sidebar-wrapper pull-left">
                <div class="profile-container">
                    <img class="img-responsive img-profil center-block" src="assets/images/fjords.jpg" alt="" />
                    <h3 class="name">Côme L'Ollivier</h3>
                    <h5 class="tagline">Trapeur</h5>
                </div>
                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li><i class="fa fa-envelope"></i><a href="mailto: yourname@email.com">comelolo@yolo.com</a></li>
                        <li><i class="fa fa-briefcase"></i><a href="#" target="_blank">Systemes Embarqués</a></li>
                        <li><i class="fa fa-graduation-cap"></i><a href="#" target="_blank">Promo 2020</a></li>
                    </ul>
                    <br/>
                    <a href="profil.php">afficher profil</a><br>
                    <a href="change_profil.php">modifier profil</a>
                    
                </div> 
                
        </div>
        
        <div class="fil_actu">
            <div class="row">
            <!-- main center col -->
            <div class="col-sm-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <h4>Du nouveau à partager :</h4>
                            <div class="form-group" style="padding:14px;">
                                <textarea class="form-control" placeholder="Update your status" rows="4"></textarea>
                            </div>
                            <button class="btn btn-primary pull-right" type="button">Post</button>
                            <ul class="list-inline">
                                <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-facetime-video"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="assets/images/profile.png" class="img-post pull-left">
                            <hr>
                            <span><h5>Pierre Joseph Delafosse</h5></span>
                            <hr>
                                <p>Machin à publier quelque chose et cela est très intéressant. <br/>
                                    Cordialement, <br/> la direction.
                                </p> 
                            <hr>
                           <form>
                           <div class="input-group">
                             <div class="input-group-btn">
                             <button class="btn btn">Like <i class="fa fa-thumbs-o-up"></i></button><button class="btn btn-default">Share <i class="glyphicon glyphicon-share"></i></button>
                             </div>
                             <input class="form-control" placeholder="Add a comment.." type="text">
                           </div>
                           </form>
                           
                         </div>
                    </div>
            </div>
            </div>
        </div>

        <div class="sidebar-right col-sm-2">
                <div class="panel-body">
                    <p>Connaissez cette personne ?</p>
                    <br><br><br>
                    <p>Connaissez vous ce réseau ?</p>
                </div>
        </div>
        </div>

        <footer class="footer">
                <div class="text-center">
                        <small class="copyright">Designed with <i class="fa fa-heart"></i> by Quiterie Lafourcade, Pierre-Joseph Delafosse et Côme L'Ollivier</small>
                </div>
        </footer>
    </div>

    
</body>

</html>