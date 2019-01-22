<link rel="stylesheet" type="text/css" href="page_reveil.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Ajouter un réveil</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit']) AND isset($_GET['room'])) {
    if( !empty($_POST['name']) AND !empty($_POST['time']) AND ($_POST['once']) != ($_POST['weekly'])) {
        $name = htmlspecialchars($_POST['name']);
        $time = htmlspecialchars($_POST['time']);
        $once = htmlspecialchars($_POST['once']);
        $weekly = htmlspecialchars($_POST['weekly']);
        $room = htmlspecialchars($_GET['room']);
        if ($once == "on" ) {
            if (!empty($_POST['valdate'])) {
                $val1 = htmlspecialchars($_POST['valdate']);
                $set = $bdd->prepare("INSERT INTO `alarmclock`(`name`, `frequency`, `val1`, `val2`, `time`,`room_id`) VALUES (?,?,?,?,?,?)");
                $set -> execute(array($name,'once', $val1, NULL, $time,$room));
                $message="Le réveil a bien été ajouté.";
                header( "refresh:2;url=index.php?page=house&id=".$_GET['room']);
            }else{
                $message="Veuillez indiquer la date.";
            }
        }else{
            if (!empty($_POST['valday'])) {
                $val2 = implode(', ',$_POST['valday']);
                $set = $bdd->prepare("INSERT INTO `alarmclock`(`name`, `frequency`, `val1`, `val2`, `time`,`room_id`) VALUES (?,?,?,?,?,?)");
                $set -> execute(array($name,'weekly', NULL, $val2, $time,$room));
                $message="Le réveil a bien été ajouté.";
                header( "refresh:2;url=index.php?page=house&id=".$_GET['room']);
            }else{
                $message="Veuillez indiquer un ou plusieurs jours.";
            }
        }
    }else {
        $message = "Veuillez remplir tous les champs du formulaire.";
    }
}
?>


<div>
    <figure class="carte">
        <img src="https://i.kinja-img.com/gawker-media/image/upload/s--G7RWtlE9--/c_scale,f_auto,fl_progressive,q_80,w_800/bzxcgjzhlaf9xyb6odxm.jpg" alt="clock">
    </figure>
    <form class="formulaire" method="POST" action="" id="addreveil">
        <br><br>
        <input type="text" name="name" placeholder="Entrez le nom du réveil"><br><br>
        <input type="time" name="time">
        <h3>Fréquence</h3>
        <input type='hidden' value='off' name='once'>
        <input type="checkbox" value="on" id="checkOnce" name="once" onclick="reveal()">Une fois
        <input class="reveal" type="date" id="dateOnce" name="valdate" style="display:none">
        <br><br>
        <input type='hidden' value='off' name='weekly'>
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
        <input type="submit" name="submit" value="Ajouter le réveil">
        <br>
    </form>
</div>

<?php
if (isset ($message)) {
    echo $message;
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

