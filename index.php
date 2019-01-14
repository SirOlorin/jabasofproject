<html>
<body>

<?php  //fonction de navigation
include('header.php');
if(isset($_GET['page']))
    include($_GET['page'].'.php');
else
    include('accueil.php');
?>

<br><br>

<?php include('footer.php'); ?>
</body>
</html>