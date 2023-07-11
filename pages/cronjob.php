<?php
session_start();
include "../config/config.php";
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";

$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
if ($conn_header->connect_error) { die("Connection failed: " . $conn_header->connect_error); }

$sql = "START TRANSACTION;";
$result = $conn_header->query($sql);
$result = 0;
$i = 1;
while (!$result){
	$i>=20 ? $kode = 'test4' : $kode = 'test1';
	$sql = "UPDATE test set kode = '".$kode."' WHERE kode = 'test2'";
	$result = $conn_header->query($sql);
	$i++;
}
$sql = "COMMIT;";
$result = $conn_header->query($sql);
echo $i;
?>