<?php
//category.php
include 'connect.php';
include 'header_forum.php';

$save=$_GET['topic_id'];

$sql = "SELECT
            *
        FROM
            topics
        WHERE
            topic_cat = '" . mysqli_real_escape_string($link, $save) . "'";

mysqli_query($link, $sql);
$result = mysqli_query($link, $sql);

if ($result != mysqli_query($link, $sql))
{
    echo 'Le sujet n\'a pas pu être affiché. Veuillez réessayer ultérieurement.';
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'Ce sujet n\'existe pas.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2>' . $row['topic_subject'] . '</h2>';
            $subject =$row['topic_subject'];
        }

        //on fait une query pour les post

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
                    posts.post_topic = '" . mysqli_real_escape_string($link,$_GET['topic_id']) . "'
                 ORDER BY
                    `posts`.`post_date` ASC";


        mysqli_query($link, $sql2);
        $result2 = mysqli_query($link, $sql2);

        if(!$result2)
        {
            echo 'Les sujets n\'ont pas pu être affiché, veuillez réessayer ultérieurement.';
        }
        else
        {
            if(mysqli_num_rows($result2) == 0)
            {
                echo 'Il n\'y pas encore de post dans cette catégorie';

            }
            else
            {

                echo '<table border="2">
                      <tr>
                        <th>Sujet : ' . $subject . '</th>
                        <th>Utilisateur et Date :</th>
                        
                      </tr>';

                while($row = mysqli_fetch_array($result2))
                {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '' . $row['post_content'] . '';
                    echo '</td>';
                    echo '<td class="rightpart">';

                    echo  'par ' . $row['user_name'] . ' le : ';
                    echo date('d-m-Y', strtotime($row['post_date']));
                    echo '</td>';
                    echo '</tr>';
                }

                echo "<form method='post' action='reply.php?post_id=$save'>
                    <textarea name='reply-content'></textarea>
                    <input type='submit' value='Poster réponse' />
                </form>";


            }
        }
    }
}

?>