<?php
$filter["start_date"]   = $_SESSION["setting"]["filter_start_date"];
$filter["end_date"]     = $_SESSION["setting"]["filter_end_date"];

$awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST[$filter["start_date"]])->format("Y-m-d");
$akhir= DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST[$filter["end_date"]])->format("Y-m-d");

$cabang = mysqli_fetch_array(mysqli_query($con,"SELECT a.kode, a.nama FROM mhcabang a WHERE a.nomor = ".$_POST["nomormhcabang"]));
if(empty($cabang["kode"]))
{
	$_POST["nomormhcabang"]    = "%";
	$cabang["return"]          = "";
}
else
    $cabang["return"] = $cabang["kode"]." - ".$cabang["nama"];

$relasihutang = mysqli_fetch_array(mysqli_query($con,"SELECT CONCAT('[', a.kode, '] ', a.nama)  AS info, a.kode FROM mhrelasi a WHERE nomor = ".$_POST["nomormhrelasi"]));
if(empty($relasihutang["info"]))
{
    $_POST["nomormhrelasi"]     = "%";
    $relasihutang["info"]       = "";
}

$filtering["query"] = "	CALL rp_hutang(
                                '".$awal."',
                                '".$akhir."',
								'".$_POST["nomormhcabang"]."',
                                '".$_POST["nomormhrelasi"]."',
                                0,
                                0,
                                '".$_POST["view"]."',
                                'BELI_NOTA',
                                1
							)";

$_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormhrelasi"]    = $relasihutang["info"]."|".$_POST["nomormhrelasi"];
$_SESSION["menu_".$filtering["session_name"]]["filter_".$filter["start_date"]]  = $_POST[$filter["start_date"]];
$_SESSION["menu_".$filtering["session_name"]]["filter_".$filter["end_date"]]    = $_POST[$filter["end_date"]];
$_SESSION["menu_".$filtering["session_name"]]["filter_nomormhcabang"]           = $_POST["nomormhcabang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_view"]                    = $_POST["view"];
?>