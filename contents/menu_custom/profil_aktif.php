<?php
if(empty($_GET["no"]))
	$_GET["no"] = $_SESSION["login"]["nomor"];
$edit_include = array("contents/menu_custom/profil_aktif-edit.php");
include $config["webspira"]."codes/edit.php";
echo $edit_html;
?>