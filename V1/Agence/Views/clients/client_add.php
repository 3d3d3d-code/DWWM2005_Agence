<form action="/clients/add" method="post">
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" id="lastname" required>
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" id="firstname" required>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <label for="telephone">Numéro de téléphone : </label>
    <input type="tel" name="telephone" id="telephone" required>
    <label for="sale">Commercial rattaché : </label>
    <select name="sale" id="sale">
        <option>Choisir un commercial</option>
    </select>
    <button type="submit">Mettre à jour</button>
</form>