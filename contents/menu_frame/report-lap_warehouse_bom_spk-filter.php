<?php

// bahan baku
$bahan_baku = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode, a.nama FROM mhbarang a WHERE a.nomor = " . $_POST["nomormhbarang"]));
if (empty($bahan_baku["kode"])) {
	$_POST["nomormhbarang"] = "0";
	$bahan_baku["return"] = "";
} else
	$bahan_baku["return"] = $bahan_baku["nama"] . " - " . $bahan_baku["kode"];


//barang kategori
$barangkategori = mysqli_fetch_array(mysqli_query($con, "SELECT a.nama FROM mhbarangkategori a WHERE a.nomor = " . $_POST["nomormhbarangkategori"]));
if (empty($barangkategori["nama"])) {
	$_POST["nomormhbarangkategori"] = "0";
	$barangkategori["return"] = "";
} else
	$barangkategori["return"] = $barangkategori["nama"];

//barang customer
$barangcustomer = mysqli_fetch_array(mysqli_query($con, "SELECT a.nama_barang_customer as nama FROM thbarang a WHERE a.nomor = " . $_POST["nomorthbarang"]));
if (empty($barangcustomer["nama"])) {
	$_POST["nomorthbarang"] = "0";
	$barangcustomer["return"] = "";
} else
	$barangcustomer["return"] = $barangcustomer["nama"];

$awal = DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d");
$akhir = DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d");

// CALL rp_2_laporan_stok( 2, '2000-01-01', '2023-07-03', 0, '', 0, 1, 0, 0 )
$filtering["query"] = "	CALL rp_lap_warehouse_bom_spk(
								'" . $awal . "',
								'" . $akhir . "',
								" . $_POST["nomormhbarang"] . ",
								" . $_POST["nomormhbarangkategori"] . ",
								" . $_POST["nomorthbarang"] . "
						)";



$_SESSION["menu_" . $filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhbarang"] = $bahan_baku["return"] . "|" . $_POST["nomormhbarang"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhbarangkategori"] = $barangkategori["return"] . "|" . $_POST["nomormhbarangkategori"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomorthbarang"] = $barangcustomer["return"] . "|" . $_POST["nomorthbarang"];
