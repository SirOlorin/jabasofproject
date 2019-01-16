<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_GET['room'])) {
    $currentroom = $_GET['room'];
}
if(isset($_POST['movecheck'], $_POST['temperature'], $_POST['lightcheck'])) {
    if(!empty($_POST['movecheck']) AND !empty($_POST['lightcheck']) AND !empty($_POST['temperature'])) {
        $light = htmlspecialchars($_POST['lightcheck']);
        $move = htmlspecialchars($_POST['movecheck']);
        $temperature = htmlspecialchars($_POST['temperature']);
        $update = $bdd->prepare("UPDATE rooms SET movedetect = ? , light = ? , temperature = ? WHERE name = ?");
        $update -> execute(array($move,$light,$temperature,$currentroom));
        $message = 'Valeur mise à jour';
        echo$message;
    } else {
        $message = 'Veuillez remplir tous les champs';
        echo $message;
    }
}
?>

<title>Confort</title>
<link rel="stylesheet" type="text/css" href="confort.css">

<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Confort</h2></center>

<form action="?page=confortmap" method="post">
    <input type="submit" name="display" value="Tester l'option Map">
</form>

<form>
    <input type="submit" name="addhouse" value="Ajouter une maison">
</form>



<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `houses` INNER JOIN `users` ON houses.user_id = users.user_id WHERE houses.user_id = 1");
while($result=$getcontent->fetch()){
    echo
        '
        Les maisons : ' . $result['name'] . ' .
        '
    ;
}
?>

