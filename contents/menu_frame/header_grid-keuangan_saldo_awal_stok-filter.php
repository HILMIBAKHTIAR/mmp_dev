<?php
$awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_awal"])->format("Y-m-d");
if(!empty($_POST["tanggal_awal"]))
    $filtering["query"] .= " AND a.tanggal >= '".$awal."' ";

$akhir = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_akhir"])->format("Y-m-d");
if(!empty($_POST["tanggal_akhir"]))
    $filtering["query"] .= " AND a.tanggal <= '".$akhir."' ";

$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_awal"] = $_POST["tanggal_awal"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];

?>