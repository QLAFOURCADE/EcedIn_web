<?php
require('server_connexion.php');
$con = connect_and_select_db();


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
                        <img id="profile-img" class="img-post" src="assets/images/profile.png" alt="" />
                        <p>Jean Pierre Segado</p>
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
                            $search = "SELECT emmetteur FROM `discussion` WHERE recepteur = 'ad' UNION SELECT recepteur FROM discussion WHERE emmetteur = 'ad'";
                            $result = mysqli_query($con, $search);
                            while($discu = mysqli_fetch_array($result)) {
                                $user_result = mysqli_query($con, "SELECT nom, prenom, photoprofil FROM utilisateur WHERE login = '".$discu['emmetteur']."'");
                                while ($data = mysqli_fetch_array($user_result)) {
                                    $lastname = $data['nom'];
                                    $firstname = $data['prenom'];
                                    $photo = $data['photoprofil'];
                                    if ($photo=="") {$photo="assets/images/batman.jpg";}
                                    echo '
                                    <li class="contact">
                                        <div class="wrap">
                                            <img src=' .$photo. ' alt="" />
                                                <div class="meta">
                                                <p class="name">' .$firstname. ' ' .$lastname. '</p>
                                                <p class="preview">...</p>
                                            </div>
                                        </div>
                                    </li>
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
                <div class="contact-profile">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Harvey Specter</p>
                    <div class="social-media">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages">
                    <ul>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>When you're backed against the wall, break the god damn thing down.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Excuses don't win championships.</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>Oh yeah, did Michael Jordan tell you that?</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>No, I told him that.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>What are your choices when someone puts a gun to your head?</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any
                                one of a hundred and forty six other things.</p>
                        </li>
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">
                        <input type="text" placeholder="Write your message..." />
                        <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                        <button class="submit">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
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

            $("#profile-img").click(function () {
                $("#status-options").toggleClass("active");
            });

            $(".expand-button").click(function () {
                $("#profile").toggleClass("expanded");
                $("#contacts").toggleClass("expanded");
            });

            $("#status-options ul li").click(function () {
                $("#profile-img").removeClass();
                $("#status-online").removeClass("active");
                $("#status-away").removeClass("active");
                $("#status-busy").removeClass("active");
                $("#status-offline").removeClass("active");
                $(this).addClass("active");

                if ($("#status-online").hasClass("active")) {
                    $("#profile-img").addClass("online");
                } else if ($("#status-away").hasClass("active")) {
                    $("#profile-img").addClass("away");
                } else if ($("#status-busy").hasClass("active")) {
                    $("#profile-img").addClass("busy");
                } else if ($("#status-offline").hasClass("active")) {
                    $("#profile-img").addClass("offline");
                } else {
                    $("#profile-img").removeClass();
                };

                $("#status-options").removeClass("active");
            });

            function newMessage() {
                message = $(".message-input input").val();
                if ($.trim(message) == '') {
                    return false;
                }
                $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                $('.message-input input').val(null);
                $('.contact.active .preview').html('<span>You: </span>' + message);
                $(".messages").animate({ scrollTop: $(document).height() }, "fast");
            };

            $('.submit').click(function () {
                newMessage();
            });

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