<?php
// $_POST["total_idr"] = $_POST["total"];

// if($_POST["jenis"] == "1")
// {
// 	$account = mysql_fetch_array(mysql_query("
// 		SELECT IFNULL(nomormhaccountawal,0) AS tujuan
// 		FROM mhaccountsetting
// 		WHERE status_aktif = 1
// 		AND kode = 'Auto: BELI_NOTA'
// 		LIMIT 0,1
// 	"));
// 	$_POST["nomormhaccounttujuan"] = $account["tujuan"];
// }
// $edit["string_code_plus"]["otf"] = "";
// if(!empty($_POST["account_kode"]))
// 	$edit["string_code_plus"]["otf"] .= $_POST["account_kode"];
if($_POST["metode"] == "Kas")
	$edit["string_code_plus"]["otf"] .="BKK";
if($_POST["metode"] == "Bank")
	$edit["string_code_plus"]["otf"] .="BBK";
if($_POST["metode"] == "Giro")
	$edit["string_code_plus"]["otf"] .="BGK";
?>