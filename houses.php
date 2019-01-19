
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
<link rel="stylesheet" type="text/css" href="demomap.css">

<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Confort</h2></center>

<form action="?page=demomap" method="post">
    <input type="submit" name="display" value="Tester l'option Map">
</form>

<form action="?page=addhouse" method="post">
    <input type="submit" name="addhouse" value="Ajouter une maison">
</form>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `houses` 
                                    INNER JOIN `houselinks` ON houses.house_id = houselinks.house_id 
                                    INNER JOIN `users` ON users.user_id = houselinks.user_id 
                                    WHERE users.user_id =".$_SESSION['user_id']);
while($result=$getcontent->fetch()){
    echo
        '        
        <div class="container">
            <figure class="carte" id="confort">
                <img src="http://rmacl.org/rmacl/wp-content/uploads/Happy-House.jpg" alt="confort"/>
                <figcaption>
                    <h3>' . $result['house_name'] . '</h3>
                </figcaption>
                <a href="?page=house&id=' . $result['house_id'] . '"></a>
            </figure>
        </div>
        '
    ;
}
?>

