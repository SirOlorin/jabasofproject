<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Supprimer un article</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['deleteaccueil'], $_GET['id'])) {
    $id = $_GET['id'];
    $set = $bdd->prepare("DELETE FROM `pageaccueil` WHERE id = ?");
    $set -> execute(array($id));
    $message="bien joué, c'est supprimé";
    header( "refresh:2;url=index.php?page=boaccueil" );
}else{
    $message = "no post";
}
if (isset ($message)) {
    echo $message;
}

?>
