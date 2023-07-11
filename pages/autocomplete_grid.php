<?php
session_start();
include "../config/config.php";
include "../contents/autocomplete/".$_GET["file"].".php";
if(!empty($acomplete["state"]))
	$config["state"] = $acomplete["state"];
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";
include "../".$config["webspira"]."functions/get_message.php";
include "../".$config["webspira"]."codes/json_autocomplete_grid.php";
?>