<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/logreg.css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/highcharts-3d.js"></script>
        <script src="assets/js/exporting.js"></script>

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Sistem Pendukung Keputusan</title>  
    </head>
    <body>
        <div class="container hentry">
            <?php
            if (file_exists($mod . '.php'))
                include $mod . '.php';
            else
                include 'home.php';
            ?>
        </div>
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/logreg.js"></script>
    </body>
</html>