<html>
    <head><meta charset="utf-8"></head>
<form style="font-family: sans-serif;color: #943232;" action="add.php" method="post">
  Nom : <br>
  <input id="field" type="text" name="name" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  <br>Description : <br>
  <input id="field" type="text" name="description" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required><br>
   Catégorie : <br>
  <input id="field" type="text" name="categorie" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
   ID : <br>
  <input id="field" type="text" name="id" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  <input type="submit" id="button" value="Ajouter" style="font-size: 20px;"> <a href="add.php" style="font-size:10px;"></a>
</form><br>
----------------------------------------------
    <br><br>
    
    <form style="font-family: sans-serif;color: #943232;" action="delete.php" method="post">
  Nom : <br>
  <input id="field" type="text" name="name" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  
  <input type="submit" id="button" value="Supprimer" style="font-size: 20px;"> <a href="delete.php" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>

    
    
    <form style="font-family: sans-serif;color: #943232;" action="edit.php" method="post">
  <b>Modifier une fonctionnalité</b> : <br><br><br>
  
  Nom de la rubrique à modifier : <br>
  <input id="field" type="text" name="name" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  
  <input type="submit" id="button" value="Modifier" style="font-size: 20px;"> <a href="edit.php" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>
   <b> Fonctionnalités présentes :<b> <br><br>
</html>

<?php
   header('Content-Type: text/html; charset=ISO-8859-1');
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

$list = "SELECT * from fonction";

$result = mysqli_query($conn,$list);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

echo "<table border='1'>
<tr>
<th>Nom</th>
<th>Description</th>
<th>ID</th>
<th>Catégorie</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['description'] . "</td>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['categorie'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

