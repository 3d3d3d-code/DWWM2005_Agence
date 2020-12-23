<h2>Voir ou mettre à jour un client</h2>
<?php
if ($client == null) {
    echo "<p>Le client \"$this->id\" n'existe pas!</p>";
}
?>
<ul>
    <li>Identifiant du client : <?= $client->getClientId() ?></li>
    <li>La date d'inscription du client : <?= $client->getClientAdded() ?></li>
</ul>

<form action="/clients/update/<?= $client->getClientId() ?>" method="post">
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" id="lastname" value="<?= $client->getClientLastname() ?>" required>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" value="<?= $client->getClientFirstname() ?>" required>
    <label for="pwd">Password</label>
    <input type="password" name="pwd" id="pwd" minlength="8">
    <label for="pwd_b">Password bis</label>
    <input type="password" name="pwd_b" id="pwd_b" minlength="8">
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= $client->getClientEmail() ?>" required>
    <label for="telephone">Numéro de téléphone : </label>
    <input type="tel" name="telephone" id="telephone" value="<?= $client->getClientPhone() ?>" required>
    <label for="sale">Commercial rattaché : </label>
    <select name="sale" id="sale">
        <option>Choisir un commercial</option>

    </select>
    <button type="submit">Mettre à jour</button>
</form>

<a href="/clients">retour</a>