<?php

$awal = $_POST["tanggal_awal"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d") : '1000-01-01';
$akhir = $_POST["tanggal_akhir"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d") : '4000-01-01';

if (!empty($_POST["tanggal_awal"]) && empty($_POST["relasinomor"]))
	$filtering["query"] .= " AND a.tanggal >= '" . $awal . "' ";

if (!empty($_POST["tanggal_akhir"]) && empty($_POST["relasinomor"]))
	$filtering["query"] .= " AND a.tanggal <= '" . $akhir . "' ";

$relasinomor = $_POST["relasinomor"];
if (!empty($_POST["relasinomor"])) {
	$supp = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM mhrelasi WHERE nomor = $relasinomor"));
	$filtering["query"] .= " AND a.relasinomor = '" . $relasinomor . "' GROUP BY a.nomor";
}

$_SESSION["menu_".$filtering["session_name"]]["filter_browse|relasinomor"] = $supp["kode"]. ' - '. $supp['nama'] ."|".$_POST["relasinomor"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
?>