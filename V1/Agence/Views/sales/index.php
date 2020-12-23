<h1>Liste des commerciaux</h1>

<?php 
//var_export($users);
// afficher tous les commerciaux

foreach($users as $key => $user)
{
    echo $key . ': ' . $user['com_name'].'<br>';
}

?>

<table border="1">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom du commercial</th>
            <th>Identifiant du remplaçant</th>
            <th>Actions</th>
        </tr>   
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php 
            foreach($users as $key => $user)
            {
                echo '<tr>
                    <td>'.$user['com_code'].'</td>
                    <td>'.$user['com_name'].'</td>
                    <td>'.$user['com_substitute'].'</td>
                    <td>
                        <a href="/sales/edit/'.$user['com_code'].'">Modifier</a> 
                        <a href="/sales/delete/'.$user['com_code'].'">Supprimer</a> 
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>

<h2>plop</h2>

