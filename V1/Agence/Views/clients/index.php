<h2>Liste des clients</h2>
<a href="/clients/add">Ajouter un client</a>
<hr>
<table>
    <thead>
    <tr>
        <th>Identifiant client(s)</th>
        <th>Le nom du client(s)</th>
        <th>Le prénom du client(s)</th>
        <th>L'email du client(s)</th>
        <th>Le numéro de téléphone du client(s)</th>
        <th>La date d'inscription du client(s)</th>
        <th>Le commercial rattaché au client(s)</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($datas as $client) {
        echo '<tr>
                <td>' . $client->getClientId() . '</a></td>
                <td>' . $client->getClientLastname() . '</td>
                <td>' . $client->getClientFirstname() . '</td>
                <td>' . $client->getClientemail() . '</td>
                <td>' . $client->getClientPhone() . '</td>
                <td>' . $client->getClientAdded() . '</td>
                <td><a href=\'/sales/edite/'.$client->getComcode().'\'>' . $client->getComcode() . '</a></td>
                <td>
                    <a href=\'/clients/update/' . $client->getClientId() . '\'>voir/éditer</a>
                    <a href=\'/clients/delete/' . $client->getClientId() . '\'>Supprimer</a>
                </td>
              </tr>';
    }
    ?>

    </tbody>
</table>