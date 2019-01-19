
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getroom = $bdd->query("SELECT * FROM `rooms` WHERE room_id =".$_GET['room']);
while($result=$getroom->fetch()){
    if ($result['movedetect']=='on'){
        $movedetectcheck = ' checked';
    }else{
        $movedetectcheck = '';
    }
    if ($result['movedetect']=='on'){
        $lightcheck = ' checked';
    }else{
        $lightcheck = '';
    }
    echo
        '<div class="formulaire">
            <form action="" method="post">
                <h3>'.$result['room_name'].'</h3><br/>
                <h2>Détecteur de mouvement</h2><br/>
                <p>Activé / Désactivé</p><br/>
                <label class="switch">
                    <input id=\'mouvementhidden\' type=\'hidden\' value=\'off\' name=\'movecheck\'>
                    <input id="mouvement" type="checkbox" value="on" name="movecheck"'.$movedetectcheck.'>
                    <span class="slider"></span>
                </label>
                <br/>
                <h2>Lumière</h2><br/>
                <p>Allumé / Eteint</p><br/>
                <label class="switch">
                    <input id=\'lighthidden\' type=\'hidden\' value=\'off\' name=\'lightcheck\'>
                    <input id="light" type="checkbox" value="on" name="lightcheck"'.$lightcheck.'>
                    <span class="slider"></span>
                </label>
                <br/>
                <h2>Température</h2><br/>
                <input type="text" name="temperature" placeholder="en C°" value="'.$result['temperature'].'">
                <input type="submit" value="Valider">
            </form>
        </div>'
    ;
}
?>

<center><h2>Réveils</h2></center>

<?php

echo '
    <form action="?page=addreveil&room='.$_GET['room'].'" method="post">
        <center><input type="submit" name="addreveil" value="Ajouter un réveil"></center>
    </form>
';

$getclock = $bdd->query("SELECT * FROM `alarmclock` WHERE room_id=".$_GET['room']);
while($result=$getclock->fetch()) {
    if ($result['val1'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val1'] . ' à ' . $result['time'];
    }else if ($result['val2'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val2'] . ' à ' . $result['time'];
    }else{
        $progmsg = "Cet alarme n'est pas encore programmée";
    }
    echo
        '
    <div class="block">
        <h3>' . $result['name'] . '</h3>
        <p>' . $progmsg . '</p>
        <form action="?page=setreveil&id=' . $result['id'] . '" method="post">
            <input type="submit" value="Modifier" />
        </form>
        <form action="?page=deletereveil&id=' . $result['id'] . '" method="post">
            <input type="submit" name="deletereveil" value="Supprimer" />
        </form>
    </div>
'
    ;
}
?>



<script>
    function reveal() {
        var radioBox1 = document.getElementById("checkOnce");
        var displayValue1 = document.getElementById("dateOnce");
        var radioBox2 = document.getElementById("checkWeek");
        var displayValue2 = document.getElementById("dayRadio");

        if (radioBox1.checked == true){
            if (radioBox2.checked == true) {
                radioBox2.click();
            }
            displayValue1.style.display = "block";
        } else {
            displayValue1.style.display = "none";
        }
        if (radioBox2.checked == true) {
            if (radioBox1.checked == true) {
                radioBox1.click();
            }
            displayValue2.style.display = "block";
        }else {
            displayValue2.style.display = "none";
        }
    }
</script>

<center><h2>Caméra</h2></center>

<?php
echo '
<form action="?page=addcamera&room='.$_GET['room'].'" method="post">
    <center><input type="submit" name="addcamera" value="Ajouter une Caméra"></center>
</form>
';

$getcamera = $bdd->query("SELECT * FROM `cameras` WHERE room_id=".$_GET['room']);
while($result=$getcamera->fetch()) {
    echo
        '
    <center>
    <div class="block">
        <figure>
            <img src="'.$result['camera_url'].'">
        </figure>
    </div>
    </center>
'
    ;
}
?>
