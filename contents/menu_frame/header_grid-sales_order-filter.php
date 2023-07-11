<?php
$awal = $_POST["tanggal_awal"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d") : '1000-01-01';
$akhir = $_POST["tanggal_akhir"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d") : '4000-01-01';


$nomormhrelasi = $_POST["nomormhrelasi"];
if (!empty($_POST["nomormhrelasi"])) {
    $customer = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mhrelasi a  WHERE nomor = $nomormhrelasi"));
    $filtering["query"] .= " AND a.nomormhrelasi = '" . $customer['nomor'] . "' ";
}
if (!empty($_POST["tanggal_awal"]))
    $filtering["query"] .= " AND a.tanggal >= '" . $awal . "' ";

if (!empty($_POST["tanggal_akhir"]))
    $filtering["query"] .= " AND a.tanggal <= '" . $akhir . "' ";

$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["start_date"]]      = $_POST[$filter["start_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["end_date"]]        = $_POST[$filter["end_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhrelasi"]    = $customer["nama"] . "|" . $_POST["nomormhrelasi"];
