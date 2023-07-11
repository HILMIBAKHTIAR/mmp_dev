<?php


$nomormhjenispackaging = $_POST["nomormhjenispackaging"];
if (!empty($_POST["nomormhjenispackaging"])) {
    $jenispackaging = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mhjenispackaging a  WHERE nomor = $nomormhjenispackaging"));
    $filtering["query"] .= " AND a.nomormhjenispackaging = '" . $jenispackaging['nomor'] . "' ";
}

$nomormhpegawai_sales = $_POST["nomormhpegawai_sales"];
if (!empty($_POST["nomormhpegawai_sales"])) {
    $sales = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mhpegawai a  WHERE nomor = $nomormhpegawai_sales"));
    $filtering["query"] .= " AND a.nomormhpegawai_sales = '" . $sales['nomor'] . "' ";
}

$nomortdpermintaananalisasample = $_POST["nomortdpermintaananalisasample"];
if (!empty($_POST["nomortdpermintaananalisasample"])) {
    $permintaan = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM tdpermintaananalisasample a WHERE nomor = $nomortdpermintaananalisasample"));
    $filtering["query"] .= " AND a.nomortdpermintaananalisasample = '" . $permintaan['nomor'] . "' ";
}

$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|tdpermintaananalisasample"]    = $permintaan["nama"] . "|" . $_POST["tdpermintaananalisasample"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhjenispackaging"]    = $jenispackaging["nama"] . "|" . $_POST["nomormhjenispackaging"];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhpegawai_sales"]    = $sales["nama"] . "|" . $_POST["nomormhpegawai_sales"];
