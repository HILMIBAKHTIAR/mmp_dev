<?php
$account = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode, a.nama FROM mhaccount a WHERE a.nomor = ".$_POST["nomormhaccount"]));
if(empty($account["kode"]))
{
	$_POST["nomormhaccount"] = "%";
	$account["return"] = "";
}
else
	$account["return"] = $account["kode"]." - ".$account["nama"];

$tanggal_awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_awal"])->format("Y-m-d");
$tanggal_akhir = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_akhir"])->format("Y-m-d");

$filtering["query"] = "	CALL rp_lap_akuntansi_kas(
							1,
							".$_SESSION["cabang"]["nomor"].",
							'".$tanggal_awal."',
							'".$tanggal_akhir."',
							".$_POST["kasbank"].",
							'".$_POST["nomormhaccount"]."',
							'%'
						)";

$_SESSION["menu_".$filtering["session_name"]]["filter_kasbank"] = $_POST["kasbank"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhaccount"] = $account["return"]."|".$_POST["nomormhaccount"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
