<?php
session_start();
include 'connect.php'; ?>

<br>
<center><h2 style="font-family:sans-serif; color: white; font-size: 100px;">CONNEXION</h2></center>
<?php


//first, check if the user is already signed in. If that is the case, there is no need to display this page
if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {

    echo 'Vous êtes connecté, cliquez ici <a href="logout.php">se déconnecter</a> pour vous déconnecter.';
} else {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        echo
        '<form method="post" action="">
                <center>
                    <h3>NOM UTILISATEUR</h3>
                    <input type="text" name="user_name" id="email"/>
                <br><br>
                    <h3>MOT DE PASSE</h3>
                    <input type="password" name="user_pass" id="pass"/>
                <br><br><br>
                    <input type="submit" id="ButtonConnexion" value="SE CONNECTER">
                </center>
                </form>';

    } else {

        $errors = array();

        if (!isset($_POST['user_name'])) {
            $errors[] = 'Le champ "nom d\'utilisateur" ne peut pas être vide.';
        }

        if (!isset($_POST['user_pass'])) {
            $errors[] = 'Le champ "mot de passe" ne peut pas être vide.';
        }

        if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
            echo 'Veuillez compléter tous les champs requis.';
            echo '<ul>';
            foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>';
        } else {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            //$hash=password_hash($_POST['user_pass'],PASSWORD_DEFAULT);
            $sql = "SELECT 
                        user_id,
                        user_name
                    FROM
                        users
                    WHERE
                        user_name = '" . mysqli_real_escape_string($link, $_POST['user_name']) . "'
                    AND
                        user_pass = '" . mysqli_real_escape_string($link, sha1($_POST['user_pass'])) . "'";

            mysqli_query($link, $sql);
            $result = mysqli_query($link, $sql);

            if (!$result) {
                //something went wrong, display the error
                echo 'Il y a eu une erreur lors de la connection. Veuillez réessayer.';
                echo mysqli_error($link); //debugging purposes, uncomment when needed
            } else {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if (mysqli_num_rows($result) == 0) {
                    echo 'Mauvaise combinaison nom utilisateur/mot de passe, veuillez réessayer.';
                } else {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;

                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name'] = $row['user_name'];
                    }

                    echo "Bienvenue '" . $_SESSION['user_name'] . "', cliquez ici <a href='index.php'> pour revenir à l'accueil.";
                }
            }
        }
    }
}

?>


</div>


</html>