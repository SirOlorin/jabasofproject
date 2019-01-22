<center><h2 style="font-family:sans-serif; color: black; font-size: 50px;">Espace d'administration</h2></center>


<div class="container">
    <form action="?page=boaccueil" method="POST">
        <input type="submit" value="Administrer la page d'accueil">
    </form>
    <br><br>
    <form action="?page=bofaq" method="post">
        <input type="submit" value="Administrer la FAQ">
    </form>
    <br><br>
    <form action="?page=supportClient" method="post">
        <input type="submit" value="Administrer le contact service Client">
    </form>
    <br><br>
    <form action="?page=supportTechnique" method="post">
        <input type="submit" value="Administrer le contact service Technique">
    </form>
    <br><br>
    <form action="?page=bocatalogue" method="post">
        <input type="submit" value="Administrer le catalogue">
    </form>
    <br><br>
    <form action="?page=editmembers" method="post">
        <input type="submit" value="Gérer les membres">
    </form>
</div>


<style type="text/css">

    .container {
        text-align: center;
        margin-top : 50px;
    }

    input {
        border : none;
        padding : 10px 10px 10px 10px;
        width : 300px;
        height: 50px;
    }

    input:hover {
        background: #2196F3;
        color : white;
    }

</style>