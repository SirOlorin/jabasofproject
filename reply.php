<?php
//reply.php
include 'connect.php';
include 'header_forum.php';
$save=$_GET['post_id'];

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
                        '" . mysqli_real_escape_string($link,$save) . "',
                        " . $_SESSION['user_id'] . ")";


        $result = mysqli_query($link,$sql);
                         
        if(!$result)
        {
            echo 'Votre réponse n\'a pas pu être sauvegardé, veuillez réessayer plus tard.';
        }
        else
        {
            echo "Votre réponse à été sauvegardée, cliquez ici : <a href='topic.php?topic_id=$save'> votre sujet.</a>";
        }
    }
}

?>