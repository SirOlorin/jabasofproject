<?php
$servername = "localhost:3306";
$username = "Jabasof";
$password = "jabasof";
$dbname = "forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$x=mysqli_real_escape_string($conn,$_POST["nom"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM client WHERE nom LIKE '$x'";

?>
<html><br></html>
<?php
if ($conn->query($sql) === TRUE) {
    echo "Technicien supprimé";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<html><br><br><a href="supportClient.php">Retour</a></html>