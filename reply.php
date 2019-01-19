<?php
//reply.php
include 'connect.php';
include 'header_forum.php';

echo '<form method="post" action="reply.php?id=5">
    <textarea name="reply-content"></textarea>
    <input type="submit" value="Poster réponse" />
</form>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'Ce fichier ne peut pas être appelé directement.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'Vous devez être connecté pour poster une répondre.';
    }
    else
    {
        //a real user posted a real reply
        $sql = "INSERT INTO 
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by) 
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysqli_real_escape_string($_GET['post_id']) . ",
                        " . $_SESSION['user_id'] . ")";
         
        mysqli_query($link, $sql);                 
        $result = mysqli_query($link,$sql);
                         
        if(!$result)
        {
            echo 'Votre réponse n a pas pu être sauvegardé, veuillez réessayer plus tard.';
        }
        else
        {
            echo 'Votre réponse à été sauvegardé, cliquez ici : <a href="topic.php?id=$_GET['topic_id']' . htmlentities($_GET['id']) . '"></a>.';
        }
    }
}

?>