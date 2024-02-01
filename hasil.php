<?php 
include "koneksi.php";
session_start();
if(!isset($_SESSION['username'])){
	echo "<script>location.href='login.php'</script>";

}
function countStart($data,$ma) {
    $space = count($data);
    $MA = MovingAverage($data, $space, $ma);
    $DMA = DoubleAverage($MA, $space, $ma);
    $AT = AKoefisien($MA, $DMA, $ma);
    $BT = BKoefisien($MA, $DMA, $ma);
    $FT = Ft($AT, $BT, $ma);
    $MAPE = MAPE($data, $FT, $ma);

    array_push($data, array('Hasil peramalan', NULL,NULL));
    return array(
        'data'=>$data,
        'MA'=>$MA,
        'DMA' => $DMA,
        'AT' => $AT,
        'BT' => $BT,
        'FT' => $FT,
        'MAPE'=>$MAPE
    );
}
function MovingAverage($data,$index,$ma) {
    $MA = array_fill(0, $index + 1, NULL);
    for ($i = $ma - 1; $i < $index; $i++) { 
        $MA[$i] = array_sum(array_column(array_slice($data, $i - $ma + 1, $ma), 1)) / $ma;
    }

    return $MA;
}

function DoubleAverage($data,$index,$ma) {
    // $MA = array_fill(0, $index + 1, NULL);
    // for ($i = $ma - 1; $i < $index; $i++) { 
    //     $MA[$i] = round(array_sum(array_slice($data, $i - $ma + 1, $ma)) / ($ma-2));
    // }
    $MA = array_fill(0, $index + 1, NULL);
    for ($i = ($ma*2)-2; $i < $index; $i++) { 
        $MA[$i] = array_sum(array_slice($data, $i - $ma + 1, $ma)) / $ma;
    }

    
    return $MA;
}

function AKoefisien($data, $data2, $ma) {
    // $index = count($dma);
    // $AT = array_fill(0, $index, NULL);
    // for ($i = $ma + 1; $i < $index; $i++) { 
    //     $AT[$i] = array_sum(array_slice($sma, $i - $ma + 1, $ma)) / $ma;
    // }
    $index = count($data2)-1;
    $AT = array_fill(0, $index + 1, NULL);
    for ($i = ($ma*2)-2; $i < $index; $i++) { 
        $AT[$i] = (2 * $data[$i]) - $data2[$i];
    }

    
    return $AT;
            
}

function BKoefisien($data, $data2, $ma) {
    $index = count($data2)-1;
    $BT = array_fill(0, $index + 1, NULL);
    for ($i = ($ma*2)-2; $i < $index; $i++) { 
        $BT[$i] = (2/($ma-1)) * ($data[$i]) - $data2[$i];
    }
    return $BT;
}

function Ft($data, $data2, $ma) {
    $index = count($data2);
    $FT = array_fill(0, $index + 1, NULL);
    for ($i = ($ma*2)-1; $i < $index; $i++) { 
        $FT[$i] = $data[$i-1] + $data2[$i-1];
    }
    return $FT;
}
function MAPE($data, $data2, $ma) {
    $index = count($data2);
    $MAPE = array_fill(0, $index + 1, NULL);
    for ($i = ($ma*2)-1; $i < $index; $i++) {
        $MAPE[$i] = (abs($data[$i][1]-$data2[$i])/$data[$i][1])*100;
        //(abs($data[$i-1] - $data2[$i-1])/$data[$i-1])*100
    }
    return $MAPE;
}

$tampil = mysqli_query($koneksi,"SELECT 
    a.periode, 
    a.item, 
    a.value
    FROM tbl_penjualan AS a ORDER BY a.periode");
    $total = mysqli_num_rows($tampil);
    $output = [];
    while($data=mysqli_fetch_array($tampil)){
        $output[] = [
            $data['periode'],
            $data['value'],
            $data['item']
        ];
    }
    $periode = 3;
    $hasil = countStart($output,$periode);
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
                                                s
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
                                                <th>Penjualan</th>
                                                <th>MA-3 bulan</th>
                                                <th>DMA 3 bulan</th>
                                                <th>at</th>
                                                <th>bt</th>
                                                <th>ft</th>
                                                <th>MAPE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            $n=0;
                                            foreach($hasil['data'] as $row){
                                            ?>
                                            <tr>
                                                <td><?=$n=$n+1?></td>
                                                <td><?=$row[0]?></td>
                                                <td><?=$row[1]?></td>
                                                <td><?=$row[2]?></td>
                                                <td><?=number_format($hasil['MA'][$i],2)!='0.0'?number_format($hasil['MA'][$i],2):''?></td>
                                                <td><?=number_format($hasil['DMA'][$i],2)!='0.0'?number_format($hasil['DMA'][$i],2):''?></td>
                                                <td><?=number_format($hasil['AT'][$i],2)!='0.0'?number_format($hasil['AT'][$i],2):''?></td>
                                                <td><?=number_format($hasil['BT'][$i],2)!='0.0'?number_format($hasil['BT'][$i],2):''?></td>
                                                <td><?=number_format($hasil['FT'][$i],2)!='0.0'?number_format($hasil['FT'][$i],2):''?></td>
                                                <td><?=number_format($hasil['MAPE'][$i],2)!='inf'&&number_format($hasil['MAPE'][$i],2)!='0.0'?number_format($hasil['MAPE'][$i],2):''?></td>
                                                <?php 
                                                $i++;
                                                //echo number_format($sum1=$sum,2,",",".");?>
                                            </tr>
                                            <?php
                                            }
                                            ?>
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