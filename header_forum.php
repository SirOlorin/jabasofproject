<title>Forum</title>
<link rel="stylesheet" href="style.css" type="text/css">

<center><h2 style="font-family:sans-serif; color: white; font-size: 100px;">Forum</h2></center>
<div id="wrapper">
    <div id="menu">
        <a class="item" href="?page=forum">Accueil</a> -
        <a class="item" href="?page=create_topic">Créer un sujet</a> -
        <a class="item" href="?page=create_cat">Créer une catégorie</a>


        <div id="userbar">
            <?php
            session_start();
            if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
                echo 'Bonjour' . $_SESSION["user_name"] . '. Ce n est pas vous ? <a href="logout.php">Se déconnecter</a>';
            } else {
                echo '<a href="signin.php">Se connecter</a> or <a href="signup.php">Créer un compte</a>.';
            }
            ?>
        </div>


    </div>

</div>
<div id="content">

