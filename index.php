<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
?>
<h1>Température météo</h1>

<form method="post" action="affichage_temperature.php">
<p>
<SELECT name="ville_select" size="1">
<?php
$reponse = $bdd->query('SELECT ville FROM `temperaturevilles`');
//$ville = $reponse->fetch();
while ($ville = $reponse->fetch())
    {
        echo '<option value='.$ville['ville'].'> '.ucfirst($ville['ville']).'</option>';
    }
?>
</SELECT>
<input type="submit" value="Valider" />
</p>
</form>