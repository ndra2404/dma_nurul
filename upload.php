<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?=$_SESSION['username']?></title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">        
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                        <img src="images/logo.png">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.php">
                        <li>
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                        <?php
                        if($_SESSION['username']=='admin'){
                        ?>
                        <li>
                            <a href="upload.php">
                                <i class="fas fa-chart-bar"></i>Data Peramalan</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="active">
                            <a href="hasil.php" >
                                <i class="fas fa-table"></i>Hasil Peramalan</a>
                        </li>
                        <li>
                            <a href="login.php" >
                                <i class="fas fa-table"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.php">
                <h2><img src="images/logo.png"></h2>
                </a>
            </div>      
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Beranda</a>
                        </li>
                        <?php
                        if($_SESSION['username']=='admin'){
                        ?>
                        <li>
                            <a href="upload.php">
                                <i class="fas fa-chart-bar"></i>Data Peramalan</a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="active">
                            <a href="hasil.php" >
                                <i class="fas fa-table"></i>Hasil Peramalan</a>
                        </li>
                        <li>
                            <a href="login.php" >
                                <i class="fas fa-table"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <h2 class="title-3 ">Data Peramalan</h2>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container-fluid">
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <form action="hasil.php" method="get"class="form-horizontal">
                                                <?php
                                                if(isset($_GET['konstanta'])){
                                                    $konstanta = $_GET['konstanta'] ?>
                                                    <input type="number" style="display:none" value="10" name="konstanta" id="konstanta" class="form-control" required/>
                                                    <?php }else{ ?>
                                                    <input type="number" style="display:none"   value="10" name="konstanta" id="konstanta" class="form-control" required/>
                                                    <?php } ?>
                                            <div class="rs-select2--light rs-select2">
                                                <p>Prediksi :</p>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--md">
                                                <?php
                                                if(isset($_GET['prediksi'])){
                                                    $prediksi = $_GET['prediksi'] ?>
                                                    <input type="number" name="prediksi" id="prediksi" class="form-control" value="<?php  echo $prediksi ?>" required/>
                                                    <?php }else{ ?>
                                                    <input type="number" name="prediksi" id="prediksi" class="form-control" required/>
                                                    <?php } ?>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--md">
                                                <div class="text-center">
                                                    <button class="au-btn au-btn-icon au-btn--blue2 au-btn--small">Ramalkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href=index.php>        
                                            <button class="au-btn au-btn-icon au-btn--blue2 au-btn--small">
                                                Ganti Data
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive table-data">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Periode</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $tampil = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan ORDER BY periode");
                                            $total = mysqli_num_rows($tampil); 
                                            while($data=mysqli_fetch_array($tampil)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data ['periode'];?></td>
                                                <td><?php echo $data ['item'];?></td>
                                                <td><?php echo number_format($data['value']);?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->