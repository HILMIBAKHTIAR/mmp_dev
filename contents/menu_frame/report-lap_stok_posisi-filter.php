<?php

$cabang = mysqli_fetch_array(mysqli_query($con, "SELECT a.nomor, a.nama FROM mhcabang a WHERE a.nomor = ".$_POST["nomormhcabang"]));
if(empty($cabang["nomor"]))
{
	$_POST["nomormhcabang"] = $_SESSION["cabang"]["nomor"];
	$cabang["return"] = "";
}
else
	$cabang["return"] = $cabang["nama"];

$gudang = mysqli_fetch_array(mysqli_query($con, "SELECT a.nomor,a.kode, a.nama FROM mhgudang a WHERE a.nomor = ".$_POST["nomormhgudang"]));
if(empty($gudang["kode"]))
{
	$_POST["nomormhgudang"] = "0";
	$gudang["return"] = "";
}
else
	$gudang["return"] = $gudang["kode"]." - ".$gudang["nama"];

$barang = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode, a.nama FROM mhbarang a WHERE a.nomor = ".$_POST["nomormhbarang"]));
if(empty($barang["kode"]))
{
	$_POST["nomormhbarang"] = "0";
	$barang["return"] = "";
}
else
	$barang["return"] = $barang["nama"]." - ".$barang["kode"];


$barangkategori = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode,a.nama FROM mhbarangkategori a WHERE a.nomor = ".$_POST["nomormhbarangkategori"]));
if(empty($barangkategori["nama"]))
{
	$_POST["nomormhbarangkategori"] = "0";
	$barangkategori["return"] = "";
}
else
	$barangkategori["return"] = $barangkategori["nama"]." - ".$barangkategori["kode"];

$barangmerk = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode,a.nama FROM mhbarangmerk a WHERE a.nomor = ".$_POST["nomormhbarangmerk"]));
if(empty($barangmerk["nama"]))
{
	$_POST["nomormhbarangmerk"] = "0";
	$barangmerk["return"] = "";
}
else
	$barangmerk["return"] = $barangmerk["nama"]." - ".$barangmerk["kode"];

if(empty($_POST["namamhbarang"])){
	$_POST["namamhbarang"] = '';
}

$akhir = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_akhir"])->format("Y-m-d");

// CALL rp_2_laporan_stok( 2, '2000-01-01', '2023-07-03', 0, '', 0, 1, 0, 0 )
$filtering["query"] = "	CALL rp_2_laporan_stok(
								2,
								'2000-01-01',
								'".$akhir."',
								".$_POST["nomormhbarang"].",
								'".$_POST["namamhbarang"]."',
								0,
								".$_POST["nomormhcabang"].",
								".$_POST["nomormhgudang"].",
								".$_POST["tampilkan_nol"]."
						)";



$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
$_SESSION["menu_".$filtering["session_name"]]["filter_nomormhcabang"] = $_POST["nomormhcabang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhgudang"] = $gudang["return"]."|".$_POST["nomormhgudang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhbarang"] = $barang["return"]."|".$_POST["nomormhbarang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_namamhbarang"] = $_POST["namamhbarang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhbarangkategori"] = $barangkategori["return"]."|".$_POST["nomormhbarangkategori"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhbarangmerk"] = $barangmerk["return"]."|".$_POST["nomormhbarangmerk"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tampilkan_nol"] = $_POST["tampilkan_nol"];
