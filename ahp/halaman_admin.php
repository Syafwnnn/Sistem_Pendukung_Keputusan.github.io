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
    <title>Menu Admin SPK AHP</title>

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/style_main.css" />

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
                        <a href="?m=beranda_admin" class="active">
                            <i class="bx bx-home-alt-2"></i>
                            <span class="title">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=kriteria">
                            <i class='bx bx-data'></i>
                            <span class="title">Data Kriteria</span>
                        </a>
                    </li>

                    <li>
                        <a href="?m=alternatif">
                            <i class="bx bx-data"></i>
                            <span class="title">Data Alternatif</span>
                        </a>
                    </li>

                    <li class="<?= is_hidden('user') ?>">
                        <a href="?m=user" >
                            <i class="bx bx-data"></i>
                            <span class="title">Data Pengguna</span>
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
    
    <div class="container active hentry">
    <?php
    if (file_exists($mod . '.php'))
        include $mod . '.php';
    else
        include 'home_admin.php';
    ?>
    </div>

    <!-- Js -->            
    <script src="assets/js/main.js">
    </script>   

</body>
</html>