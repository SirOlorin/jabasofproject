<?php
//category.php
include 'connect.php';
include 'header_forum.php';

$save=$_GET['topic_id'];

$sql = "SELECT
            *
        FROM
            topic
        WHERE
            topic_id = '" . mysqli_real_escape_string($link, $_GET['topic_id']) . "'";

mysqli_query($link, $sql);
$result = mysqli_query($link, $sql);


if ($result != mysqli_query($link, $sql))
{
    echo 'La catégorie n\'a pas pu être affiché. Veuillez réessayer ultérieurement.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'Cette catégorie n\'existe pas.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>Sujet dans la catégorie \'' . $row['cat_name'] . '\'</h2>';
        }

        //on fait une query pour les sujets

        $sql2 = "SELECT
                    posts.post_topic,
                    posts.post_content,
                    posts.post_date,
                    posts.post_by,
                    users.user_id,
                    users.user_name
                 FROM
                    posts
                 LEFT JOIN
                    users
                 ON
                    posts.post_by = users.user_id
                 WHERE
                    posts.post_topic = " . mysqli_real_escape_string($link,$_GET['id']) . "";

        mysqli_query($link, $sql2);
        $result3 = mysqli_query($link, $sql2);

        if(!$result3)
        {
            echo 'Les sujets n\'ont pas pu être affiché, veuillez réessayer ultérieurement.';
        }
        else
        {
            if(mysqli_num_rows($result3) == 0)
            {
                echo mysqli_error($link);
                echo 'Il n\'y pas encore de sujet dans cette catégorie';

            }
            else
            {

                echo '<table border="1">
                      <tr>
                        <th>Sujet</th>
                        <th>Date de création : </th>
                      </tr>';

                while($row = mysqli_fetch_array($result3))
                {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3><a href="topic.php?topic_id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
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