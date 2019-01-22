<?php
//create_cat.php

include 'connect.php';
include 'header_forum.php';

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
        $sql = "INSERT INTO categories (cat_name, cat_description, last_topic)
         VALUES ('" . mysqli_real_escape_string($link, $_POST['cat_name']) . "',
                '" . mysqli_real_escape_string($link, $_POST['cat_description']) . "',
                    'Vide')";

        $result = mysqli_query($link, $sql);

        /*if (!$result) {
        printf("Erreur : %s\n", $link->error);
        }
        else
        {*/
        echo 'Nouvelle catégorie crée !';
        //}
    }


?>