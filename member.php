<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
?>

<link rel="stylesheet" type="text/css" href="member.css">

<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Espace Membre</h2></center>


    <div class="container">
        <div class="subcontainers">
            <?php
            if (isset($_GET['id']) AND $_SESSION['user_id']==1){
                $userid = htmlspecialchars($_GET['id']);
            }else{
                $userid = htmlspecialchars($_SESSION['user_id']);
            }
            $getinfos = $bdd->query("SELECT * FROM `users` 
                                                    WHERE users.user_id = ".$userid);
            while($result=$getinfos->fetch()){
                echo
                    '        
                        <h2>Informations du compte</h2>

                            <h3>Nom d\'utilisateur</h3>
                            <p>'.$result['user_name'].'</p>
                            <form action="?page=memberedit&value=user_name&id='.$userid.'" method="post">
                                <input type="submit" value="Modifier le nom d\'utilisateur" />
                            </form>
                        
                            <h3>Prénom</h3> 
                            <p>'.$result['user_firstname'].'</p>
                            <form action="?page=memberedit&value=user_firstname&id='.$userid.'" method="post">
                                <input type="submit" value="Modifier le prénom" />
                            </form>
                        
                            <h3>Nom</h3>
                            <p>'.$result['user_lastname'].'</p>
                            <form action="?page=memberedit&value=user_lastname&id='.$userid.'" method="post">
                                <input type="submit" value="Modifier le nom de famille" />
                            </form>
                        
                            <h3>Mot de passe</h3>
                            <p>[Caché]</p>
                            <form action="?page=memberedit&value=user_pass&id='.$userid.'" method="post">
                                <input type="submit" value="Modifier le mot de passe" />
                            </form>
                       
                            <h3>Adresse Mail</h3>
                            <p>'.$result['user_email'].'</p>
                            <form action="?page=memberedit&value=user_email&id='.$userid.'" method="post">
                                <input type="submit" value="Modifier l\'adresse mail" />
                            </form>
                       
                        
                '
                ;
            }
            ?>


        </div>


        <div class="subcontainers">
            <h2>Mes Maisons</h2>
            <?php
            if (isset($_GET['id']) AND $_SESSION['user_id']==1){
                echo '
                <form action="?page=houses&id='.$userid.'" method="post">
                    <input type="submit" value="Accéder">
                </form><br>
            ';
            }else{
                echo '
                <form action="?page=houses" method="post">
                    <input type="submit" value="Accéder">
                </form><br>
            ';
            }

            $gethouses = $bdd->query("SELECT * FROM `users` 
                                                    INNER JOIN `houselinks` ON users.user_id = houselinks.user_id
                                                    INNER JOIN `houses` ON houses.house_id = houselinks.house_id
                                                    WHERE users.user_id =".$userid);
            while($result=$gethouses->fetch()){
                echo
                '        
                        <p>'.$result['house_name'].'</p>
                '
                ;
            }
            ?>

        </div>

    </div>
