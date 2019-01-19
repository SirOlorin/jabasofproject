<?php
$servername = "localhost:3306";
$username = "root";                    //      <---- changer infos de connection
$password = "";
$dbname = "forum";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
  
}
$x=mysqli_real_escape_string($conn,$_POST["name"]);

$err=null;

$check = "SELECT * from fonction where name LIKE '$x'";
$result = $conn->query($check);


if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

if($result->num_rows == 1)
{


while($row = mysqli_fetch_array($result))
{

$nameF= $row['name']  ;
$categorieF= $row['categorie'] ;
$idF= $row['id'] ;
$descriptionF= $row['description'] ;
}

echo "<form style='font-family: sans-serif;color: #943232;' action='editV.php' method='post'>
Nom initial: <br>
  <input id='field' type='text' name='Oname' value='{$x}' placeholder='' style='font-family: sans-serif;color: #943232;font-size: 20px;' autofocus='' required readonly='readonly'>
    
    <br>
  Nom : <br>
  <input id='field' type='text' name='name' value='{$nameF}' placeholder='' style='font-family: sans-serif;color: #943232;font-size: 20px;' autofocus='' required>
  <br>
  Catégorie : <br>
  <input id='field' type='text' name='categorie' value='{$categorieF}' placeholder='' style='font-family: sans-serif;color: #943232;font-size: 20px;' autofocus='' required>
  <br>
  Description : <br>
  <input id='field' type='text'size='50' name='description' value='{$descriptionF}' placeholder='' style='font-family: sans-serif;color: #943232;font-size: 20px;' autofocus='' required>
  <br>
   ID : <br>
  <input id='field' type='text' name='id' value='{$idF}' placeholder='' style='font-family: sans-serif;color: #943232;font-size: 20px;' autofocus='' required>
  <br>
  
  <input type='submit' id='button' value='Modifier' style='font-size: 20px;'> <a href='editV.php' style='font-size:10px;'></a>
    </form>";

   
     
}



$conn->close();
?> 

<html><br><br><a href="bocatalogue.php">Retour</a></html>