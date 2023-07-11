<?php
$awal = $_POST["tanggal_awal"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d") : '1000-01-01';
$akhir = $_POST["tanggal_akhir"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d") : '4000-01-01';

if (!empty($_POST["tanggal_awal"]))
	$filtering["query"] .= " AND a.tanggal >= '" . $awal . "' ";

if (!empty($_POST["tanggal_akhir"]))
	$filtering["query"] .= " AND a.tanggal <= '" . $akhir . "' ";

$customer = $_POST["customer"];
if (!empty($_POST["customer"])) {
	$cus = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM mhrelasi WHERE nomor = $customer"));
	$filtering["query"] .= " AND a.nomormhrelasi = '" . $customer . "'";
}

$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|customer"] = $cus["kode"] . ' - ' . $cus['nama'] . "|" . $_POST["customer"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
?>