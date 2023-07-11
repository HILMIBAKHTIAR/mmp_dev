<?php
$nomormhrelasikategori = $_POST["nomormhrelasikategori"];
if (!empty($_POST["nomormhrelasikategori"])) {
    $kategori = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mhrelasikategori a  WHERE nomor = $nomormhrelasikategori"));
    $filtering["query"] .= " AND a.nomormhrelasikategori = '" . $kategori['nomor'] . "' ";
}

// $_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["start_date"]]      = $_POST[$filter["start_date"]];
// $_SESSION["menu_" . $filtering["session_name"]]["filter_" . $filter["end_date"]]        = $_POST[$filter["end_date"]];
$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhrelasikategori"]    = $kategori["nama"] . "|" . $_POST["nomormhrelasikategori"];
