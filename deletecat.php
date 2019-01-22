<?php

include 'connect.php';
include 'header_forum.php';


$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($link,$_GET['cat_id'])) {
    $id = $_GET['cat_id'];
    $set = $bdd->prepare("DELETE FROM `categories` WHERE cat_id = ?");
    $set2 = $bdd->prepare("DELETE FROM `topics` WHERE topic_id = ?");
    $set3 = $bdd->prepare("DELETE FROM `posts` WHERE post_topic = ?");
    $set -> execute(array($id));
    $set2 -> execute(array($id));
    $set3 -> execute(array($id));
    $message="Bien joué, c'est supprimé, cliquez <a href='index.php?page=forum'>ici </a> pour revenir à l'accueil";
}else{

    $message = "Error 404";
}
if (isset ($message)) {
    echo $message;
}

?>
