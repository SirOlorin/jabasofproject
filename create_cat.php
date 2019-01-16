<?php
//create_cat.php

include 'connect.php';
include 'header_forum.php';


echo '<tr>';
echo '<a href="category.php?id=">Catégorie</a>';
echo '</tr>';


if($_SESSION['signed_in'] == false)
{
    //the user is not signed in
    echo 'Désolé, vous devez être <a href="/forum/signin.php">connecté</a> pour créer un sujet.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        //the form hasn't been posted yet, display it
        echo '<form method="post" action="">
        Nom de la catégorie: <input type="text" name="cat_name" />
        Description : <textarea name="cat_description" /></textarea>
        <input type="submit" value="Ajouter une catégorie" />
     </form>';
    }
    else
    {
        //the form has been posted, so save it
        $sql = "INSERT INTO categories (cat_name, cat_description)
         VALUES ('" . mysqli_real_escape_string($link, $_POST['cat_name']) . "',
                '" . mysqli_real_escape_string($link, $_POST['cat_description']) . "')";

        mysqli_query($link, $sql);
        $result = mysqli_query($link, $sql);

        /*if (!$result) {
        printf("Erreur : %s\n", $link->error);
        }
        else
        {*/
        echo 'Nouvelle catégorie crée !';
        //}
    }


}


?>