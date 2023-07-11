<?php
$awal = $_POST["tanggal_awal"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d") : '1000-01-01';
$akhir = $_POST["tanggal_akhir"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d") : '4000-01-01';

if (!empty($_POST["tanggal_awal"]))
	$filtering["query"] .= " AND a.tanggal >= '" . $awal . "' ";

if (!empty($_POST["tanggal_akhir"]))
	$filtering["query"] .= " AND a.tanggal <= '" . $akhir . "' ";

$supplier = $_POST["supplier"];
if (!empty($_POST["supplier"])) {
	$sup = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM mhrelasi WHERE nomor = $supplier"));
	$filtering["query"] .= " AND a.nomormhrelasi = '" . $supplier . "' GROUP BY a.nomor";
}

$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|relasinomor"] = $sup["kode"] . ' - ' . $sup['nama'] . "|" . $_POST["relasinomor"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
?>