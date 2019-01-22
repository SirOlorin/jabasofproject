<!DOCTYPE html>
<html>
<link rel="stylesheet" href="ajout.css">
<body>
<center><h2 style="font-family:sans-serif; color: black; font-size: 100px;">Catalogue</h2></center>

<div class="center">
<div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')"> Tous</button>
    <button class="btn" onclick="filterSelection('objets')"> Objets Connectés</button>
    <button class="btn" onclick="filterSelection('fonctions')"> Fonctionnalités</button>
    <button class="btn" onclick="filterSelection('capteurs')"> Capteurs</button>
    <button class="btn" onclick="filterSelection('cameras')"> Caméras</button>
</div>

<div class="container">
    <?php

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

    $getcatalog = $bdd->query('SELECT * FROM `fonction`');
    while($result=$getcatalog->fetch()) {
        echo '
        <div class="filterDiv '.$result['categorie'].'">'.$result['name'].'</div>
        ';
    }
    ?>
</div>
</div>

<script>
    filterSelection("all")
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

</body>
</html>
