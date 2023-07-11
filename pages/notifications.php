<?php 
session_start();
include "../config/config.php";
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";

$nomor = $_SESSION["login"]["nomor"];

if($_POST['id'] == 'get_notif'){
	$child = mysqli_query($con, " 
		SELECT 
			a.*, a.nomor as nomor,
			b.nama AS users,
			DATE_FORMAT( a.dibuat_pada, '%d-%m-%Y at %H:%i' ) AS date_time,
			IF((SELECT a1.nomor FROM notifications a1 WHERE !FIND_IN_SET (".$nomor.", a1.read_by) AND a.nomor = a1.nomor) > 0, 0, 1) AS read_status,
			IF((SELECT a1.nomor FROM notifications a1 WHERE !FIND_IN_SET (".$nomor.", a1.read_new_by) AND a.nomor = a1.nomor) > 0, 0, 1) AS new_status
		FROM notifications a 
		LEFT JOIN mhadmin b ON a.dibuat_oleh = b.nomor 
		WHERE FIND_IN_SET (".$nomor.", notify_to)
		AND !FIND_IN_SET (".$nomor.", click_by)
		ORDER BY a.nomor desc
	");
	$parent = mysqli_fetch_array(mysqli_query($con, "SELECT count(nomor) AS nomor FROM notifications WHERE !FIND_IN_SET (".$nomor.", read_by) AND FIND_IN_SET (".$nomor.", notify_to)"));

	$data["parent"] = array("count" => $parent["nomor"]);
	$data["child"] = array();	
	while ($row = mysqli_fetch_assoc($child)) {
		array_push($data["child"], array(
			"message" => $row["keterangan"],
			"users" => $row["users"],
			"date_time" => $row["date_time"],
			"read_status" => $row["read_status"],
			"new_status" => $row["new_status"],
			"link" => $row["link"],
			"nomor" => $row["nomor"]
			)
		);
	}
	echo json_encode($data);
}
if($_POST['id'] == 'update_notif'){
	mysqli_query($con, "UPDATE notifications SET read_by = CONCAT(read_by, ',', ".$nomor.") WHERE !FIND_IN_SET (".$nomor.", read_by) AND FIND_IN_SET (".$nomor.", notify_to)");
	mysqli_query($con, "UPDATE notifications SET read_new_by = CONCAT(read_new_by, ',', ".$nomor.") WHERE !FIND_IN_SET (".$nomor.", read_new_by) AND FIND_IN_SET (".$nomor.", notify_to)");
}
if($_POST['id'] == 'update_click_notif'){
	$nomor_notification=$_POST["nomor"];
	mysqli_query($con, "UPDATE notifications SET click_by = CONCAT(click_by, ',', ".$nomor.") WHERE  nomor=".$nomor_notification);
}
?>