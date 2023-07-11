

<?php

$filter["start_date"]   = $_SESSION["setting"]["filter_start_date"];
$filter["end_date"]     = $_SESSION["setting"]["filter_end_date"];




$awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST[$filter["start_date"]])->format("Y-m-d");
if(!empty($_POST[$filter["start_date"]]))
    $filtering["query"] .= " AND a.tanggal >= '".$awal."' ";

$akhir= DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST[$filter["end_date"]])->format("Y-m-d");
if(!empty($_POST[$_SESSION["setting"]["filter_end_date"]]))
    $filtering["query"] .= " AND a.tanggal <= '".$akhir."' ";

$relasihutang = mysqli_fetch_array(mysqli_query($con, "SELECT CONCAT('[', a.kode, '] ', a.nama)  AS info, a.kode FROM mhdepartemen a WHERE nomor = " . $_POST["nomormhdepartemen"]));
if (!empty($_POST["nomormhdepartemen"])) {
    $filtering["query"] .= " AND a.nomormhdepartemen = " . $_POST["nomormhdepartemen"] . " ";
}

$_SESSION["menu_" . $filtering["session_name"]]["filter_browse|nomormhdepartemen"]    = $relasihutang["info"] . "|" . $_POST["nomormhdepartemen"];
$_SESSION["menu_".$filtering["session_name"]]["filter_".$filter["start_date"]]      = $_POST[$filter["start_date"]];
$_SESSION["menu_".$filtering["session_name"]]["filter_".$filter["end_date"]]        = $_POST[$filter["end_date"]];
?>