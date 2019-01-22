<link rel="stylesheet" type="text/css" href="page_reveil.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Ajouter une caméra</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit']) AND isset($_GET['room'])) {
    if( !empty($_POST['url'])) {
        $url = htmlspecialchars($_POST['url']);
        $room = htmlspecialchars($_GET['room']);

        $set = $bdd->prepare("INSERT INTO `cameras`(`camera_url`,`room_id`) VALUES (?,?)");
        $set -> execute(array($url,$room));
        $message="La caméra a bien été ajoutée.";
        header( "refresh:2;url=index.php?page=house&id=".$_GET['room']);

    }else {
        $message = "Veuillez remplir tous les champs du formulaire.";
    }
}
?>


<form action="" method="post">
    <label>URL de la caméra : </label>
    <input type="text" name="url">
    <input type="submit" name="submit" value="Valider">
</form>
<?php
if (isset ($message)) {
    echo $message;
}
?>

