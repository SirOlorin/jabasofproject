<?php
if(isset($_GET['id']) AND isset($_SESSION['user_id']) AND isset($_GET['houseid'])) {
    $houseid = htmlspecialchars($_GET['houseid']);
    $roomid = htmlspecialchars($_GET['id']);
    $user_id = htmlspecialchars($_SESSION['user_id']);
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

    $reqlink = $bdd -> query('SELECT * FROM `rooms` 
                                            INNER JOIN `houselinks` ON houselinks.house_id = rooms.house_id
                                            WHERE rooms.room_id = '.$roomid.' AND rooms.house_id = '.$houseid.' AND houselinks.user_id = '.$user_id);
    $userlink = $reqlink -> rowCount();
    if ($userlink>0) {

        if(isset($_POST['movecheck'], $_POST['temperature'], $_POST['lightcheck'])) {
            if(!empty($_POST['movecheck']) AND !empty($_POST['lightcheck']) AND !empty($_POST['temperature'])) {
                $light = htmlspecialchars($_POST['lightcheck']);
                $move = htmlspecialchars($_POST['movecheck']);
                $temperature = htmlspecialchars($_POST['temperature']);
                $update = $bdd->prepare("UPDATE rooms SET movedetect = ? , light = ? , temperature = ? WHERE room_id = ?");
                $update -> execute(array($move,$light,$temperature,$roomid));
                $message = 'Valeur mise à jour';
            } else {
                $message = 'Veuillez remplir tous les champs';
            }
        }

        if (isset($_POST['editroom'])) {
            if (!empty($_POST['newname'])) {
                $newname = htmlspecialchars($_POST['newname']);
                $setname = $bdd->query('UPDATE `rooms` SET `room_name`="'.$newname.'" WHERE `room_id`='.$roomid);
                $message = "Le nom a bien été modifié.";
            }else{
                $message = "Veuillez indiquer un nom.";
            }
        }

        $getroom = $bdd->query("SELECT * FROM `rooms` WHERE room_id =".$_GET['id']);
        while($result=$getroom->fetch()){
            if ($result['movedetect']=='on'){
                $movedetectcheck = ' checked';
            }else{
                $movedetectcheck = '';
            }
            if ($result['light']=='on'){
                $lightcheck = ' checked';
            }else{
                $lightcheck = '';
            }
            echo
                '
                
                
            <div class="titlecont">
                <h2 style="font-family:sans-serif; color: black; font-size: 50px;">'.$result['room_name'].'</h2>
                <button onclick="show()">Renommer</button>
                    <form id="shownElement" action="" method="post">
                        <input type="text" name="newname" placeholder="Entrez le nouveau nom">
                        <input type="submit" name="editroom" value="Renommer la pièce" />
                    </form>
            </div>
                
                <div class="container">
                    <div id="titlecontainer">
                        <h3>Réglage de confort</h3>
                    </div>
                    
                    <div id="contentcontainer">            
                        <form action="" method="post">      
                                
                            <table>
                                <tr>
                                    <th>
                                        <p>Détecteur de mouvement</p>
                                    </th>
                                    
                                    <th>
                                        <p>Lumière</p>
                                    </th>
                                    
                                    <th>
                                        <p>Température</p>
                                    </th>
                                </tr>
                                
                                <tr>
                                    <th>
                                        <label class="switch">                        
                                            <input id=\'mouvementhidden\' type=\'hidden\' value=\'off\' name=\'movecheck\'>
                                            <input id="mouvement" type="checkbox" value="on" name="movecheck"'.$movedetectcheck.'>
                                            <span class="slider"></span>
                                        </label>
                                    </th>
                                    <th>
                                        <label class="switch">                        
                                            <input id=\'lighthidden\' type=\'hidden\' value=\'off\' name=\'lightcheck\'>
                                            <input id="light" type="checkbox" value="on" name="lightcheck"'.$lightcheck.'>
                                            <span class="slider"></span>
                                        </label>
                                    </th>                       
                                   <th> 
                                        <input type="text" name="temperature" placeholder="en C°" value="'.$result['temperature'].'">
                                        <input type="submit" value="Valider">
                                   </th>
                                </tr>
                                
                            </table>                    
                        </form>                
                    </div>
                    
                </div>'
            ;
        }




    }else{
        $message = "Mauvaise chambre.";
    }
}


if (isset ($message)) {
    echo $message;
}

?>

<style type="text/css">

    #shownElement {
        display: none;
    }
      .titlecont {
          text-align: center;
          height: 130px;
      }

    .titlecont input {
        margin-top: 1em;
        margin-bottom: 1em;
    }

    table {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;

    }

    p, label {
        display: inline-block;
        vertical-align: center;
    }

    .container {
        text-align: center;
        margin-top: 10px;
        margin-right: 10px;
        margin-left: 10px;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;

        width : auto;
    }

    #titlecontainer {


    }

    #contentcontainer {
        margin-top: 10px;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        width : 60%;
        background: white;
        text-align: center;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

</style>

<script>
    function show() {
        var x = document.getElementById("shownElement");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>