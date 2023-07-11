<?php
session_start();
include "config/config.php";
include "config/database.php";
include $config["webspira"]."config/connection.php";

$message = "";
if(!empty($_SESSION["login"]["alert"]["message"]))
{
	$message = "<p class='bg-".$_SESSION["login"]["alert"]["type"]."'>".$_SESSION["login"]["alert"]["message"]."</p>";
	unset($_SESSION["login"]["alert"]);
}

$mhformlogin_query = "	SELECT a.*
						FROM mhformlogin a 
						ORDER BY a.nomor DESC";
$mhformlogin = mysqli_query($con, $mhformlogin_query);
$mhformlogin_rows = 0;
if($mhformlogin)
	$mhformlogin_rows = mysqli_num_rows($mhformlogin);

$judul_kiri   = "";
$detail_kiri  = "";
$detail_kanan = "";
if($mhformlogin_rows > 0)
{
	$mhformlogin_array = mysqli_fetch_array($mhformlogin);
	$judul_kiri   = $mhformlogin_array["judul_kiri"];
	$detail_kiri  = $mhformlogin_array["detail_kiri"];
	$detail_kanan = $mhformlogin_array["detail_kanan"];
}

$page = "login";
$company = "MITRA MULTI PACKAGING";

// MODULE :
// - ACCOUNTING INFORMATION SYSTEM -> ais
// - GENERAL AFFAIR -> ga
// - HUMAN RESOURCE -> hr
// - WAREHOUSE MANAGEMENT SYSTEM -> wms
$module = "ais";

// COLOR BUTTON SIGN IN :
// - DARK -> dark
// - DONGKER -> dongker
$signIn = "dark";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?=$company?> - <?=ucfirst($page)?> Page</title>
		<meta charset="utf-8" />
		<meta name="description" content="website developer" />
		<meta name="author" content="Krabsite" />
		<meta name="keyword" content="website developer" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="contents/image/favicon.ico" rel="shortcut icon" />
		<link href="<?=$config["webspira"]?>assets_login/css/font-awesome.css" rel="stylesheet" />
		<link href="<?=$config["webspira"]?>assets_login/css/bootstrap.css" rel="stylesheet" />
		<link href="<?=$config["webspira"]?>assets_login/css/login.css?<?php echo date("H:i:s"); ?>" rel="stylesheet" />

		<!-- CUSTOM LOGIN  -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- <link rel="icon" type="image/png" href="<?php echo $config['webspira']?>assets_login/images/icons/favicon.ico"/> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/animate/animate.css">	
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/select2/select2.min.css">	
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/css/util.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $config['webspira']?>assets_login/css/main.css">
		<!-- CUSTOM LOGIN  -->
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" action="index_login.php" method="post">
						<span class="login100-form-title">
							<?=$company?>
							<hr class="title">
						</span>
		
						<div class="wrap-input100 validate-input" data-validate = "Valid Username is required">
							<input type="text" class="input100" name="username"/>
							<span class="focus-input100"></span>
							<span class="label-input100">Username</span>
						</div>
						
						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input type="password" class="input100" name="password" id="password"/>
							<span class="focus-input100"></span>
							<span class="label-input100 passwordIcon no_pointer_events">Password <i style="pointer-events: auto !important;margin-left:4px;font-size: 18px" class="fa fa-eye-slash showPassword" aria-hidden="true"></i></span>
						</div>
						<!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>

							<div>
								<a href="#" class="txt1">
									Forgot Password?
								</a>
							</div>
						</div> -->
						<div class="container-login100-form-btn">
								<button class="login100-form-btn <?=$signIn?> <?=$module?>" type="submit">
								Sign in
							</button>
						</div>
						<!-- <div class="text-center p-t-46 p-b-20">
							<span class="txt2">
								or sign up using
							</span>
						</div> -->

						<!-- <div class="login100-form-social flex-c-m">
							<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
								<i class="fa fa-facebook-f" aria-hidden="true"></i>
							</a>

							<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</div> -->
						<div class="flex-sb-m w-full center logo">
							<span class="logo">
								<img src="<?php echo $config['webspira']?>assets_login/images/<?=$module?>.png" width="100%">
							</span>
						</div>
					</form>
					<div id="myCarousel" class="login100-more carousel slide" data-ride="carousel" data-interval="5000">
						<!-- Indicators -->
					    <ol class="carousel-indicators">
					      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      <li data-target="#myCarousel" data-slide-to="1" ></li>
					    </ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active" style="background-image: url('<?php echo $config['webspira']?>assets_login/images/<?=$module?>_background.png')">
							</div>
							<div class="item" style="background-image: url('<?php echo $config['webspira']?>assets_login/images/<?=$module?>_background2.png')">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- CUSTOM LOGIN  -->
		<script src="<?php echo $config['webspira']?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/animsition/js/animsition.min.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/bootstrap/js/popper.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/select2/select2.min.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/daterangepicker/moment.min.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/vendor/countdowntime/countdowntime.js"></script>
		<script src="<?php echo $config['webspira']?>assets_login/js/main.js"></script>
		<!-- CUSTOM LOGIN  -->
	</body>
</html>

<script src="<?php echo $config['webspira']?>assets_dashboard/js/jquery.min.js"></script>
<script src="<?php echo $config['webspira']?>assets_dashboard/plugins/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">
	var quotes = $(".quotes");
	var quotes1 = $(".quotes1");
    var quoteIndex = -1;
    
    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(2000)
            .delay(2000)
            .fadeOut(2000, showNextQuote);
        quotes1.eq(quoteIndex % quotes1.length)
            .fadeIn(2000)
            .delay(2000)
            .fadeOut(2000);
    }
    
    showNextQuote();

	function resetPassword(){
		$("#resetbutton").button("loading");

	    var username = $("#reset_username").val();
	    var birthday = $("#reset_birthday").val();

		<?php 
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$pieces_link = explode("dashboard.php", $actual_link);
		?>
	    var url = "<?=$pieces_link[0];?>";
	    	url = url.replace("index.php", "");

		$.ajax({
			async: true,   // this will solve the problem
			type: "POST",
			url: "pages/ajax.php",
			data: { "tipe":"resetPassword", username:username, birthday:birthday },
			success: function (data) {
				alert(data);
				$("#resetbutton").button("reset");
				$("#reset_username").val("");
				$("#reset_birthday").val("");
				$("#myModalResetPassword").modal("toggle");
	        },
	        error: function(jqXHR, textStatus, errorThrown) {
	    		check_failed_grid = false;       
	        }
		});
	}
	function showPassword() {
	  var x = document.getElementById("password");
	  if (x.type === "password") {
	    x.type = "text";
            
	  } else {
	    x.type = "password";
		    
		 
	  }
	}
	$(document).ready(function() {
		// MOBILE USER
		var startTime, endTime;
		var gbMove = false;

		window.addEventListener('touchmove',function(event) {
		  gbMove = true;
		},false);

		window.addEventListener('touchstart',function(event) {
		    endTime = new Date().getTime();
		},false);

		window.addEventListener('touchend',function(event) {
		    endTime = new Date().getTime();   
		},false);
		// MOBILE USER

		$(".showPassword").on('touchstart', function(event) {
	        event.preventDefault();  
	        showPassword();
	        $('.passwordIcon i').removeClass("fa-eye-slash");
	        $('.passwordIcon i').addClass("fa-eye");
	    });

	    $(".showPassword").on('touchend', function(event) {
	        event.preventDefault();  
	        showPassword();
	        $('.passwordIcon i').removeClass("fa-eye");
	        $('.passwordIcon i').addClass("fa-eye-slash");
	    });

	    $(".showPassword").on('mouseup', function(event) {
	        event.preventDefault();  
	        showPassword();
	        $('.passwordIcon i').removeClass("fa-eye");
	        $('.passwordIcon i').addClass("fa-eye-slash");
	    });
	    $(".showPassword").on('mousedown', function(event) {
	        event.preventDefault();  
	        showPassword();
	        $('.passwordIcon i').removeClass("fa-eye-slash");
	        $('.passwordIcon i').addClass("fa-eye");
           
	    });
	});
</script>