<?php
session_start();
include "../config/config.php";
$grid_id = "load_".$_GET["id"];
include "../contents/grid/".$_GET["id"].".php";
$_GET["id"] = $grid_id;
if(!empty($_SESSION["grid_" . $_GET["id"]]["state"]))
	$config["state"] = $_SESSION["grid_" . $_GET["id"]]["state"];
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";
include "../".$config["webspira"]."codes/json_grid.php";
?>