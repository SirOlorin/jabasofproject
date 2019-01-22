<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Supprimer une question</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['deletefaq'], $_GET['id'])) {
    $id = $_GET['id'];
    $set = $bdd->prepare("DELETE FROM `pagefaq` WHERE id = ?");
    $set -> execute(array($id));
    $message="La question a bien été supprimée.";
    header( "refresh:2;url=index.php?page=bofaq" );
}else{
    $message = "Aucune quesiton n'a été selectionnée.";
}
if (isset ($message)) {
    echo $message;
}

?>