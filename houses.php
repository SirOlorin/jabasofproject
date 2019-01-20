

<title>Mes maisons</title>
<link rel="stylesheet" type="text/css" href="demomap.css">

<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Mes maisons</h2></center>

<form action="?page=demomap" method="post">
    <input type="submit" name="display" value="Tester l'option Map">
</form>

<?php

echo '<form action="?page=addhouse&user='.$_SESSION['user_id'].'" method="post">
    <input type="submit" name="addhouse" value="Ajouter une maison">
</form>';

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

