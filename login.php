
<!DOCTYPE html>
<html lang="en" class="h-100">
<?php
@session_start();
if($_POST){	
	if($_POST['username']=='admin' && $_POST['password']=='admin'){
		$_SESSION['username'] =$_POST['username'];
		echo "<script>location.href='index.php'</script>";
	}
	if($_POST['username']=='user' && $_POST['password']=='user'){
		$_SESSION['username'] =$_POST['username'];
		echo "<script>location.href='index.php'</script>";
	}
	else{
		echo "<script>alert('Gagal Total')</script>";
	}
}
?>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 23:18:51 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:title" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:description" content="W3crm:Customer Relationship Management Admin Bootstrap 5 Template">
	<meta property="og:image" content="social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Double moving Average</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="login/images/favicon.png">
	<link href="login/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
   <link href="login/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row h-100">
				<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign In</h3>
							<p>Sign in to your account to start using Forecasting DMA</p>
						</div>
						<form action="" method="post">
							<div class="mb-4">
								<label class="mb-1 text-dark">Username</label>
								<input name="username" type="username" class="form-control form-control" placeholder="username">
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input name="password" type="password" id="dz-password" class="form-control" placeholder="123456">
								<span class="show-pass eye">
								
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								
								</span>
							</div>
							<div class="text-center mb-4">
								<button type="submit" class="btn btn-primary btn-block">Sign In</button>
							</div>
						</form>
					</div>
				</div>
                <div class="col-xl-6 col-lg-6">
					<div class="pages-left h-100">
						<div class="login-content">
							<a href="index.html"><img src="login/images/logo-full.png" class="mb-3 logo-dark" alt=""></a>
							<a href="index.html"><img src="login/images/logi-white.png" class="mb-3 logo-light" alt=""></a>
						</div>
						<div class="login-media text-center">
							<img src="login/images/login.png" alt="">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
 <script src="login/vendor/global/global.min.js"></script>
<script src="login/vendor/bootstrap-select/dist/login/js/bootstrap-select.min.js"></script>
<script src="login/js/deznav-init.js"></script>
<script src="login/js/demo.js"></script>
  <script src="login/js/custom.js"></script>

</body>

<!-- Mirrored from w3crm.dexignzone.com/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Aug 2023 23:18:52 GMT -->
</html>