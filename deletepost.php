<?php

include 'connect.php';
include 'header_forum.php';


$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($link,$_GET['post_id'])) {
    $id = $_GET['post_id'];
    $set = $bdd->prepare("DELETE FROM `posts` WHERE post_id = ?");
    $set -> execute(array($id));
    $message="Bien joué, c'est supprimé, cliquez <a href='index.php?page=forum'>ici </a> pour revenir à l'accueil";
}else{

    $message = "Error 404";
}
if (isset ($message)) {
    echo $message;
}

?>
