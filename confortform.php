
<div class="formulaire">
    <form action="" method="post">
        <h3>Salle de bain 1</h3><br/>
        <h2>Détecteur de mouvement</h2><br/>
        <p>Activé / Désactivé</p><br/>
        <label class="switch">
            <input id='mouvementhidden' type='hidden' value='off' name='movecheck'>
            <input id="mouvement" type="checkbox" value="on" name="movecheck">
            <span class="slider"></span>
        </label>
        <br/>
        <h2>Lumière</h2><br/>
        <p>Allumé / Eteint</p><br/>
        <label class="switch">
            <input id='lighthidden' type='hidden' value='off' name='lightcheck'>
            <input id="light" type="checkbox" value="on" name="lightcheck">
            <span class="slider"></span>
        </label>
        <br/>
        <h2>Température</h2><br/>
        <input type="text" name="temperature" placeholder="en C°">
        <input type="submit" value="Valider">
    </form>
</div>

