<?php
if(isset($_GET['id']) AND isset($_SESSION['user_id'])){

    $houseid=$_GET['id'];
    $user_id=$_SESSION['user_id'];
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

    $reqlink = $bdd -> query('SELECT `houselink_id` FROM `houselinks` WHERE `house_id`= '.$houseid.' AND `user_id`='.$user_id);
    $userlink = $reqlink -> rowCount();
    if ($userlink>0) {


        if (isset($_POST['deletehousemember'])) {
            if (!empty($_POST['deleteid'])) {
                $deleteid = htmlspecialchars($_POST['deleteid']);
                $getdelete = $bdd->query('DELETE FROM `houselinks` WHERE `house_id`= '.$houseid.' AND `user_id` = '.$deleteid);
                $message = "Le membre a bien été supprimé.";
            }
        }

        if (isset($_POST['deleteroom'])) {
            if (!empty($_POST['deletedroom'])) {
                $deletedroom = htmlspecialchars($_POST['deletedroom']);
                $reqroom = $bdd->query('SELECT `room_id` FROM `rooms` WHERE `room_id`= "'.$deletedroom.'" AND `house_id`='.$houseid);
                $roomexist = $reqroom->rowCount();
                if ($roomexist>0){
                    $deleteroom = $bdd->query('DELETE FROM `rooms` WHERE `house_id`= '.$houseid.' AND `room_id` = '.$deletedroom);
                    $message = "La pièce a bien été supprimée.";
                }else {
                    $message = "La pièce que vous voulez supprimer n'existe pas";
                }
            }
        }

        if (isset($_POST['addroom'])) {
            if (!empty($_POST['newroom'])){
                $newroom=$_POST['newroom'];
                $reqroom = $bdd->query('SELECT `room_id` FROM `rooms` WHERE `room_name`= "'.$newroom.'" AND `house_id`='.$houseid);
                $roomexist = $reqroom->rowCount();
                if ($roomexist==0){
                    $addroom = $bdd->query('INSERT INTO `rooms`(`room_name`, `movedetect`, `light`, `temperature`, `house_id`)
                                                  VALUES ("'.$newroom.'","off","off",25,'.$houseid.')');
                    $message = "La pièce à bien été ajoutée.";
                }else{
                    $message = "Ce nom de pièce est déjà attribué dans votre maison.";
                }
            }else{
                $message = "Veuillez remplir le champs.";
            }
        }

        if (isset($_POST['addbyname'])) {
            if (!empty($_POST['username'])){
                $username = $_POST['username'];
                $reqmember = $bdd->query('SELECT `houselink_id` FROM `houselinks` 
                                                   INNER JOIN `users` ON users.user_id = houselinks.user_id
                                                   INNER JOIN `houses` ON houses.house_id = houselinks.house_id 
                                                   WHERE users.user_name="'.$username.'"');
                $memberexist = $reqmember->rowCount();
                if ($memberexist==0){
                    $addbyname = $bdd->query('INSERT INTO `houselinks`(`house_id`, `user_id`)
                                                  VALUES ('.$houseid.',
                                                          (SELECT `user_id` FROM `users` WHERE `user_name` = "'.$username.'"))');
                    $message = "Le membre a bien été ajouté.";
                }else{
                    $message = "Le membre existe déjà";
                }
            }else{
                $message = "Veuillez remplir le champ du formulaire.";

            }
        }

        if (isset($_POST['addbymail'])) {
            if (!empty($_POST['email'])){
                $email=$_POST['email'];
                $reqmember = $bdd->query('SELECT `houselink_id` FROM `houselinks` 
                                                   INNER JOIN `users` ON users.user_id = houselinks.user_id
                                                   INNER JOIN `houses` ON houses.house_id = houselinks.house_id 
                                                   WHERE users.user_email="'.$email.'"');
                $memberexist = $reqmember->rowCount();
                if ($memberexist==0){
                    $addbymail = $bdd->query('INSERT INTO `houselinks`(`house_id`, `user_id`)
                                                  VALUES ('.$houseid.',
                                                          (SELECT `user_id` FROM `users` WHERE `user_email` = "'.$email.'"))');
                    $message = "Le membre a bien été ajouté.";
                }else {
                    $message = "Le membre existe déjà";
                }
            }else{
                $message = "Veuillez remplir le champ du formulaire.";
            }
        }




        $gethouse = $bdd->query("SELECT * FROM `houses` WHERE `house_id` =".$houseid);
        while($result=$gethouse->fetch()) {
            $houseadmin = $result['admin_id'];
            echo '
            <center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">' . $result['house_name'] . '</h2></center>
        ';
        }


        $getrooms = $bdd->query("SELECT * FROM `houses`
                                      INNER JOIN `rooms` ON  houses.house_id=rooms.house_id
                                      WHERE houses.house_id =".$houseid);

        echo '<div class="container">';
        echo '<h2>Pièces de la maison</h2>';
        echo '<button onclick="show2()">Ajouter un membre</button>
                
                    <form id="shownElement2" action="" method="post">
                        <input type="text" name="newroom" placeholder="Entrez le nom de la pièce">
                        <input type="submit" name="addroom" value="Ajouter une pièce" />
                    </form>
';

        while($result=$getrooms->fetch()) {
            echo '
            
                <figure class="roomaccess">
                    <figcaption>
                        <h3>' . $result['room_name'] . '</h3>
                    </figcaption>
                    <a href="?page=room&id=' . $result['room_id'] . '&houseid='.$houseid.'"></a>
                </figure>
                <form class = "roomform" action="?page=editroom&id=' . $result['room_id'] . '" method="post">
                    <input type="submit" name="editroom" value="Modifier" />
                </form>
                <form class="roomform" action="" method="post">
                    <input type="hidden" name="deletedroom" value="' . $result['room_id'] . '">
                    <input type="submit" name="deleteroom" value="Supprimer" />
                </form>
        ';
        }

        echo '</div>';

        if ($user_id==$houseadmin) {
            $getinfo = $bdd->query("SELECT * FROM `users`
                                      INNER JOIN `houselinks` ON users.user_id=houselinks.user_id
                                      INNER JOIN `houses` ON houselinks.house_id = houses.house_id
                                      WHERE houses.house_id =".$houseid);

            echo '<div class="container">
                <h2>Membres de la maison</h2>
                
                <button onclick="show()">Ajouter un membre</button>
                
                <table id="shownElement">
                <tr>
                    <form action="" method="post">
                        <th>
                            <input type="text" name="username">
                        </th>
                        <th>
                            <input type="submit" name="addbyname" value="Ajouter par nom d\'utilisateur" />
                        </th>
                    </form>
                </tr>
                <tr>
                    <form action="" method="post">
                        <th>
                            <input type="email" name="email">    
                        </th>         
                        <th>
                            <input type="submit" name="addbymail" value="Ajouter par mail" />
                        </th>                              
                    </form>
                </tr>
                </table>';





            echo '<table style="width:100%">
                          <tr>
                            <th>Prénom</th>
                            <th>Nom</th> 
                            <th>Adresse E-Mail</th>
                            <th>Action</th>
                          </tr>';

            while($result=$getinfo->fetch()) {
                if ($result['user_id']!=$user_id){
                    echo '
                          <tr>
                            <td>'.$result['user_firstname'].'</td>
                            <td>'.$result['user_lastname'].'</td> 
                            <td>'.$result['user_email'].'</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="deleteid" value="'.$result['user_id'].'">
                                    <center><input type="submit" name="deletehousemember" value="Supprimer" /></center>
                                </form>
                            </td>
                          </tr>   
                ';
                }
            }

            echo '</table>';
            echo '</div>';


        }
    }else{
        $message = "Vous n'avez pas accès à cette maison.";
    }









}

if (isset ($message)) {
    echo $message;
}

?>

<style type="text/css">

    table {
        text-align: center;
        width : 100%;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    #shownElement, #shownElement2 {
        width : 80%;
        margin-left: auto;
        margin-right: auto;
        display : none;
        padding-left : auto;
        padding-right : auto;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    #shownElement input {
        width : 100%;
    }

    .container {
        display: inline-block;
        vertical-align: top;
        background: white;
        text-align: center;
        width : 500px;
        margin-top: 50px;
        margin-left : 100px;
        margin-right : 100px;

    }

    .roomform{
        display: inline-block;
    }

    .roomform input {
        width : 150px;
    }

    .roomaccess {
        color : white;
        position: relative;
        overflow: hidden;
        padding-top: 10px;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        margin-top: 10px;
        margin-right : auto;
        margin-left : auto;
        width : 400px;

        margin-bottom: 10px;
        background: #2196F3;
        opacity: 0.7;
        transition: 0.3s;
    }

    .roomaccess:hover {
        opacity : 1;
    }

    .roomaccess a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
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

    function show2() {
        var x2 = document.getElementById("shownElement2");
        if (x2.style.display === "none") {
            x2.style.display = "block";
        } else {
            x2.style.display = "none";
        }
    }
</script>
