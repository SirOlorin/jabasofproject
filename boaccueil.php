<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Modifier la page d'accueil</h2></center>


<br>
<form action="?page=addaccueil" method="POST">
    <center><input type="submit" value="Ajouter un article"></center>
</form>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `pageaccueil`");
while($result=$getcontent->fetch()){
    echo
        '<div class="bandeau">
    <figure class="carte" id="confort">
        <img src="' . $result['photo'] . '" alt="confort"/>
        <a href="?page=confort"></a>
    </figure>
    <div class="contenutexte">
        <h3>' . $result['titre'] . '</h3><br>
        <p>' .  $result['content'] . '</p>
        <form action="?page=editaccueil&id=' . $result['id'] . '" method="post">
            <input type="submit" value="Modifier" />
        </form>
        <form action="?page=deleteaccueil&id=' . $result['id'] . '" method="post">
            <input type="submit" name="deleteaccueil" value="Supprimer" />
        </form>
    </div>
</div>'
    ;
}

?>
