<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header.css">
</head>

<header class="site-header">
    <a href="?page=accueil"><img class="logo" src="https://puu.sh/Cf2Kj/3062eb08b0.png"></div></a>

    <nav>
        <ul class="dropmenu">
            <li><a href="?page=accueil">Accueil</a>
                <div class="subwrap">
                    <ul class="sub">
                        <li><a href="#presentation">Qui sommes-nous ?</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="#">Aide</a>
                <div class="subwrap">
                    <ul class="sub">
                        <li><a href="?page=forum">Forum</a></li>
                        <li><a href="?page=faq">FAQ</a></li>
                        <li><a href="?page=support">Support</a></li>
                </div>
            </li>

            <?php

            if(isset($_SESSION['signed_in'])) {
                $currentid = $_SESSION['signed_in'];
                echo '
            <li><a href="?page=tableaudebord">Tableau de bord</a>
                <div class="subwrap">
                    <ul class="sub">
                        <li><a href="?page=confort">Confort</a></li>
                        <li><a href="?page=reveil">Réveil</a></li>
                        <li><a href="?page=securite">Sécurité</a></li>
                    </ul>
                </div>
            </li>
            <li><a>Paramètres</a>
                <div class="subwrap">
                    <ul class="sub">
                        <li><a href="?page=ajout">Ajouter des fonctionnalités</a></li>
                        <li><a href="?page=logout">Déconnexion</a></li>
                    </ul>
                </div>
            </li>
                <li><a href="?page=member">Espace Membre</a>
                <div class="subwrap">
                </div>
            </li>
            <li><a href="?page=logout">Déconnexion</a>
                <div class="subwrap">
                </div>
            </li>
                ';
            }else{
                echo '
                <li><a href="?page=inscription">S\'inscrire</a>
                <div class="subwrap">
                </div>
            </li>
            <li><a href="?page=connexion">Se connecter</a>
                <div class="subwrap">
                </div>
            </li>
                ';
            }
            if(isset($_SESSION['user_id'])) {
                if ($_SESSION['user_id']==1){
                    $currentid = $_SESSION['user_id'];
                    echo '
                <li><a href="?page=admin">Admin</a>
                    <div class="subwrap">
                    </div>
                </li>
                        ';
                }
            }
            ?>
        </ul>
    </nav>
</header>
<div class="space"></div>
</body>
</html>

