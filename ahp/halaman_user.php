<?php
include 'functions.php';
if (empty($_SESSION['user']))
    header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Menu User SPK AHP</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/style_main.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/highcharts-3d.js"></script>
    <script src="assets/js/exporting.js"></script>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <section class="sidebar">
                    <div class="nav-header">
                        <p class="logo">SPK<span>AHP</span> </p>
                        <i class="bx bx-network-chart btn-menu"></i>
                    </div>
                    <ul class="nav">
                    <li>
                        <a href="?m=beranda">
                            <i class="bx bx-home-alt-2"></i>
                            <span class="title">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=rel_kriteria">
                            <i class='bx bx-analyse'></i>
                            <span class="title">Analisis Kriteria</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=rel_alternatif">
                            <i class="bx bx-analyse"></i>
                            <span class="title">Analisis Alternatiif</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=hitung">
                            <i class="bx bx-calculator"></i>
                            <span class="title">Perhitungan</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=password">
                            <i class='bx bx-lock-alt'></i>
                            <span class="title">Password</span>
                        </a>
                    </li>

                    <li>
                        <a href="aksi.php?act=logout">
                            <i class='bx bx-log-out'></i>
                            <span class="title">Keluar</span>
                        </a>
                    </li>
                    </ul>

                    <div class="theme-wrapper">
                        <i class="bx bxs-moon theme-icon"></i>
                        <p>Dark Theme</p>
                        <div class="theme-btn">
                            <span class="theme-ball"></span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </nav>

    <div class="container hentry">
    <?php
    if (file_exists($mod . '.php'))
        include $mod . '.php';
    else
        include 'home_user.php';
    ?>
    </div>

    <!-- Js -->            
    <script src="assets/js/main.js"></script>

</body>
</html>