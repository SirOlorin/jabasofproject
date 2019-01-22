<?php

include 'connect.php';



if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {

    include 'header_forum.php';

$sql = "SELECT
            cat_id,
            cat_name,
            cat_description,
            last_topic
        FROM
            categories";


$result = mysqli_query($link, $sql);

if($result != mysqli_query($link, $sql))
{
    echo 'Les catégories n\'ont pas pu être affiché. Veuillez réessayer ultérieurement.';
}
else
{

    if(mysqli_num_rows($result) == 0)
    {
        echo 'Pas de catégories définies pour l\'instant.';
    }
    else
    {
        //prepare the table
        echo '<table border="1">
              <tr>
                <th>Catégories</th>
                <th>Dernier sujet</th>
              </tr>';
        //if($result = mysqli_query($link, $sql))
        //{


        while($row = mysqli_fetch_array($result))
        {
            if($_SESSION['user_id'] == 1) {
                echo '<td class="lefterpart">';
                echo " <a href='deletecat.php?cat_id=".$row['cat_id']."'>Supprimer catégorie </a>";
                echo '</td>';
        }

            echo '<tr>';
            echo '<td class="leftpart">';
            echo "<h3><a href='category.php?cat_id=$row[cat_id]'> '".$row['cat_name']."'</a></h3>'".$row['cat_description']."'";
            echo '</td>';
            echo '<td class="rightpart">';
            echo "<a href='topic.php?topic_id=$row[cat_id]'>'".$row['last_topic']."'</a>";
            echo '</td>';
            echo '</tr>';
        }
    }
    /*$cat_name = isset($_POST['cat_name']) ? $_POST['cat_name'] : NULL;
    $rows[] = $row;
    foreach($rows as $row)
    {
    echo $row['cat_name'];
    }*/
}

}
else {
    echo "Désolé, vous devez être <a href='index.php?page=connexion'> connecté </a>  pour accéder au forum.";
}

?>