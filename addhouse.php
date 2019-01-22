<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Ajouter une maison</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");

if(isset($_SESSION['user_id']) ) {
    $userid = htmlspecialchars($_SESSION['user_id']);
    if (isset($_POST['addhouse'])){
        if (!empty($_POST['housename'])){
            $housename = htmlspecialchars($_POST['housename']);
            $addhouse = $bdd->query('INSERT INTO `houses`(`house_name`, `admin_id`) VALUES ("'.$housename.'", '.$userid.')');
            $message = "La maison a bien été ajoutée.";
        }else{
            $message = "Veuillez remplir le fomulaire.";
        }
    }
}else{
    $message = "Veuillez vous conneceter";
}




if (isset ($message)) {
    echo $message;
}
?>

<div class="container">
    <form action="" method="post">
        <input type="text" id="input" name="housename" placeholder="Entrez le nom de la maison."><br>
        <input type="submit" id="addhouse" name="addhouse" value = "Ajouter la nouvelle Maison">
    </form>
</div>

<style type="text/css">
.container {
    text-align: center;
    margin-top: 10px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 10px;
    padding-top: 50px;
    padding-right: 10px;
    padding-left: 10px;
    padding-bottom: 50px;
    background : white;
    width : 700px;
}

.container input {
    margin-top: 10px;
    margin-right: 10px;
    margin-left: 10px;
    margin-bottom: 10px;
    padding-top: 15px;
    padding-right: 15px;
    padding-left: 15px;
    padding-bottom: 15px;
    border : none;
}

#input{
    color : #666666;
}

#addhouse {
    color : white;
}

#addhouse:hover {
    background: #2196F3;
}


</style>
