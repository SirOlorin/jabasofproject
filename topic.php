<?php
//topic.php
include 'connect.php';
include 'header_forum.php';
 

        $sql = "SELECT  
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = " . mysqli_real_escape_string($_GET['id']);
         
        mysqli_query($link, $sql);
        $result = mysqli_query($link, $sql);
         
        if(!$result)
        {
            echo 'Les sujets n ont pas pu être affiché, veuillez réessayer ultérieurement.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'Il n y pas encore de sujet dans cette catégorie';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Sujet</th>
                        <th>Crée a </th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
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
?>