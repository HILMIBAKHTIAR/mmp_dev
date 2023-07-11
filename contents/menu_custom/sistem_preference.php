<?php
include "config/database.php";
include $config["webspira"]."config/connection.php";

$user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM shpreference WHERE nomormhadmin = ".$_SESSION['login']['nomor']));
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);
if(isset($_POST['sizefont'])){
	$path = "contents/image/";
	if(!$user){
		// INSERT DATA
		if(!empty($_FILES['bgimg_sidebar']) && $_FILES['bgimg_sidebar']['tmp_name'] != '')
		{
			$path = $path . $_FILES['bgimg_sidebar']['name'];
			if(move_uploaded_file($_FILES['bgimg_sidebar']['tmp_name'], $path)) {
				mysqli_query($con, "INSERT INTO shpreference (nomormhadmin, fonts-size, bg_sidebar, toogle_sidebar, active_menu, bgimg_sidebar, menu_position)
				VALUES ('".$_SESSION['login']['nomor']."', '".$_POST['sizefont']."', '".$_POST['radio_theme']."', '".$_POST['togglebar']."', '".$_POST['radio_active_theme']."', '".$_FILES['bgimg_sidebar']['name']."', '".$_POST['menu_position']."')");
			}else{
				?>
				<script type="text/javascript">
					alert("<?php echo $phpFileUploadErrors[$_FILES['bgimg_sidebar']['error']]; ?>");
				</script>
				<?php
			}
		}else{
			mysqli_query($con, "INSERT INTO shpreference (nomormhadmin, fonts_size, bg_sidebar, toogle_sidebar, active_menu, bgimg_sidebar, menu_position)
			VALUES ('".$_SESSION['login']['nomor']."', '".$_POST['sizefont']."', '".$_POST['radio_theme']."', '".$_POST['togglebar']."', '".$_POST['radio_active_theme']."', '".$_SESSION['bgimg_sidebar']."', '".$_SESSION['menu_position']."')");
		}
	}else{
		// UPDATE DATA
		if(!empty($_FILES['bgimg_sidebar']) && $_FILES['bgimg_sidebar']['tmp_name'] != '')
		{
			$path = $path . $_FILES['bgimg_sidebar']['name'];
			if(move_uploaded_file($_FILES['bgimg_sidebar']['tmp_name'], $path)) {
				mysqli_query($con, "
					UPDATE shpreference
					SET fonts_size = '".$_POST['sizefont']."',
							bg_sidebar = '".$_POST['radio_theme']."',
							toogle_sidebar = '".$_POST['togglebar']."',
							active_menu = '".$_POST['radio_active_theme']."',
							bgimg_sidebar = '".$_FILES['bgimg_sidebar']['name']."',
							menu_position = '".$_POST['menu_position']."'
					WHERE nomormhadmin = '".$_SESSION['login']['nomor']."'
				");
				// $_SESSION["bgimg_sidebar"]  = $_FILES['bgimg_sidebar']['name'];
			}else{ ?>
				<script type="text/javascript">
					alert("<?php echo $phpFileUploadErrors[$_FILES['bgimg_sidebar']['error']]; ?>");
				</script>
				<?php
			}
		}else{
			mysqli_query($con, "
				UPDATE shpreference
				SET fonts_size = '".$_POST['sizefont']."',
						bg_sidebar = '".$_POST['radio_theme']."',
						toogle_sidebar = '".$_POST['togglebar']."',
						active_menu = '".$_POST['radio_active_theme']."',
						menu_position = '".$_POST['menu_position']."'
				WHERE nomormhadmin = '".$_SESSION['login']['nomor']."'
			");
		}
	}

	// $_SESSION["bg_sidebar"]     = $_POST['radio_theme'];
	// $_SESSION["fonts_size"]     = $_POST['sizefont'];
	// $_SESSION["toogle_sidebar"] = $_POST['togglebar'];
	// $_SESSION["active_menu"]    = $_POST['radio_active_theme'];
	// $_SESSION["menu_position"]  = $_POST['menu_position'];
?>
<!-- <script type="text/javascript"> window.history.go(-1); </script> -->
<?php
}
?>
<form action="?m=<?=$_GET['m']; ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
<div class="row">
	<button type="button" class="bt-preference"><i class="fa fa-sliders" aria-hidden="true"></i></button>
	<div class="col-xs-12">
		<div class="box fadein">
			<div class="box-header">
				<div class="box-name">
					<span>Change Preference</span>
				</div>
			</div>
			<div class="box-content">
				<div class="form-group " name="div_H_i1">
 					<label for="Nama Cabang" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Sidebar Color</label>
 					<div class="col-sm-12 field_group_1" name="div_I_1">
 						<ul class="list-item">
 							<li>
		 						<input type="radio" id="darkitem" class="radio-style dark" value="dark" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'dark') echo "checked"; ?>>
		 						<label for="darkitem"></label>
 							</li>
 							<!-- <li>
		 						<input type="radio" id="orangeitem" class="radio-style orange" value="orange" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'orange') echo "checked"; ?>>
		 						<label for="orangeitem"></label>
 							</li>
 							<li>
		 						<input type="radio" id="oceanitem" class="radio-style ocean" value="ocean" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'ocean') echo "checked"; ?>>
		 						<label for="oceanitem"></label>
 							</li>
 							<li>
		 						<input type="radio" id="reditem" class="radio-style red" value="red" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'red') echo "checked"; ?>>
		 						<label for="reditem"></label>
 							</li>
 							<li>
		 						<input type="radio" id="greenitem" class="radio-style green" value="green" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'green') echo "checked"; ?>>
		 						<label for="greenitem"></label>
 							</li>
 							<li>
		 						<input type="radio" id="blueitem" class="radio-style blue" value="blue" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'blue') echo "checked"; ?>>
		 						<label for="blueitem"></label>
 							</li> -->
 							<li>
		 						<input type="radio" id="dongkeritem" class="radio-style dongker" value="dongker" name="radio_theme" <?php if($_SESSION["bg_sidebar"] == 'dongker') echo "checked"; ?>>
		 						<label for="dongkeritem"></label>
 							</li>
 						</ul>
 					</div>
 				</div>
 				<div class="form-group " name="div_H_i1">
 					<label for="Nama Cabang" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Active Color</label>
 					<div class="col-sm-12 field_group_1" name="div_I_2">
 						<ul class="list-item">
 							<li>
		 						<input type="radio" id="active_dark" class="radio-style dark" value="dark" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'dark') echo "checked"; ?>>
		 						<label for="active_dark"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_orange" class="radio-style orange" value="orange" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'orange') echo "checked"; ?>>
		 						<label for="active_orange"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_ocean" class="radio-style ocean" value="ocean" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'ocean') echo "checked"; ?>>
		 						<label for="active_ocean"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_red" class="radio-style red" value="red" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'red') echo "checked"; ?>>
		 						<label for="active_red"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_green" class="radio-style green" value="green" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'green') echo "checked"; ?>>
		 						<label for="active_green"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_blue" class="radio-style blue" value="blue" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'blue') echo "checked"; ?>>
		 						<label for="active_blue"></label>
 							</li>
 							<li>
		 						<input type="radio" id="active_dongker" class="radio-style dongker" value="dongker" name="radio_active_theme" <?php if($_SESSION["active_menu"] == 'dongker') echo "checked"; ?>>
		 						<label for="active_dongker"></label>
 							</li>
 						</ul>
 					</div>
 				</div>
 				<div class="form-group " name="div_H_i1">
 					<label for="Nama Cabang" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Font Size</label>
 					<div class="col-sm-12 field_group_1" name="div_I_1">
 						<select class="form-control" name="sizefont">
							<option style="font-size: 12px;" value="small" <?php if($_SESSION["fonts_size"] == 'small') echo "selected"; ?>>Small</option>
							<option style="font-size: 14px;" value="medium" <?php if($_SESSION["fonts_size"] == 'medium') echo "selected"; ?>>Medium</option>
							<option style="font-size: 16px;" value="big" <?php if($_SESSION["fonts_size"] == 'big') echo "selected"; ?>>Big</option>
						</select>
 					</div>
 				</div>
 				<div class="form-group " name="div_H_i1">
 					<label for="Menu Position" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Menu Position</label>
 					<div class="col-sm-12 field_group_1" name="div_I_1">
 						<select class="form-control" name="menu_position">
							<option style="font-size: 12px;" value="left" <?php if($_SESSION["menu_position"] == 'left') echo "selected"; ?>>Left</option>
							<option style="font-size: 14px;" value="bottom" <?php if($_SESSION["menu_position"] == 'bottom') echo "selected"; ?>>Bottom</option>
						</select>
 					</div>
 				</div>
 				<div class="form-group " name="div_H_i1">
 					<label for="Nama Cabang" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Sidebar Style</label>
 					<div class="col-sm-12 field_group_1" name="div_I_1">
 						<select class="form-control" name="togglebar">
							<option style="font-size: 12px;" value="hidebar" <?php if($_SESSION["toogle_sidebar"] == 'hidebar') echo "selected"; ?>>Hide</option>
							<option style="font-size: 14px;" value="showbar" <?php if($_SESSION["toogle_sidebar"] == 'showbar') echo "selected"; ?>>Show</option>
						</select>
 					</div>
 				</div>
 				<div class="form-group " name="div_H_i1">
 					<label for="Nama Cabang" form="form_edit" class="control-label col-sm-12 req" style="text-align: left;">Background</label>
 					<?php if(isset($_SESSION["bgimg_sidebar"]) && !empty($_SESSION["bgimg_sidebar"])) {?>
 						<img src="contents/image/<?php echo $_SESSION["bgimg_sidebar"] ?>" width="50px" style="margin-left:20px;margin-bottom: 10px;">
 					<?php }?>
 					<div class="col-sm-12 field_group_1" name="div_I_1">
 						<input type="file" name="bgimg_sidebar">
 					</div>
 				</div>
 				<hr>
 				<button class="btn btn-filter" type="submit"><i class="fa fa-save"></i>&nbsp;SAVE</button>
			</div>
		</div>
	</div>
</div>
</form>