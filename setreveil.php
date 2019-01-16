<link rel="stylesheet" type="text/css" href="page_reveil.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Modification de réveil</h2></center>
<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit'], $_GET['id'])) {
    if( !empty($_POST['time']) AND ($_POST['once']) != ($_POST['weekly'])) {
        $id = $_GET['id'];
        echo $id;
        $time = htmlspecialchars($_POST['time']);
        $once = htmlspecialchars($_POST['once']);
        $weekly = htmlspecialchars($_POST['weekly']);
        if ($once == "on" ) {
            if (!empty($_POST['valdate'])) {
                $val1 = htmlspecialchars($_POST['valdate']);
                $set = $bdd->prepare("UPDATE alarmclock SET frequency = ? , val1 = ? , val2 = ?, `time` = ? WHERE id = ?");
                $set -> execute(array('once', $val1, NULL, $time, $id));
                $message="Le réveil a bien été programmé.";
            }else{
                $message="Veuillez entrer une date.";
            }
        }else{
            if (!empty($_POST['valday'])) {
                $val2 = implode(', ',$_POST['valday']);
                $set = $bdd->prepare("UPDATE alarmclock SET frequency = ? , val1 = ? , val2 = ?, `time` = ? WHERE id = ?");
                $set -> execute(array('weekly', NULL, $val2, $time, $id));
                $message="Le réveil a bien été programmé.";
            }else{
                $message="Veuillez indiquer au moins un jour de la semaine.";
            }
        }
    }else {
        $message = "Veuillez remplir les champs nécessaires.";
    }
}
if (isset ($message)) {
    echo $message;
}

if($_GET['id']) {
    $id=$_GET['id'];
}
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
$getcontent = $bdd->prepare("SELECT * FROM `alarmclock` WHERE id = ?");
$getcontent -> execute(array($id));
while($result=$getcontent->fetch()) {
    if ($result['val1'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val1'] . ' à ' . $result['time'];
    } else if ($result['val2'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val2'] . ' à ' . $result['time'];
    } else {
        $progmsg = "Cet alarme n'est pas encore programmée";
    }
    echo '
        <figure class="carte">
        <img src="https://i.kinja-img.com/gawker-media/image/upload/s--G7RWtlE9--/c_scale,f_auto,fl_progressive,q_80,w_800/bzxcgjzhlaf9xyb6odxm.jpg" alt="clock">
    </figure>
    <div>
    <form class="formulaire" method="POST" action="?page=setreveil&id='
        .
        $result['id']
        .
        '"><h3>'
        .
        $result['name']
        .
        '</h3><p>'
        .
        $progmsg
        .
        '</p>
        <h3>Heure du réveil</h3>
        <input type="time" name="time">
        <h3>Fréquence</h3>
        <input type=\'hidden\' value=\'off\' name=\'once\'>
        <input type="checkbox" value="on" id="checkOnce" name="once" onclick="reveal()">Une fois
        <input class="reveal" type="date" id="dateOnce" name="valdate" style="display:none">
        <br><br>
        <input type=\'hidden\' value=\'off\' name=\'weekly\'>
        <input type="checkbox" value="on" id="checkWeek" name="weekly" onclick="reveal()">Toutes les semaines
        <div class ="reveal" id="dayRadio" style="display:none">
            <p>Jours</p>
            <input type="checkbox" name="valday[]" value="lundi"> Lundi<br>
            <input type="checkbox" name="valday[]" value="mardi"> Mardi<br>
            <input type="checkbox" name="valday[]" value="mercredi"> Mercredi <br>
            <input type="checkbox" name="valday[]" value="jeudi"> Jeudi<br>
            <input type="checkbox" name="valday[]" value="vendredi"> Vendredi <br>
            <input type="checkbox" name="valday[]" value="samedi"> Samedi <br>
            <input type="checkbox" name="valday[]" value="dimanche"> Dimanche <br>
        </div>
        <br><br>
        <input type="submit" name="submit" value="Programmer">
        <br>
    </form>
    </div>
    
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
';

}

?>

