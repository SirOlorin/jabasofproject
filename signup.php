<?php
//signup.php
include 'connect.php';
include 'header_forum.php';
 
echo '<h3>S enregister</h3>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{

    echo '<form method="post" action="">
        Nom d utilisateur: <input type="text" name="user_name" />
        Mot de passe: <input type="password" name="user_pass">
        Saississez de nouveau votre mot de passe : <input type="password" name="user_pass_check">
        E-mail: <input type="email" name="user_email">
        <input type="submit" value="S inscrire" />
     </form>';

}
else
{
    /* Maintenant que le formulaire est prêt on doit :
        1.  Vérifier les infos utilisateurs
        2.  Laisser l'utilisateur re-remplir un champs invalide et afficher une erreur
        3.  Sauvegarder les données
    */
    $errors = array(); /* on déclare l'array pour l'utiliser plus tard */
     
    if(isset($_POST['user_name']))
    {
        //le nom d'utilisateur existe déjà
        if(!ctype_alnum($_POST['user_name']))
        {
            $errors[] = 'Le nom d utilisateur ne doit contenir que des lettres et des nombres.';
        }
        if(strlen($_POST['user_name']) > 30)
        {
            $errors[] = 'Le nom d utilisateur ne peut pas dépasser 30 caractères.';
        }
    }
    else
    {
        $errors[] = 'Le champ du nom d utilisateur ne peut pas être vide.';
    }
     
     
    if(isset($_POST['user_pass']))
    {
        if($_POST['user_pass'] != $_POST['user_pass_check'])
        {
            $errors[] = 'Les deux mots de passe ne correspondent pas.';
        }
    }
    else
    {
        $errors[] = 'Le champ de mot de passe ne doit pas être vide.';
    }
     
    if(!empty($errors)) /*On vérifie si l'array est nul, si il y a des erreurs, elles sont dans l'array*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value)
        {
            echo '<li>' . $value . '</li>'; /* on affiche la liste des erreurs*/
        }
        echo '</ul>';
    }	
    else
    {

        $mysqli = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($link, $_POST['user_name']) . "',
                       '" . mysqli_real_escape_string($link, $_POST['user_pass']) . "',
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
            echo 'Vous voilà inscrit ! Vous pouvez désormais <a href="connexion.php">vous connecter</a> et commencer à poster !';
    //}
    
    }
}
 

?>