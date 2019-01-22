<link rel="stylesheet" type="text/css" href="FAQ.css">
<title>FAQ</title>

<br>
<center><h2 style="font-family:sans-serif; color: BLACK; font-size: 50px;">Foire à Questions</h2></center>




</html>

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
$getcontent = $bdd->query("SELECT * FROM `pagefaq`");
while($result=$getcontent->fetch()){
    $spacefactor = floor(strlen($result['content'])/56);
    $spacepx = 240 + $spacefactor * 14;

    echo
        '<div class="container" ; id="cont'.$result['id'].'" ; style="background-color:#666666; height:200px">

    <p class="title" ; style="font-family:sans-serif">' . $result['question'] . '</p>

    <div class="overlay"></div>
    <div class="button">
        <button id="butprop" onclick="myFunction'.$result['id'].'(); contsize'.$result['id'].'() " ;
                style="font-family:sans-serif; background-color: none;color: white; border: 2px solid white;width:70px;height: 25px">
            Afficher
        </button>
        <br>
        <div class="textdiv" id="myDIV'.$result['id'].'" style="color:white; font-family:sans-serif">
            <br>
            <p>' . $result['content'] . '</p>

        </div>
    </div>
</div>

<script>
    var x'.$result['id'].' = document.getElementById("myDIV'.$result['id'].'");
    var y'.$result['id'].' = document.getElementById("cont'.$result['id'].'");
    x'.$result['id'].'.style.display = "none";
    function myFunction'.$result['id'].'() {
        var x'.$result['id'].' = document.getElementById("myDIV'.$result['id'].'");
        if ((x'.$result['id'].'.style.display == "none")) {
            x'.$result['id'].'.style.display = "block";

        } else {
            x'.$result['id'].'.style.display = "none";

        }

    }

    function contsize'.$result['id'].'() {
        if (y'.$result['id'].'.style.height != \''. $spacepx .'px\') {
            y'.$result['id'].'.style.height = \''. $spacepx .'px\';
        }
        else {
            y'.$result['id'].'.style.height = \'200px\';
        }
    }
</script>
'
    ;
}
?>