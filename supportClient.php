<html>
<center>
    <h1>Admonistrateur : Support Client</h1>
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
<b> Contact :<b> <br><br>

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
</center>
</html>

