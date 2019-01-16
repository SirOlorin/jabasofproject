<link rel="stylesheet" type="text/css" href="FAQ.css">
<center><h2 style="font-family:sans-serif; color: white; font-size: 50px;">Modifier un article</h2></center>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
if(isset($_POST['submit'], $_GET['id'])) {
    if( !empty($_POST['question']) AND ($_POST['content'])) {
        $id = $_GET['id'];
        $question = htmlspecialchars($_POST['question']);
        $content = htmlspecialchars($_POST['content']);
        $set = $bdd->prepare("UPDATE `pagefaq` SET `question`=?,`content`=? WHERE id = ?");
        $set -> execute(array($question, $content, $id));
        $message="La question a bien été modifiée";
        header( "refresh:2;url=index.php?page=bofaq" );
    }else {
        $message = "Veuillez remplir tous les champs du formulaire.";
    }
}
if (isset ($message)) {
    echo $message;
}

if($_GET['id']) {
    $id=$_GET['id'];
}
$bdd = new PDO("mysql:host=127.0.0.1;dbname=jabasof;charset=utf8", "root", "");
$getcontent = $bdd->prepare("SELECT * FROM `pagefaq` WHERE id = ?");
$getcontent -> execute(array($id));
while($result=$getcontent->fetch()) {
    echo '
        <form action="" method="post" id="adminfaq">
    <br>
    <textarea rows="1" cols="60" placeholder="Question" name="question" form="adminfaq">' .
        $result['question']
        .'</textarea>
    <br>
    <textarea rows="10" cols="60" placeholder="Contenu" name="content" form="adminfaq">'.
        $result['content']
        .'</textarea>
    <br>
    <input type="submit" name="submit" value="Ajouter l\'article">
    <br>
</form>
';

}

?>
