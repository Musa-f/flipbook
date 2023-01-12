<?php
include 'livre.php';

global $id;
var_dump($id);

$displayData = $_POST['mydata'];
$progressupdate =   "UPDATE suivi 
                    INNER JOIN livre
                    ON livre.id=suivi.id
                    SET suivi.progress=$displayData 
                    WHERE livre.id=$id";
$bdd->exec($progressupdate);




?>

