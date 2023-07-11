<?php
session_start();
include "../config/config.php";
include "../config/database.php";
include "../" . $config["webspira"] . "config/connection.php";

$nomorthbarang  = $_POST["nomorthbarang"];
$kode  = $_POST["kode"];
$query = "
CALL sp_generate_dashboard_cylinder(
	'" . $nomorthbarang . "',
	'" . $kode . "'
);";
$debug = "query = " . str_replace(array("\n", "\r", "\t"), " ", $query);
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
	"payload" => json_encode($_POST),
	"nomorthbarang" => $nomorthbarang,
	"kode" => $kode,
	"message" => $res["message"],
]);
