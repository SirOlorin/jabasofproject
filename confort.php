<?php

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
