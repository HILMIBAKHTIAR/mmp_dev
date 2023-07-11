

<?php

$filter["start_date"]   = $_SESSION["setting"]["filter_start_date"];
$filter["end_date"]     = $_SESSION["setting"]["filter_end_date"];


$nomorthbarang = $_POST["nomorthbarang"];
if (!empty($_POST["nomorthbarang"])) {
    $barangcustomer = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM thbarang a  WHERE nomor = $nomorthbarang"));
    $filtering["query"] .= " AND a.nomorthbarang = '" . $barangcustomer['nomor'] . "' ";
}

$nomorthspkmmp = $_POST["nomorthspkmmp"];
if (!empty($_POST["nomorthspkmmp"])) {
    $spk = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM thspkmmp a  WHERE nomor = $nomorthspkmmp"));
    $filtering["query"] .= " AND a.nomorthspkmmp = '" . $spk['nomor'] . "' ";
}

$awal = DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST[$filter["start_date"]])->format("Y-m-d");
if (!empty($_POST[$filter["start_date"]]))
    $filtering["query"] .= " AND a.tanggal >= '" . $awal . "' ";

$akhir = DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST[$filter["end_date"]])->format("Y-m-d");
if (!empty($_POST[$_SESSION["setting"]["filter_end_date"]]))
    $filtering["query"] .= " AND a.tanggal <= '" . $akhir . "' ";


$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["start_date"]]      = $_POST[$filter["start_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["end_date"]]        = $_POST[$filter["end_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomorthbarang"]    = $barangcustomer["nama_barang_customer"] . "|" . $_POST["nomorthbarang"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomorthspkmmp"]    = $spk["kode"] . "|" . $_POST["nomorthspkmmp"];
?>