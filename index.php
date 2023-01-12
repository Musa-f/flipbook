<?php
include 'bdd.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <h1 class="text-center m-5">Biblio</h1>
    <div class="d-flex d-row justify-content-center">
        
    <?php
    //$books = mysqli_query($bdd, "SELECT * FROM livre");
    //foreach($books as $book){
    $books = "SELECT * FROM livre";
    foreach($bdd->query($books) as $book){ 
        ?>
        
        <div class="card m-3 text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$book['titre']?></h5>
                <p class="card-text"><?=$book['auteur']?></p>
                <a href="livre.php?id=<?=$book['id']?>" class="btn btn-primary">Lire le livre</a>
            </div>
        </div>

        <?php
    }
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>