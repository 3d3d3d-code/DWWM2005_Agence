<table>
    <thead>
    <tr>
        <th>Identifiant client</th>
        <th>Le nom du client</th>
        <th>Le prénom du client</th>
        <th>L'email du client</th>
        <th>Le numéro de téléphone du client</th>
        <th>La date d'inscription du client</th>
        <th>Le commercial rattaché au client</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($datas as $client) {
        echo '<tr>
                <td><a href=\'/clients/client/' . $client->getClientId() . '\'>' . $client->getClientId() . '</a></td>
                <td>' . $client->getClientLastname() . '</td>
                <td>' . $client->getClientFirstname() . '</td>
                <td>' . $client->getClientemail() . '</td>
                <td>' . $client->getClientPhone() . '</td>
                <td>' . $client->getClientAdded() . '</td>
                <td>' . $client->getComcode() . '</td>
              </tr>';
    }
    ?>

    </tbody>
</table>