<h2>Ajouter un client</h2>
<form action="/clients/add" method="post">
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" id="lastname" autofocus required>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" required>
    <label for="pwd">Password</label>
    <input type="password" name="pwd" id="pwd" minlength="8" required>
    <label for="pwd_b">Password bis</label>
    <input type="password" name="pwd_b" id="pwd_b" minlength="8" required>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <label for="telephone">Numéro de téléphone : </label>
    <input type="tel" name="telephone" id="telephone" required>
    <label for="sale">Commercial rattaché : </label>
    <select name="sale" id="sale">
        <option selected>Choisir un commercial</option>
        <?php
            foreach ($sales as $sale){
                echo '<option value="'.$sale->getCom_code().'">'.$sale->getCom_code().'</option>';
            }
        ?>

    </select>
    <button type="submit">Ajouter</button>
</form>
<a href="/clients">retour</a>