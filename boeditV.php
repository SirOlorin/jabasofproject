 <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "forum";


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
$Oname=mysqli_real_escape_string($conn,$_POST["Oname"]);
$err=null;

$del = "DELETE from fonction where name LIKE '{$Oname}'";
//$result = $conn->query($del);
mysqli_query($conn,$del);


//if (!$result) {
    //trigger_error('Invalid query: ' . $conn->error);
//}


    $x=mysqli_real_escape_string($conn,$_POST["name"]);
    $y=mysqli_real_escape_string($conn,$_POST["description"]);
    $z=mysqli_real_escape_string($conn,$_POST["categorie"]);
    $id=mysqli_real_escape_string($conn,$_POST["id"]);
    $sql = "INSERT INTO fonction (name, description, id, categorie)
    VALUES ('{$x}', '{$y}','{$id}','{$z}')";
    
        $result2=mysqli_query($conn, $sql);

    
    if ($result2 === TRUE) {

        echo "Fonctionnalité modifiée";
    }
        else {
            echo"Fonctionnalité non modifiée";
            
        }
    

    




$conn->close();
?> 

<html><br><br><a href="bocatalogue.php">Retour</a></html>