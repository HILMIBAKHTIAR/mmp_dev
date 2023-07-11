<?php
$awal = $_POST["tanggal_awal"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_awal"])->format("Y-m-d") : '1000-01-01';
$akhir = $_POST["tanggal_akhir"] != '0000-00-00' ? DateTime::createFromFormat($_SESSION["setting"]["date"], $_POST["tanggal_akhir"])->format("Y-m-d") : '4000-01-01';


$nomortdjualorder = $_POST["nomortdjualorder"];
if (!empty($_POST["nomortdjualorder"])) {
    $po = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM tdjualorder a  WHERE nomor = $nomortdjualorder"));
    $filtering["query"] .= " AND a.nomortdjualorder = '" . $po['nomor'] . "' ";
}
if (!empty($_POST["tanggal_awal"]))
    $filtering["query"] .= " AND a.tanggalterbit >= '" . $awal . "' ";

if (!empty($_POST["tanggal_akhir"]))
    $filtering["query"] .= " AND a.tanggalterbit <= '" . $akhir . "' ";

$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["start_date"]]      = $_POST[$filter["start_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["end_date"]]        = $_POST[$filter["end_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomortdjualorder"]    = $po["nama"] . "|" . $_POST["nomortdjualorder"];
