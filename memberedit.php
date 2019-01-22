<link rel="stylesheet" type="text/css" href="memberedit.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Modifier le profil</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");


if(isset($_GET['id']) AND $_SESSION['user_id']==1){
    $id=htmlspecialchars($_GET['id']);
    $value = htmlspecialchars($_GET['value']);
}else if(isset($_GET['value'], $_SESSION['user_id'])) {
    $id=htmlspecialchars($_SESSION['user_id']);
    $value = htmlspecialchars($_GET['value']);
}else{
    $message= 'Aucune information sélectionnée.';
}


$getcontent = $bdd->prepare("SELECT * FROM `users` WHERE user_id = ?");
$getcontent -> execute(array($id));

if ($value=='user_pass'){
    $displayvalue = 'Mot de passe';
}else if ($value=='user_name'){
    $displayvalue = 'Nom d\'utilisateur';
}else if ($value=='user_lastname'){
    $displayvalue = 'Nom de famille';
}else if ($value=='user_firstname'){
    $displayvalue = 'Prénom';
}else{
    $displayvalue = 'Adresse E-Mail';
}

while($result=$getcontent->fetch()) {
    if ($value=='user_pass'){
        echo '
        <h3>Modification du mot de passe</h3>
        <form action="" method="post">
            <label>Ancien mot de passe</label>
            <input type="password" name="oldpassword"><br>
            <label>Nouveau mot de passe</label>
            <input type="password" name="password"><br>
            <label>Confirmation du nouveau mot de passe</label>
            <input type="password" name="password2"><br>
            <input type="submit" name="mdp">
        </form>
        ';
    }else{
        echo '
        <h3>Modification : '.$displayvalue.'</h3>
        <form action="" method="post">
            <label>'.$displayvalue.' : '.$result[$value].'</label><br>
            <label>Nouvelle valeur : </label>
            <input type="text" name="newvalue"><br>
            <input type="submit" name="submit">
        </form>
';
    }


}

if(isset($_POST['mdp'], $_SESSION['user_id'])) {
    if( !empty($_POST['password']) AND ($_POST['password2'])) {

        $password = sha1($_POST['password']);
        $password2 = sha1($_POST['password2']);
        $oldpassword = sha1($_POST['oldpassword']);
        $getpassword = $bdd->prepare("SELECT * FROM `users` WHERE user_id = ?");
        $getpassword -> execute(array($id));
        while($result=$getpassword->fetch()) {
            $currentpassword = $result['user_pass'];
        }
        if ($currentpassword==$oldpassword){
            if ($password==$password2){
                $set = $bdd->prepare("UPDATE `users` SET `user_pass`=? WHERE user_id = ?");
                $set -> execute(array($password, $id));
                $message="Le mot de passe a bien été modifié.";
                header( "refresh:2;url=index.php?page=member" );
            }else{
                $message="Les mots de passe ne correspondent pas.";
            }
        }else{
            $message="L'ancien mot de passe est invalide";
        }


    }else {
        $message = "Veuillez remplir tous les champs";
    }
}

if(isset($_POST['submit'], $_SESSION['user_id'])) {
    if( !empty($_POST['newvalue'])) {

        $newvalue = $_POST['newvalue'];
        if ($value=='user_name'){
            $set = $bdd->prepare("UPDATE `users` SET `user_name`=? WHERE user_id=?");
            $set -> execute(array($newvalue, $id));
            $message="Le nom d'utilisateur a bien été mis à jour.";
            header( "refresh:2;url=index.php?page=member" );
        }else if ($value=='user_lastname'){
            $set = $bdd->prepare("UPDATE `users` SET `user_lastname`=? WHERE user_id=?");
            $set -> execute(array($newvalue, $id));
            $message="Le nom de famille a bien été mis à jour.";
            header( "refresh:2;url=index.php?page=member" );
        }else if ($value=='user_firstname'){
            $set = $bdd->prepare("UPDATE `users` SET `user_firstname`=? WHERE user_id=?");
            $set -> execute(array($newvalue, $id));
            $message="Le prénom a bien été mis à jour.";
            header( "refresh:2;url=index.php?page=member" );
        }else{
            $set = $bdd->prepare("UPDATE `users` SET `user_email`=? WHERE user_id=?");
            $set -> execute(array($newvalue, $id));
            $message="L'adresse E-Mail a bien été mise à jour.";
            header( "refresh:2;url=index.php?page=member" );
        }
    }else {
        $message = "Veuillez remplir tous les champs";
    }
}

if (isset ($message)) {
    echo $message;
}

?>
