<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';

    //$bdd = mysqli_connect($servername, $username, $password, "biblio");
    //if(!$bdd) die('Erreur:'.mysqli_connect_error());

    $bdd = new PDO("mysql:host=$servername; dbname=biblio", $username, $password);

    $test = "UPDATE users SET loginn='joe' WHERE id=1";
    $bdd->exec($test);

?>