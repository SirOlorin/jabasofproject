<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_GET['room'])) {
    $roomid = $_GET['room'];
}
if(isset($_POST['movecheck'], $_POST['temperature'], $_POST['lightcheck'])) {
    if(!empty($_POST['movecheck']) AND !empty($_POST['lightcheck']) AND !empty($_POST['temperature'])) {
        $light = htmlspecialchars($_POST['lightcheck']);
        $move = htmlspecialchars($_POST['movecheck']);
        $temperature = htmlspecialchars($_POST['temperature']);
        $update = $bdd->prepare("UPDATE rooms SET movedetect = ? , light = ? , temperature = ? WHERE room_id = ?");
        $update -> execute(array($move,$light,$temperature,$roomid));
        $message = 'Valeur mise à jour';
        echo$message;
    } else {
        $message = 'Veuillez remplir tous les champs';
        echo $message;
    }
}
?>

    <title>Confort</title>
    <link rel="stylesheet" type="text/css" href="demomap.css">

    <center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Confort</h2></center>

    <form action="?page=house" method="">
        <input type="submit" value="Retour">
    </form>

    <figure class="figure">
        <img src="plan.png" width="967" height="455" alt="plan" usemap="#plan">
    </figure>

    <map name="plan">
        <area shape="rect" coords="11,14,152,226" href="?page=demomap&room=1" alt="Bathroom">
        <area shape="rect" coords="162,14,459,178" href="?page=demomap&room=2" alt="Bedroom">
        <area shape="rect" coords="467,14,655,177" href="?page=demomap&room=3" alt="Bedroom2">
        <area shape="rect" coords="664,14,858,178" href="?page=demomap&room=4" alt="Bedroom3">
        <area shape="rect" coords="869,13,959,226" href="?page=demomap&room=5" alt="Bathroom1">
        <area shape="poly" coords="162,186,858,187,858,248,205,249,206,225,162,225" href="?page=demomap&room=6" alt="Hallway">
        <area shape="rect" coords="11,236,196,446" href="?page=demomap&room=7" alt="Kitchen">
        <area shape="poly" coords="206,257,860, 256, 860, 284, 958, 285, 957, 444, 206, 445" href="?page=demomap&room=8" alt="Living Room">
        <area shape="rect" coords="868,237,955,277" href="?page=demomap&room=9 alt="Bathroom2">
    </map>

<?php
if(isset($_GET['room'])) {
    include('demomapcontent.php');
}
?>