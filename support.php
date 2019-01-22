<html>
<br>
<center><h2 style="font-family:sans-serif; color: white; font-size: 200px;">SUPPORT</h2></center>

<div>
    <center>
    <br><br>
        <h3>Client</h3>
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

$list = "SELECT * from client";

$result = mysqli_query($conn,$list);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while($row = mysqli_fetch_array($result))
{
    echo '
                <div>
                    <center><br>
                        <h3>'.$row['prenom']." ".$row['nom'].'</h3>
                            <a href="mailto:'.$row['mail'].'">
                                <p>'.$row['mail'].'</p>
                            </a>
                    </center>
                </div>
            '
    ;
}
echo "</table>";


?>
<html>
<br>
<div>
    <center>
        <br><br>
        <h3>Technique</h3>
</html>
<?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);


}

$list = "SELECT * from technique";

$result = mysqli_query($conn,$list);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while($row = mysqli_fetch_array($result))
{
    echo '
                <div>
                    <center><br>
                        <h3>'.$row['prenom']." ".$row['nom'].'</h3>
                            <a href="mailto:'.$row['mail'].'">
                                <p>'.$row['mail'].'</p>
                            </a>
                    </center>
                </div>
            '
    ;
}
echo "</table>";


?>