<?php
$servername = "localhost:3306";
$username = "Jabasof";
$password = "jabasof";
$dbname = "forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$x=mysqli_real_escape_string($conn,$_POST["nom"]);
$y=mysqli_real_escape_string($conn,$_POST["prenom"]);
$z=mysqli_real_escape_string($conn,$_POST["mail"]);
$t=mysqli_real_escape_string($conn,$_POST["telephone"]);
$err=null;

$check = "SELECT * from client where nom LIKE '$x'";
$result = $conn->query($check);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if($result->num_rows < 1)
{
    $x=mysqli_real_escape_string($conn,$_POST["nom"]);
    $y=mysqli_real_escape_string($conn,$_POST["prenom"]);
    $z=mysqli_real_escape_string($conn,$_POST["mail"]);
    $z=mysqli_real_escape_string($conn,$_POST["telephone"]);
    $sql = "INSERT INTO client (nom,prenom,mail,telephone)
    VALUES ('{$x}','{$y}','{$z}','{$t}')";

    $result2=mysqli_query($conn, $sql);

    if ($result2 === TRUE) {
        echo "Technicien ajouté";
    }
    else {
        echo"Technicien non ajouté";
        printf (mysqli_error($conn));
    }
}

else if($result->num_rows >= 1) {
    echo"Technicien déjà ajouté, entrer un nom différent";
}

$conn->close();
?>

<html><br><br><a href="supportClient.php">Retour</a></html>