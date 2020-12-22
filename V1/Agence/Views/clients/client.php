<table>
    <tbody>
    <?php
    foreach ($client as $clt) {

        echo '<tr><th>Identifiant</th><td>' . $clt->getClientId() . '</tr></td>
            <tr><th>Le nom du client</th><td>' . $clt->getClientLastname() . '</tr></td>
            <tr><th>Le prénom du client</th><td>' . $clt->getClientFirstname() . '</tr></td>
            <tr><th>L\'email du client</th><td>' . $clt->getClientEmail() . '</tr></td>
            <tr><th>Le numéro de téléphone du client</th><td>' . $clt->getClientPhone() . '</tr></td>
            <tr><th>La date de l\'inscription du client</th><td>' . $clt->getClientAdded() . '</tr></td>
            <tr><th>Le commercial rattaché au client</th><td>' . $clt->getComCode() . '</tr></td>';

    }
    ?>
    </tbody>
</table>
