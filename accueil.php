<title>Accueil</title>
<link rel="stylesheet" type="text/css" href="accueil.css">
<br>

<center><h2 style="font-family:sans-serif; color: #373737; font-size: 200px;">ACCUEIL</h2></center>

<!--
<div id="block page">

    <div class="bandeau">
        <figure class="carte" id="confort">
            <img src="https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg" alt="confort"/>
            <a href="?page=confort"></a>
        </figure>
        <div class="contenutexte">
            <h3>Nous facilitons et sécurisons la vie de nos utilisateurs</h3><br>
            <p>Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :
                <br>- Le confort
                <br>- La sécurité
                <br>- La matinée
                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal
                pour un effort moindre. La température, la luminosité, l'ouverture des stores pourrons
                enfin être réglables d'un simple geste grâce à notre application.
                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n'aurez plus
                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l'esprit
                tranquille.
            </p>
        </div>
    </div>


    <div class="bandeau">
        <figure class="carte" id="confort">
            <img src="https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg" alt="confort"/>
            <a href="?page=confort"></a>
        </figure>
        <div class="contenutexte">
            <h3>Nous facilitons et sécurisons la vie de nos utilisateurs</h3><br>
            <p>Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :
                <br>- Le confort
                <br>- La sécurité
                <br>- La matinée
                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal
                pour un effort moindre. La température, la luminosité, l'ouverture des stores pourrons
                enfin être réglables d'un simple geste grâce à notre application.
                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n'aurez plus
                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l'esprit
                tranquille.
            </p>
        </div>
    </div>

    <div class="bandeau">
        <figure class="carte" id="confort">
            <img src="https://freshidees.com/wp-content/uploads/2017/04/pouf-geant-1-410x390.jpg" alt="confort"/>
            <a href="?page=confort"></a>
        </figure>
        <div class="contenutexte">
            <h3>Nous facilitons et sécurisons la vie de nos utilisateurs</h3><br>
            <p>Nous facilitons la vie de nos utilisateurs à travers 3 grands aspects :
                <br>- Le confort
                <br>- La sécurité
                <br>- La matinée
                <br><br>À travers différents systèmes interconnectés nous vous assurons un confort optimal
                pour un effort moindre. La température, la luminosité, l'ouverture des stores pourrons
                enfin être réglables d'un simple geste grâce à notre application.
                <br>Grâce à différents systèmes de caméra connectées à notre centre, vous n'aurez plus
                <br>de soucis de cambriolage. Grâce à ce système, vous pourrez enfin sortir l'esprit
                tranquille.
            </p>
        </div>
    </div>
    </div>
-->
<br>
<center><a name="presentation"><h1>Jabasof, l'innovation chez vous !</h1></center></a>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `pageaccueil`");
while($result=$getcontent->fetch()){
    echo
        '<div class="container">
    <figure class="carte" id="confort">
        <img src="'
        .
        $result['photo']
        .
        '" alt="confort"/>
        <a href="?page=confort"></a>
    </figure>
    <div class="contenutexte">
        <h3>'
        .
        $result['titre']
        .
        '</h3><br>
        <p>'
        .
        $result['content']
        .
        '</p>
    </div>
</div>'
    ;
}
?>

