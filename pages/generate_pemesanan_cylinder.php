<?php 
session_start();
include "../config/config.php";
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";

// $nomorthbarang  = $_POST[ "nomorthbarang"];
$nomorthcylinderproses  = $_POST["nomorthcylinderproses"];
$query = "
CALL sp_generate_pemesanan_cylinder(
	'".$nomorthcylinderproses."'
);";
$debug = "query = ".str_replace(array("\n","\r","\t")," ",$query);
$mysqli_query = mysqli_query($con, $query);

$res = mysqli_fetch_array($mysqli_query);
 
echo json_encode([
	"debug" => $debug,
	"query" => $query,
	"result" => $mysqli_query,
	"error" => mysqli_error($con),
	"errno" => mysqli_errno($con),
	"affected_rows" => mysqli_affected_rows($con),
	"insert_id" => mysqli_insert_id($con),
	"nomorthbarang" => $nomorthbarang,
	"message" => $res["message"],
]);
?>