<html>
<center>
<head><meta charset="utf-8"></head>
<form style="font-family: sans-serif;color: #943232;" action="addDB.php" method="post">
    Nom : <br>
    <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
    <br>
    <br>Prénom : <br>
    <input id="field" type="text" name="prenom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required><br>
    Mail : <br>
    <input id="field" type="email" name="mail" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
    <br><br>
    <input type="submit" id="button" value="Ajouter" style="font-size: 20px;"> <a href="addDB.php" style="font-size:10px;"></a>
</form><br>
----------------------------------------------
<br><br>

<form style="font-family: sans-serif;color: #943232;" action="delDB.php" method="post">
    Nom : <br>
    <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
    <br>
    <input type="submit" id="button" value="Supprimer" style="font-size: 20px;"> <a href="delDB.php" style="font-size:10px;"></a>
</form>
----------------------------------------------
<br><br>
<b> Fonctionnalités présentes :<b> <br><br>

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
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

$list = "SELECT * from client";

$result = mysqli_query($conn,$list);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

echo "<table border='1'>
<tr>
<th>Nom</th>
<th>Prénom</th>
<th>Mail</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['nom'] . "</td>";
    echo "<td>" . $row['prenom'] . "</td>";
    echo "<td>" . $row['mail'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</center>
</html>

