<?php
include 'bdd.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipbook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <a href="index.php" class="link-secondary p-2">Retour</a>
    <p id="result"></p>

    <?php
        $id = $_GET['id'];
        //$infos = mysqli_query($bdd, "SELECT link FROM livre WHERE id=$id");
        //$row = mysqli_fetch_assoc($infos);
        $infos = $bdd->query("SELECT link FROM livre WHERE id=$id");
        $row = $infos->fetch(PDO::FETCH_ASSOC);
    ?>

    <span class="page-info m-3">
        Page <span id="page-num"></span> sur <span id="page-count"></span>
    </span>
    
    <div class="book">
        <button class="btn" id="prev-page">〈</button>
        <canvas id="pdf-render"></canvas>
        <button class="btn" id="next-page">〉</button>
    </div>
    
    <div class="centrer">
        <div class="progress m-4 col-5">
            <div class="progress-bar bg-dark" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <?php include 'script.php';?>

</body>
</html>