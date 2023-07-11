<?php
session_start();
include "../config/config.php";
if(!empty($_GET["file"]))
{
	include "../contents/browse/".$_GET["file"].".php";
	$acomplete = $browse;
}
else
	$acomplete = $_SESSION["acomplete_".$_GET["id"]];
if(!empty($acomplete["state"]))
	$config["state"] = $acomplete["state"];
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";
include "../".$config["webspira"]."functions/get_message.php";
include "../".$config["webspira"]."codes/json_autocomplete.php";
?>