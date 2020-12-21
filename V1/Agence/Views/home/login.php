<form action="/home/login" method="post">
    <input type="text" name="username" pattern="(([a-zA-Z]+)([a-zA-Z0-9]*)){4,}">
    <br>
    <input type="password" name="pass">
    <br>
    <button type="submit">Se connecter</button>
    <!-- afficher le message d'erreur s'il existe -->
    <?php
        echo Agence\Session::get('msg', true);
    ?>
</form>

