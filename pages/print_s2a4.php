<?php
session_start();
$page_dir = "../";
include $page_dir."config/config.php";
include $page_dir.$config["webspira"]."dashboard_prep.php";

$conn = new mysqli($mysql["server"],$mysql["username"],$mysql["password"],$mysql["database"]);
if($conn->connect_error)
	die("Connection failed: ".$conn->connect_error);

	date_default_timezone_set("Asia/Jakarta");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?=$_SESSION["cabang"]["nama"]?><?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["title"])) echo " - Print ".$_SESSION["menu_".$_SESSION["g.menu"]]["title"]; ?></title>
	<link href="<?=$page_dir?>contents/image/favicon.ico" rel="shortcut icon" />
	<link href="<?=$page_dir.$config["webspira"]?>assets_dashboard/css/style_invoice.css" media="all" rel="stylesheet" type="text/css" />
</head>
<?php
$no = $_GET["no"];
$onload = "";
if(isset($_GET["d"]))
	if($_GET["d"] == "direct")
		$onload = "window.print()"
?>
<body onload="<?=$onload?>">
	<!-- <?php if($useheader == true){ ?> -->
	<!--<div class="footer"><img src="<?=$page_dir?>contents/image/print_header.png" width="100%"></div>-->
	<!-- <?php } ?> -->
	<div id="wrapper">
		<?php include $page_dir."contents/menu_frame/".$_SESSION["g.frame"]."-".$_SESSION["g.menu"]."-print_s2a4.php"; ?>
	</div>
	<!-- <?php if($usefooter == true){ ?> -->
	<!--<div class="footer"><img src="<?=$page_dir?>contents/image/print_footer.png" width="100%"></div>-->
	<!-- <?php } ?> -->
</body>
<?php $conn->close(); ?>
</html>
