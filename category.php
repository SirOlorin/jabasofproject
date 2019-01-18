<?php
//category.php
include 'connect.php';
include 'header_forum.php';


//first select the category based on $_GET['cat_id']
$sql4 = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = '" . mysqli_real_escape_string($link, $_GET['cat_id']) . "'";

mysqli_query($link, $sql4);
$result = mysqli_query($link, $sql4);


if ($result != mysqli_query($link, $sql4))
{
    echo 'La catégorie n\'a pas pu être affiché. Veuillez réessayer ultérieurement.';
}
else
{
    if(mysqli_num_rows($result) != 0)
    {
        echo 'Cette catégorie n\'existe pas.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Sujet dans ′' . $row['cat_name'] . '′ catégorie</h2>';
        }

        //do a query for the topics
        $sql3 = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = '" . mysqli_real_escape_string($link,$_GET['cat_id']) . "'";

        mysqli_query($link, $sql3);
        $result3 = mysqli_query($link, $sql3);

        if(!$result3)
        {
            echo 'Les sujets n\'ont pas pu être affiché, veuillez réessayer ultérieurement.';
        }
        else
        {
            if(mysqli_num_rows($result3) == 0)
            {
                echo 'Il n\'y pas encore de sujet dans cette catégorie';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Sujet</th>
                        <th>Crée a </th>
                      </tr>';

                while($row = mysqli_fetch_array($result3))
                {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo date('d-m-Y', strtotime($row['topic_date']));
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}


?>