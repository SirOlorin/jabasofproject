<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Supprimer un réveil</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['deletereveil'], $_GET['id'])) {
    $id = $_GET['id'];
    $set = $bdd->prepare("DELETE FROM `alarmclock` WHERE id = ?");
    $set -> execute(array($id));
    $message="bien joué, c'est supprimé";
}else{
    $message = "no post";
}
if (isset ($message)) {
    echo $message;
}

?>