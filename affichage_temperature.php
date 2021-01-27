<html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
?>
<h1>Température météo</h1>
<?php
$bdd->query('SET lc_time_names = "fr_FR"');
$ville_sel = $_POST['ville_select'];
//echo $_POST["ville_select"];
$reponse = $bdd->prepare('SELECT ville, temperature, DATE_FORMAT(last_update, "Le %d %M %Y à %Hh%i") AS last_update FROM `temperaturevilles` WHERE ville = ? ');
$reponse->execute(array($ville_sel));
//$date = $reponse->fetch();
$donnees = $reponse->fetch();
//$ville = $reponse->fetch();
/*while ($donnees = $reponse->fetch())
    {
        if ($donnees['temperature'] == 0)
        echo '<h3>A '.$donnees['ville'].' il fait actuellement N/A °C</h3> <br/>';
        else
        echo '<h3>A '.$donnees['ville'].' il fait actuellement '.$donnees['temperature'].' °C</h3> <br/>';
    }
*/
if ($donnees['temperature'] == 0)
        echo '<h3>'.$donnees['last_update'].' Dans la ville de '.htmlspecialchars(ucfirst($donnees['ville'])).' il fesait actuellement N/A °C</h3> <br/>';
        else
        echo '<h3>'.$donnees['last_update'].' dans la ville de '.htmlspecialchars(ucfirst($donnees['ville'])).' il fesait '.$donnees['temperature'].' °C</h3> <br/>';
?>

</html>