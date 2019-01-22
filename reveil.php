<title>Page Réveil</title>
<link rel="stylesheet" type="text/css" href="page_reveil.css">

<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Réveil</h2></center>
<br>
<br>
<form action="?page=addreveil" method="post">
    <center><input type="submit" name="addreveil" value="Ajouter un réveil"></center>
</form>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
$getcontent = $bdd->query("SELECT * FROM `alarmclock`");
while($result=$getcontent->fetch()) {
    if ($result['val1'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val1'] . ' à ' . $result['time'];
    }else if ($result['val2'] != NULL) {
        $progmsg = 'Cet alarme est programmée pour sonner le ' . $result['val2'] . ' à ' . $result['time'];
    }else{
        $progmsg = "Cet alarme n'est pas encore programmée";
    }
    echo
        '
    <div class="container">
        <figure class="carte">
            <img src="https://i.kinja-img.com/gawker-media/image/upload/s--G7RWtlE9--/c_scale,f_auto,fl_progressive,q_80,w_800/bzxcgjzhlaf9xyb6odxm.jpg" alt="clock">
        </figure>
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



<figure class="carte">
    <img src="https://i.kinja-img.com/gawker-media/image/upload/s--G7RWtlE9--/c_scale,f_auto,fl_progressive,q_80,w_800/bzxcgjzhlaf9xyb6odxm.jpg" alt="clock">
</figure>
<div>
<form class="formulaire" method="POST" action="">
    <h3>Réveil 1</h3>
    <p>Programmé ou non programmé</p>
    <h3>Heure du réveil</h3>
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
    <input type="submit" name="submit" value="Programmer">
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
