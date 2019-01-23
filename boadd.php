<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "jabasof";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


}
$x=mysqli_real_escape_string($conn,$_POST["name"]);
$y=mysqli_real_escape_string($conn,$_POST["description"]);
$z=mysqli_real_escape_string($conn,$_POST["categorie"]);
$id=mysqli_real_escape_string($conn,$_POST["id"]);
$err=null;

$check = "SELECT * from fonctions where name LIKE '$x'";
$result = $conn->query($check);


if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if($result->num_rows < 1)
{
    $x=mysqli_real_escape_string($conn,$_POST["name"]);
    $y=mysqli_real_escape_string($conn,$_POST["description"]);
    $z=mysqli_real_escape_string($conn,$_POST["categorie"]);
    $id=mysqli_real_escape_string($conn,$_POST["id"]);
    $sql = "INSERT INTO fonctions (name, description, id, categorie)
    VALUES ('{$x}', '{$y}','{$id}','{$z}')";

    $result2=mysqli_query($conn, $sql);


    if ($result2 === TRUE) {

        echo "Fonctionnalité ajoutée";
    }
    else {
        echo"Fonctionnalité non ajoutée";

    }
}

else if($result->num_rows >= 1) {
    echo"Fonctionnalité déjà ajoutée, entrer un nom différent";
}





$conn->close();
?>

<html><br><br><a href="bocatalogue.php">Retour</a></html>