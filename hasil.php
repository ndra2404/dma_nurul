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
    <title>FORECASTING</title>

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

    <!-- Chart JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">        
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <h2>FORECASTING</h2>
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
                            <a href="#" >
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
                            <h2 class="title-3 ">Hasil Peramalan</h2>
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
                                    <div class="table-data__tool-left" style="display:none">
                                        <form action="hasil.php" method="get">
                                            <div class="rs-select2--light rs-select2">
                                                <p>Konstanta :</p>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--light rs-select2--sm">
                                                <?php
                                                if(isset($_GET['konstanta'])){
                                                    $konstanta = $_GET['konstanta'] ?>
                                                    <input type="number" style="display:none" name="konstanta" id="konstanta" class="form-control" value="10" required disabled/>
                                                    <?php }else{ ?>
                                                    <input type="number"  style="display:none" name="konstanta" id="konstanta" class="form-control"  value="10" required disabled/>
                                                    <?php } ?>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href=index.php>        
                                            <button class="au-btn au-btn-icon au-btn--blue2 au-btn--small">
                                                Selesai
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div style="width: auto; height: auto">
                                            <canvas id="myChart" width="100%" height="35p%"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-data">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Periode</th>
                                                <th>Item</th>
                                                <th>Value</th>
                                                <th>MA-1</th>
                                                <th>MA-2</th>
                                                <th>a</th>
                                                <th>b</th>
                                                <th>Prediksi</th>
                                                <th>Error</th>
                                                <th>ABS(error/qty)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $konstanta = $_GET['konstanta']??1-1;
                                            $tampil = mysqli_query($koneksi,"SELECT 
                                            a.periode, 
                                            a.item, 
                                            a.value, 
                                            Round( ( SELECT SUM(b.value) / COUNT(b.value) FROM tbl_penjualan AS b 
                                            WHERE DATEDIFF(a.periode, b.periode) BETWEEN 0 AND $konstanta), 2) AS 'M1',
                                            Round( ( SELECT SUM(b.M1) / COUNT(b.M1) FROM
                                                (SELECT 
                                                a.periode, 
                                                a.value, 
                                                Round( ( SELECT SUM(b.value) / COUNT(b.value) FROM tbl_penjualan AS b WHERE DATEDIFF(a.periode, b.periode) 
                                                BETWEEN 0 AND $konstanta), 2) AS 'M1' FROM tbl_penjualan AS a ORDER BY a.periode)
                                            AS b WHERE DATEDIFF(a.periode, b.periode) BETWEEN 0 AND $konstanta), 2) AS 'M2'
                                            FROM tbl_penjualan AS a ORDER BY a.periode");
                                            $total = mysqli_num_rows($tampil); 
                                            while($data=mysqli_fetch_array($tampil)){
                                            ?>
                                            <tr>
                                                <td><?php echo $n=$no++;?></td>
                                                <td><?php echo $tanggal=$data ['periode'];
                                                    $tanggal_ar[] = $tanggal;?></td>
                                                <td><?=$data ['item']?></td>
                                                <td><?=$data ['value']?></td>
                                                <td><?php echo number_format($harga=$data['value'],2,",",".");
                                                    $harga_ar[] = $harga;?></td>
                                                <td><?php echo number_format($data['M1'],2,",",".");?></td>
                                                <td><?php echo number_format($data['M2'],2,",",".");?></td>
                                                <td><?php echo number_format($a=(2*$data['M1'])-$data['M2'],2,",",".");?></td>
                                                <td><?php echo number_format($b=2/(5-1)*($data['M1']-$data['M2']),2,",",".");?></td>
                                                <td><?php echo number_format($prediksi=$a+$b,2,",",".");
                                                     $prediksi_ar[] = $prediksi;?></td>
                                                <td><?php echo number_format($error=$data['value']-$prediksi,2,",",".");?></td>
                                                <td style="display:none;"><?php echo number_format($abs=abs($error/$data['value']),2,",",".");?></td>
                                                <td style="display:none;"><?php 
                                                $jumlah_ar[] = $abs;
                                                $sum=array_sum($jumlah_ar);
                                                echo number_format($sum1=$sum,2,",",".");?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <script  type="text/javascript">
                                    var ctx = document.getElementById("myChart").getContext("2d");
                                    var data = {labels: [<?php $tgl=array($tanggal_ar);
                                                        foreach($tgl[0] as $tgl2) {
                                                            echo "'$tgl2'" . ", ";
                                                        }?>],
                                                datasets: [
                                                {
                                                    label: "Penjualan Bread & Cake",
                                                    fill: false,
                                                    lineTension: 0.1,
                                                    backgroundColor: "rgba(30, 144, 255, 1)",
                                                    borderColor: "rgba(30, 144, 255, 1)",
                                                    pointHoverBackgroundColor: "rgba(30, 144, 255, 1)",
                                                    pointHoverBorderColor: "rgba(30, 144, 255, 1)",
                                                    data: [<?php $hrg=array($harga_ar);
                                                            foreach($hrg[0] as $hrg2) {
                                                                echo "$hrg2" . ", ";
                                                            }?>]
                                                    },
                                                {
                                                    label: "Forecasting",
                                                    fill: false,
                                                    lineTension: 0.1,
                                                    backgroundColor: "rgba(255, 20, 147, 1)",
                                                    borderColor: "rgba(255, 20, 147, 1)",
                                                    pointHoverBackgroundColor: "rgba(255, 20, 147, 1)",
                                                    pointHoverBorderColor: "rgba(255, 20, 147, 1)",
                                                    data: [<?php $prd=array($prediksi_ar);
                                                            foreach($prd[0] as $prd2) {
                                                                echo "$prd2" . ", ";
                                                            }?>]
                                                    }
                                                    ]
                                                    };
                                    var myBarChart = new Chart(ctx, {
                                                type: 'line',
                                                data: data,
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                            }
                                                        }],
                                                        xAxes: [{
                                                            gridLines: {
                                                                color: "rgba(0, 0, 0, 0)",
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                    </script>
                                <br/>
                                <h4>Nilai MAPE (Mean Absolute Percentage Error)= <?php echo number_format(100/$n*$sum1,2,",",".")?>%</h4>
                                <h2>Prediksi <?php echo $prediksi = $_GET['prediksi']??1 ?> periode kedepan</h2>
                                <br/>
                                <div class="table-responsive table-data">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Periode</th>
                                                <th>Prediksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            $m=1;
                                            $date1 = $tanggal;// pendefinisian tanggal awal //operasi penjumlahan tanggal sebanyak 6 hari
                                            while($no<=$prediksi){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $date1 = date('Y-m-d', strtotime('+1 days', strtotime($date1)));?></td>
                                                <td><?php echo number_format($a+$b*$m++,2,",",".");?></td>
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