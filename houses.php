

<title>Mes maisons</title>
<link rel="stylesheet" type="text/css" href="demomap.css">

<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Mes maisons</h2></center>

<div class="inputcont"><form action="?page=demomap" method="post">
    <input type="submit" name="display" value="Tester l'option Map">
</form>

<?php

echo '<form action="?page=addhouse" method="post">
    <input type="submit" value="Ajouter une maison">
</form></div>';

$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

if (isset($_GET['id']) AND $_SESSION['user_id']==1){
    $userid = htmlspecialchars($_GET['id']);
}else{
    $userid = htmlspecialchars($_SESSION['user_id']);
}
$getcontent = $bdd->query("SELECT * FROM `houses` 
                                    INNER JOIN `houselinks` ON houses.house_id = houselinks.house_id 
                                    INNER JOIN `users` ON users.user_id = houselinks.user_id 
                                    WHERE users.user_id =".$userid);
while($result=$getcontent->fetch()){
    echo
        '        
        <div class="container">
            <figure class="carte" id="confort">
                <img src="https://i.ytimg.com/vi/9EjRuBPguKA/maxresdefault.jpg" alt="confort"/>
                <figcaption>
                    <h3>' . $result['house_name'] . '</h3>
                </figcaption>
                <a href="?page=house&houseid=' . $result['house_id'] . '&userid='.$userid.'"></a>
            </figure>
        </div>
        '
    ;
}
?>

