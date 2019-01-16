<link rel="stylesheet" type="text/css" href="FAQ.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Modifier la page FAQ</h2></center>


<br>
<form action="?page=addfaq" method="POST">
    <center><input type="submit" value="Ajouter une question"></center>
</form>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `pagefaq`");
while($result=$getcontent->fetch()){
    $spacefactor = floor(strlen($result['content'])/56);
    $spacepx = 290 + $spacefactor * 20;

    echo
        '
    <div class="backoffice">
    <h3>Question ' . $result['id'] . ' : ' . $result['question'] . '</h3>
    <p>' . $result['content'] . ' </p>
    <form action="?page=editfaq&id=' . $result['id'] . '" method="post">
        <input type="submit" value="Modifier" />
    </form>
    <form action="?page=deletefaq&id=' . $result['id'] . '" method="post">
        <input type="submit" name="deletefaq" value="Supprimer" />
    </form>
</div>
'
    ;
}
?>  
