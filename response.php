<?php
include 'bdd.php';

$id = $_POST['id'];
$displayData = $_POST['mydata'];
$progressupdate =   "UPDATE suivi 
                    INNER JOIN livre
                    ON livre.id=suivi.id_livre
                    INNER JOIN users
                    ON users.id=suivi.id_user
                    SET suivi.progress=$displayData 
                    WHERE livre.id=$id AND users.id=1";
$bdd->exec($progressupdate);


?>

