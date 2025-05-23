<?php
    include('../../controller/protect.php');
    include("../admin/includes.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICAD - Sistema Academico de Certificação Digital</title>
    <link rel="icon" href="assets/miniatura.png">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php 
        echo $nav;
        echo $aside;
        echo $modal_meus_eventos;
    ?>

    <section id="main-section">
        <div id="profile-info">
            <img src="assets/user_icon.png" alt=avatar>
            <h2>bem vindo(a) <?php echo $_SESSION['nome'] ?></h2>
        </div>
    </section>

    <script src="../admin/script.js"></script>
</body>
</html>
