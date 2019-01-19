<?php

include 'connect.php';

include 'header_forum.php';

$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
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
                <th>Catégorie</th>
                <th>Dernier sujet</th>
              </tr>';
        //if($result = mysqli_query($link, $sql))
        //{


        $fetch = mysqli_fetch_assoc($result);

        while($row = mysqli_fetch_array($result))
        {

            echo '<tr>';
            echo '<td class="leftpart">';
            echo "<h3><a href='category.php?cat_id=$row[cat_id]'> '".$row['cat_name']."'</a></h3>'".$row['cat_description']."'";
            echo '</td>';
            echo '<td class="rightpart">';
            echo "<a href='topic.php?topic_id=$row[cat_id]'>Sujet</a>";
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

?>