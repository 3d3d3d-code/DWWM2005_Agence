<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Last name</th>
            <th>First name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Added</th>
            <th>com_code</th>
        </tr>
    </thead>
    <tbody>

    <?php
    foreach ($datas as $client){
        echo '<tr>
                <td><a href=\'/clients/client/'.$client->getClientId().'\'>'. $client->getClientId() .'</a></td>
                <td>'. $client->getClientLastname() .'</td>
                <td>'. $client->getClientFirstname() .'</td>
                <td>'. $client->getClientemail().'</td>
                <td>'. $client->getClientPhone() .'</td>
                <td>'. $client->getClientAdded() .'</td>
                <td>'. $client->getComcode() .'</td>
              </tr>';
    }
    ?>

    </tbody>
</table>