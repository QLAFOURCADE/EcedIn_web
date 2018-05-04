<?php
require('server_connexion.php');
$con = connect_and_select_db();
$id_profile = "ad";

function add_comment() {
    $con = connect_and_select_db();
    $message = $_POST['new_message'];
    $discussion_active = $_GET['discus'];
    $date = date("Y-m-d h:i:s");
    $id_profile = "ad";

    if ($message != "") {
    $requete = $insertStmt = "INSERT message (id_discussion, id_emetteur, moment, textemessage)
    values ('$discussion_active', '$id_profile', '$date', '$message')";
    $result = mysqli_query($con, $requete);
    }
}

if (isset($_POST['new_message'])) {
    echo add_comment();
    echo "<meta http-equiv='refresh' content='0'>";
    return;
}

?>


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
                <li>
                    <a href="index.php">Acceuil</a>
                </li>
                <li>
                    <a href="reseau.php">Réseau</a>
                </li>
                <li>
                    <a href="emploi.php">Emplois</a>
                </li>
                <li>
                    <a href="message.php">Messagerie</a>
                </li>
                <li>
                    <a href="notif.php">Notifications</a>
                </li>
                <li class="active">
                    <a href="profil.php">Vous</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <div id="frame">
            <div id="sidepanel">
                <div id="profile">
                    <div class="wrap">
                        <!-- commande SQL pour récupérer les infos du client  -->
                        <?php
                        $photo_profile = "assets/images/profile.png";
                        echo '
                        <img id="profile-img" src='.$photo_profile.' alt="" />
                        <p>Jean Pierre Segado</p>
                        ';
                        ?>
                    </div>
                </div>
                <div id="search">
                    <label>
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </label>
                    <input type="text" placeholder="Search contacts..." />
                </div>
                <div id="contacts">
                    <ul>
                        <?php
                            $search = "SELECT emetteur, id_discus FROM discussion WHERE recepteur = '".$id_profile."' UNION SELECT recepteur, id_discus FROM discussion WHERE emetteur = '".$id_profile."'";
                            $result = mysqli_query($con, $search);
                            while($discu = mysqli_fetch_array($result)) {
                                $user_result = mysqli_query($con, "SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$discu['emetteur']."'");
                                while ($data = mysqli_fetch_array($user_result)) {
                                    $lastname = $data['nom'];
                                    $firstname = $data['prenom'];
                                    $photo = $data['photoprofil'];
                                    if ($photo=="") {$photo="assets/images/batman.jpg";}
                                    if(isset($_GET['contact'])){
                                        if ($discu['emetteur'] == $_GET['contact']) { $active="active";} else {$active="";}
                                    } else {$active="";}
                                    echo '
                                    <a href="message.php?contact='.$discu['emetteur'].'&amp;discus='.$discu['id_discus'].'">
                                    <li id="'.$discu["emetteur"].'" class="contact '.$active.'">
                                        <div class="wrap">
                                            <img src=' .$photo. ' alt="" />
                                                <div class="meta">
                                                <p class="name">' .$firstname. ' ' .$lastname. '</p>
                                                <p class="preview">...</p>
                                            </div>
                                        </div>
                                    </li>
                                    </a>
                                    ';
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div id="bottom-bar">
                    <button id="new_discussion">
                        <i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>
                        <span>Nouvelle discussion</span>
                    </button>
                </div>
            </div>
            <div class="content">
                <div id="" class="contact-profile">
                    <?php
                    if(isset($_GET['contact'])){
                    $contact_profile = mysqli_query($con, "SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$_GET['contact']."'"); 
                    while ($data = mysqli_fetch_array($contact_profile)) {
                        $lastname = $data['nom'];
                        $firstname = $data['prenom'];
                        $photo_contact = $data['photoprofil'];
                        if ($photo_contact=="") {$photo_contact="assets/images/batman.jpg";}
                        echo' 
                        <img src='.$photo_contact.' alt="" />
                        <p>'.$firstname.' '.$lastname.'</p>';
                    }
                    }
                    ?>
                </div>
                <div class="messages">
                    <ul>
                    <?php
                        if(isset($_GET['discus'])){
                        $search = "SELECT textemessage, id_emetteur FROM `message` WHERE id_discussion = '".$_GET['discus']."' ORDER BY moment;";
                        $result = mysqli_query($con, $search);
                        while($row = mysqli_fetch_array($result)) {
                            $message = $row['textemessage'];
                            if ($row['id_emetteur']==$id_profile) {
                                $class = "sent";
                                $photo_text = $photo_profile;
                            } else { 
                                $class="replies";
                                $photo_text = $photo_contact; 
                            }
                            echo'
                            <li class='.$class.'>
                                <img src='.$photo_text.' alt="" />
                                <p>'.$message.'</p>
                            </li>';
                        }
                    }
                    ?>
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">
                        <?php
                        if(isset($_GET['discus']) && isset($_GET['contact'])){
                            echo '
                            <form method="POST" action="">
                                <input type="text" id="new_message" name="new_message" placeholder="Write your message..." />
                                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                <button type="submit" class="submit">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </form>
                            ';       
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="text-center">
                    <small class="copyright">Designed with <i class="fa fa-heart"></i> by Quiterie Lafourcade, Pierre-Joseph Delafosse et Côme L'Ollivier</small>
            </div>
        </footer>
    </div>

        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script>$(".messages").animate({ scrollTop: $(document).height() }, "fast");

            $(window).on('keydown', function (e) {
                if (e.which == 13) {
                    newMessage();
                    return false;
                }
            });
            //# sourceURL=pen.js
        </script>

</body>

</html>