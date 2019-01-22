<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Modifier un article</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit'], $_GET['id'])) {
    if( !empty($_POST['title']) AND ($_POST['content']) != ($_POST['image'])) {
        $id = $_GET['id'];
        $titre = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $image = htmlspecialchars($_POST['image']);
        $set = $bdd->prepare("UPDATE `pageaccueil` SET `titre`=?,`content`=?,`photo`=? WHERE id = ?");
        $set -> execute(array($titre, $content, $image, $id));
        $message="bien joué";
    }else {
        $message = "check la form";
    }
}
if (isset ($message)) {
    echo $message;
}

if($_GET['id']) {
    $id=$_GET['id'];
}
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
$getcontent = $bdd->prepare("SELECT * FROM `pageaccueil` WHERE id = ?");
$getcontent -> execute(array($id));
while($result=$getcontent->fetch()) {
    echo '
        <form action="" method="post" id="adminaccueil">
    <br>
    <textarea rows="1" cols="60" placeholder="Titre" name="title" form="adminaccueil">' .
        $result['titre']
    .'</textarea>
    <br>
    <textarea rows="1" cols="60" placeholder="Image" name="image" form="adminaccueil">'.
        $result['photo']
    .'</textarea>
    <a href="" target="_blank">Prévisualiser l\'image</a>
    <br>
    <textarea rows="10" cols="60" placeholder="Contenu" name="content" form="adminaccueil">'.
        $result['content']
    .'</textarea>
    <br>
    <input type="submit" name="submit" value="Ajouter l\'article">
    <br>
</form>
';

}

?>
