<?php
$cabang = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode, a.nama FROM mhcabang a WHERE a.nomor = ".$_POST["nomormhcabang"]));
if(empty($cabang["kode"]))
{
	$_POST["nomormhcabang"] = 0;
	$cabang["return"] = "";
}
else
    $cabang["return"] = $cabang["kode"]." - ".$cabang["nama"];

$supplier = mysqli_fetch_array(mysqli_query($con, "SELECT a.kode, a.nama FROM mhrelasi a WHERE a.nomor = ".$_POST["nomormhsupplier"]));
if(empty($supplier["kode"]))
{
    $_POST["nomormhsupplier"] = 0;
    $supplier["return"] = "";
}
else
    $supplier["return"] = $supplier["kode"]." - ".$supplier["nama"];

// $awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_awal"])->format("Y-m-d");
$akhir = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_akhir"])->format("Y-m-d");

$filtering["query"] = "	CALL rp_hutang(
								2,
                                '0000-00-00',
                                '".$akhir."',
								".$_POST["nomormhcabang"].",
                                ".$_POST["nomormhsupplier"].",
                                1,
                                0
							)";

$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhcabang"] =  $cabang["return"]."|".$_POST["nomormhcabang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhsupplier"] = $supplier["return"]."|".$_POST["nomormhsupplier"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
?>