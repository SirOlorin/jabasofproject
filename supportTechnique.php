<html>
<center>
    <head><meta charset="utf-8"></head>
    <h1>Administrateur : Support</h1>
    <form style="font-family: sans-serif;color: #943232;" action="?page=addDBTech" method="post">
        Nom : <br>
        <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
        <br>
        <br>Prénom : <br>
        <input id="field" type="text" name="prenom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required><br><br>
        Mail : <br>
        <input id="field" type="email" name="mail" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
        <br><br>
        <input type="submit" id="button" value="Ajouter Support Technique" style="font-size: 20px;"> <a href="?page=addDBTech" style="font-size:10px;"><br><br></a>
    </form>
    <form style="font-family: sans-serif;color: #943232;" action="addDB.php" method="post">
        Nom : <br>
        <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
        <br>
        <br>Prénom : <br>
        <input id="field" type="text" name="prenom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required><br><br>
        Mail : <br>
        <input id="field" type="email" name="mail" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
        <br><br>
        <input type="submit" id="button" value="Ajouter Support Client" style="font-size: 20px;"> <a href="?page=addDB" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>

    <form style="font-family: sans-serif;color: #943232;" action="?page=delDBTech" method="post">
        Nom : <br>
        <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
        <br><br>
        <input type="submit" id="button" value="Supprimer du Support Technique" style="font-size: 20px;"> <a href="?page=delDBTech" style="font-size:10px;"></a>
    </form>
    <form style="font-family: sans-serif;color: #943232;" action="delDB.php" method="post">
        Nom : <br>
        <input id="field" type="text" name="nom" value="" placeholder="" style="font-family: sans-serif;color: #943232;font-size: 20px;" autofocus="" required>
    <br><br>
    <input type="submit" id="button" value="Supprimer du Support Client" style="font-size: 20px;"> <a href="?page=delDB" style="font-size:10px;"></a>
    </form>
    ----------------------------------------------
    <br><br>
    <b> Contact :


        <h3>Technique</h3>
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

        <br><br>
        <h3>Client</h3>
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