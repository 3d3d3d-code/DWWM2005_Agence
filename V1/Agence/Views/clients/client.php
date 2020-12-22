<table>
    <tbody>
    <?php
    foreach ($client as $clt) {

        echo '<tr><th>Id</th><td>' . $clt->getClientId() . '</tr></td>'
            . '<tr><th>Last name</th><td>' . $clt->getClientLastname() . '</tr></td>'
            . '<tr><th>First name</th><td>' . $clt->getClientFirstname() . '</tr></td>'
            . '<tr><th>Email</th><td>' . $clt->getClientEmail() . '</tr></td>'
            . '<tr><th>Phone</th><td>' . $clt->getClientPhone() . '</tr></td>'
            . '<tr><th>Added</th><td>' . $clt->getClientAdded() . '</tr></td>'
            . '<tr><th>Sale</th><td>' . $clt->getComCode() . '</tr></td>';

    }
    ?>
    </tbody>
</table>
