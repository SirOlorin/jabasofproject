<?php
//create_cat.php
include 'connect.php';
include 'header_forum.php';


echo '<tr>';
            echo '<a href="category.php?id=">Catégorie</a>';
echo '</tr>';



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

$sql2 = 'SELECT
            cat_id,
            cat_name,
            cat_description,
        FROM
            categories';
 
if($result != mysqli_query($link, $sql2))
{
    echo 'Les catégories n ont pas pu être affiché. Veuillez réessayer ultérieurement.';
}
/*else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'Pas de catégories définies pour l instant.';
    }*/
    else
    {
        //prepare the table
        echo '<table border="1">
              <tr>
                <th>Catégorie</th>
                <th>Dernier sujet</th>
              </tr>'; 
        if($result = mysqli_query($link, $sql2))
        {     
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo "<h3><a href='category.php?id'> '".$row['cat_name']."'</a></h3>'".$row['cat_description']."'";
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="topic.php?id=">Sujet</a>';
                echo '</td>';
            echo '</tr>';
        }
    }
}




?>

