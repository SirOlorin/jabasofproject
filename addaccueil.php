<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Ajouter un article à l'accueil</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit'])) {
    if( !empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['image'])) {
        $titre = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $photo = htmlspecialchars($_POST['image']);
        $set = $bdd->prepare("INSERT INTO `pageaccueil`(`titre`, `content`, `photo`) VALUES (?,?,?)");
        $set -> execute(array($titre, $content, $photo));
        $message="L'article a bien été ajouté.";
        //header('Location: index.php?page=boaccueil ');
        header( "refresh:2;url=index.php?page=boaccueil" );
    }else {
        $message = "Veuillez remplir tous les champs du formulaire.";
    }
}

if (isset ($message)) {
    echo $message;
}
?>

<form action="" method="post" id="adminaccueil">
    <br>
    <textarea rows="1" cols="60" placeholder="Titre" name="title" form="adminaccueil"></textarea>
    <br>
    <textarea rows="1" cols="60" placeholder="Image" name="image" form="adminaccueil"></textarea>
    <a href="" target="_blank">Prévisualiser l'image</a>
    <br>
    <textarea rows="10" cols="60" placeholder="Contenu" name="content" form="adminaccueil"></textarea>
    <br>
    <input type="submit" name="submit" value="Ajouter l'article">
    <br>
</form>
