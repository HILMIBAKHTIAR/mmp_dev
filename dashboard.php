<?php
session_start();
include "config/config.php";
include $config["webspira"]."dashboard_prep.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include $config["webspira"]."dashboard_head.php"; ?>
		<style type="text/css">
			<?php if(isset($_SESSION["bgimg_sidebar"]) && !empty($_SESSION["bgimg_sidebar"])) {?>
			#sidebar-left:before{
				background-image:url('<?php echo "contents/image/".$_SESSION["bgimg_sidebar"]; ?>');
			}
			<?php }?>
			/*.cst-btn-browse a.btn {
			    border: 0px solid #e5e6e7!important;
			}
			.btn-app-sm.btn-info {
			    border: 1px solid #264E7A!important;
			}*/
		</style>
	</head>
	<body id="<?php echo $_SESSION['bg_sidebar']; ?>" class="<?php echo $_SESSION['fonts_size'].' active-'.$_SESSION['active_menu'].' position-'.$_SESSION['menu_position']; ?>">
		<div class="loadbar" style="height: 2px; background: #222D32; position: fixed; top: 0; z-index: 999;"></div>
		<div id="main" class="container-fluid <?php if($_SESSION['toogle_sidebar'] == 'hidebar') echo 'sidebar-show'; ?>">
			<?php include $config["webspira"]."dashboard_main.php"; ?>
		</div>
		<div class="setting hidepref">
			<?php include "contents/menu_custom/sistem_preference.php"; ?>
		</div>
		
	</body>
	<!-- DATE TIME PICKER -->
	<!-- <link rel="stylesheet"
          type="text/css"
          href="assets_custom/css/bootstrap-datetimepicker.css"/>
	<script src="assets_custom/js/bootstrap-datetimepicker.min.js"></script> -->
	
	<!-- EMOTICON RATING -->
	<!-- <script src="assets_custom/js/emotion-ratings.js"></script> -->
	<?php include $config["webspira"]."dashboard_foot.php"; ?>
	<?php include $page_dir."assets_custom/php/foot_js.php"; ?>
</html>
