<html>
    <head><meta charset="utf-8"></head>
<form style="font-family: sans-serif;color: #943232;" action="boadd.php" method="post">
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
  <input type="submit" id="button" value="Ajouter" style="font-size: 20px;"> <a href="boadd.php" style="font-size:10px;"></a>
</form><br>
----------------------------------------------
    <br><br>
    
    <form style="font-family: sans-serif;color: #943232;" action="bodelete.php" method="post">
  Nom : <br>
  <input id="field" type="text" name="name" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  
  <input type="submit" id="button" value="Supprimer" style="font-size: 20px;"> <a href="bodelete.php" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>

    
    
    <form style="font-family: sans-serif;color: #943232;" action="boedit.php" method="post">
  <b>Modifier une fonctionnalité</b> : <br><br><br>
  
  Nom de la rubrique à modifier : <br>
  <input id="field" type="text" name="name" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
  <br>
  
  <input type="submit" id="button" value="Modifier" style="font-size: 20px;"> <a href="boedit.php" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>
   <b> Fonctionnalités présentes :<b> <br><br>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jabasof";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
  
}

$list = "SELECT * from fonctions";

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
echo "<td>" . $row['fct_name'] . "</td>";
echo "<td>" . $row['fct_description'] . "</td>";
echo "<td>" . $row['fct_id'] . "</td>";
echo "<td>" . $row['fct_categorie'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

