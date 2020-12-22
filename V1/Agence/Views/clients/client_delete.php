<?php
if($msg){
    echo '<p>'.$msg.'</p>';
}
if($client != null){
?>
<form action="/clients/delete/<?= $client->getClientId() ?>" method="post">
    <label for="choix">Voulez vous supprimez le client?</label>
    <select name="choix" id="choix">
        <option value="false" selected>no</option>
        <option value="true">oui</option>
    </select>
    <button type="submit">submit</button>
</form>
<?php
}