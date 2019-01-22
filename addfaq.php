<link rel="stylesheet" type="text/css" href="accueil.css">
<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Ajouter un article à l'accueil</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit'])) {
    if( !empty($_POST['question']) AND !empty($_POST['content'])) {
        $question = htmlspecialchars($_POST['question']);
        $content = htmlspecialchars($_POST['content']);
        $set = $bdd->prepare("INSERT INTO `pagefaq`(`question`, `content`) VALUES (?,?)");
        $set -> execute(array($question, $content));
        $message="La question a bien été ajoutée";
        //header('Location: index.php?page=boaccueil ');
        header( "refresh:2;url=index.php?page=bofaq" );
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
    <textarea rows="1" cols="60" placeholder="Titre" name="question" form="adminaccueil"></textarea>
    <br>
    <textarea rows="10" cols="60" placeholder="Contenu" name="content" form="adminaccueil"></textarea>
    <br>
    <input type="submit" name="submit" value="Ajouter la question">
    <br>
</form>
