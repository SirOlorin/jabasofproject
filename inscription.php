<?php

include 'connect.php'; ?>

<br>
<center>
    <br><br><br>
    <h2 style="font-family:sans-serif; color: white; font-size: 100px;">INSCRIPTION</h2>
</center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    echo
    '
                <form method="post" action="">
                <center>
                    <h3>NOM D\'UTILISATEUR</h3>
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
            $errors[] = 'Nom d\'utilisateur ne doit contenir que des chiffres et des lettres..';
        }
        $username = $_POST['user_name'];
        if($username != "") {
            $result = mysqli_query($link,"SELECT * FROM users where user_name='".$username."'");
            $num_rows = mysqli_num_rows($result);
            if($num_rows >= 1){
                $errors[] = 'Ce nom d\'utilisateur est déjà utilisé.';
            }
        }
        $email = $_POST['user_email'];
        if($email != "") {
            $result = mysqli_query($link,"SELECT * FROM users where user_email='".$email."'");
            $num_rows = mysqli_num_rows($result);
            if($num_rows >= 1){
                $errors[] = "Cet email est déjà utilisé.";
            }
        }
        /*if (!ctype_alnum($_POST['user_email'])) {
            $errors[] = 'Cet email est déjà utilisé.';
        }*/
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


/*
        $mysqli = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date)
                VALUES(" . mysqli_real_escape_string($link, $_POST['user_name']) . ",
                       '" . mysqli_real_escape_string($link,(sha1($_POST['user_pass']))) . "',
                       '" . mysqli_real_escape_string($link, $_POST['user_email']) . "',
                       NOW()";


        mysqli_query($link, $mysqli);
        $result = mysqli_query($link, $mysqli);
*/

     $name = htmlspecialchars($_POST['user_name']);
     $pass = sha1($_POST['user_pass']);
     $mail = htmlspecialchars($_POST['user_email']);

        $set = $bdd->prepare("INSERT INTO `users`(`user_name`, `user_pass`, `user_email`, `user_date`) VALUES (?,?,?,now())");
        $set -> execute(array($name, $pass, $mail));


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