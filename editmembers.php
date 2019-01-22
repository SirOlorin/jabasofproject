<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Gestion des membres</h2></center>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=jabasof', 'root', '',array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

if (isset($_POST['deletemember'])){
    if (!empty($_POST['memberid'])){
        $memberid = $_POST['memberid'];
        $deletemember=$bdd->query('DELETE FROM `users` WHERE `user_id`='.$memberid);
        $message = "Le membre a bien été supprimé";
    }else{
        $message = "Aucun membre selectionné.";
    }

}

if (isset($_SESSION['user_id'])) {
    $userid=htmlspecialchars($_SESSION['user_id']);
    if ($userid==1){
        if (isset($_POST['byid']) OR isset($_POST['byname']) OR isset($_POST['bymail'])){

        }else{
            $getall=$bdd->query('SELECT * FROM `users`');
            echo '
                    <div class="container">
                   <table>
                        <tr>
                            <th>ID</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>E-Mail</th>
                            <th>Actions</th>
                        </tr>
                    
            '
            ;
            while ($result = $getall->fetch()){
                echo '
                    <tr>
                        <th>'.$result['user_id'].'</th>
                        <th>'.$result['user_firstname'].'</th>
                        <th>'.$result['user_lastname'].'</th>
                        <th>'.$result['user_email'].'</th>
                        <th>
                            <form action="?page=member&id='.$result['user_id'].'" method="post">                                
                                <input type="submit" value="Modifier" />
                            </form>
                            <form action="" method="post">
                                <input type="hidden" name="memberid" value="'.$result['user_id'].'">
                                <input type="submit" name="deletemember" value="Supprimer" />
                            </form>                       
                        </th>
                    </tr>
                ';
            }
            echo '</table></div>';
        }
    }else{
        $message = "Vous n'avez pas accès à cet espace.";
    }
}else{
    $message = "Veuillez vous connecter.";
}

if (isset ($message)) {
    echo $message;
}
?>

<style type="text/css">

    table {
        width : 70%;
        margin-left: auto;
        margin-right: auto;
    }

    form {
        display: inline-block;
    }
.container {
    text-align: center;

}
</style>
