<!DOCTYPE html>
<html>
<link rel="stylesheet" href="ajout.css">
<body>
<center><h2 style="font-family:sans-serif; color: white; font-size: 100px;">Catalogue</h2></center>

<div class="center">
<div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')"> Tous</button>
    <button class="btn" onclick="filterSelection('objets')"> Objets Connectés</button>
    <button class="btn" onclick="filterSelection('fonctions')"> Fonctionnalités</button>
    <button class="btn" onclick="filterSelection('capteurs')"> Capteurs</button>
    <button class="btn" onclick="filterSelection('cameras')"> Caméras</button>
</div>

<div class="container">
    <div class="filterDiv objets">Montre Connectée</div>
    <div class="filterDiv fonctions">Verrou Digital</div>
    <div class="filterDiv capteurs">Capteur d'humidité</div>
    <div class="filterDiv cameras">Cam 3.0</div>
    <div class="filterDiv objets">Baguette Magique</div>
    <div class="filterDiv fonctions">Météo</div>
    <div class="filterDiv capteurs">Capteur de pollution</div>
    <div class="filterDiv cameras">Camera mobile</div>
    <div class="filterDiv cameras">Camera à vision nocturne</div>
    <div class="filterDiv fonctions">Verrou à empreinte</div>
    <div class="filterDiv objets">Enceinte connectée</div>
    <div class="filterDiv fonctions">Support 24/7</div>
    <div class="filterDiv capteurs">Détecteur infrarouge</div>
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
