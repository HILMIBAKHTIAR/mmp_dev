<?php
$nomormhrelasi = $_POST["nomormhrelasi"];
if (!empty($_POST["nomormhrelasi"])) {
    $customer = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mhrelasi a  WHERE nomor = $nomormhrelasi"));
    $filtering["query"] .= " AND a.nomormhrelasi = '" . $customer['nomor'] . "' ";
}

$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["start_date"]]      = $_POST[$filter["start_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["end_date"]]        = $_POST[$filter["end_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhrelasi"]    = $customer["nama"] . "|" . $_POST["nomormhrelasi"];
