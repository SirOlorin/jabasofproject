<?php
session_start();
include 'connect.php'; ?>

<br>
<center>
    <br><br><br>
    <h2 style="font-family:sans-serif; color: white; font-size: 100px;">INSCRIPTION</h2>
</center>

<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo
    '
                <form method="post" action="">
                <center>
                    <h3>NOM</h3>
                    <p>
                        <input type="text" name="user_name" id="NOM">
                    </p>
                    <h3>MOT DE PASSE</h3>
                    <p>
                        <input type="password" name="user_pass"/>
                    </p>
                    <h3>CONFIRMER MOT DE PASSE</h3>
                    <p>
                        <input type="password" name="user_pass_check"/>
                    </p>
                    <h3>ADRESSE E-MAIL</h3>
                    <p>
                        <input type="text" name="user_email" id="email"/>
                    </p>
                    <br><br><br>
                    <input type="submit"/>
                </center>
                </form>
                ';
} else {
    /* Maintenant que le formulaire est prêt on doit :
        1.  Vérifier les infos utilisateurs
        2.  Laisser l'utilisateur re-remplir un champs invalide et afficher une erreur
        3.  Sauvegarder les données
    */
    $errors = array(); /* on déclare l'array pour l'utiliser plus tard */

    if (isset($_POST['user_name'])) {
        //le nom d'utilisateur existe déjà
        if (!ctype_alnum($_POST['user_name'])) {
            $errors[] = 'Le nom d\'utilisateur ne doit contenir que des lettres et des nombres.';
        }
        if (strlen($_POST['user_name']) > 30) {
            $errors[] = 'Le nom d\'utilisateur ne peut pas dépasser 30 caractères.';
        }
    } else {
        $errors[] = 'Le champ du nom d\'utilisateur ne peut pas être vide.';
    }


    if (isset($_POST['user_pass'])) {
        if ($_POST['user_pass'] != $_POST['user_pass_check']) {
            $errors[] = 'Les deux mots de passe ne correspondent pas.';
        }
    } else {
        $errors[] = 'Le champ de mot de passe ne doit pas être vide.';
    }

    if (!empty($errors)) /*On vérifie si l'array est nul, si il y a des erreurs, elles sont dans l'array*/ {
        echo 'Veuillez remplir tous les champs.';
        echo '<ul>';
        foreach ($errors as $key => $value) {
            echo '<li>' . $value . '</li>'; /* on affiche la liste des erreurs*/
        }
        echo '</ul>';
    } else {



        $mysqli = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date)
                VALUES('" . mysqli_real_escape_string($link, $_POST['user_name']) . "',
                       '" . mysqli_real_escape_string($link,(sha1($_POST['user_pass']))) . "',
                       '" . mysqli_real_escape_string($link, $_POST['user_email']) . "',
                        NOW(),
                        0)";


        mysqli_query($link, $mysqli);
        $result = mysqli_query($link, $mysqli);

        /*if(!$result)
        {

            echo 'Something went wrong while registering. Please try again later.';
            echo mysqli_error($link); //debugging purposes, uncomment when needed
        }
        else
        {*/
        echo 'Vous voilà inscrit ! Vous pouvez désormais <a href="?page=connexion">vous connecter</a> et commencer à poster !';
        //}

    }
}

?>
</center>
<br><br><br>

</div>


</html>