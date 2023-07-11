<?php
// $akhir = DateTime::createFromFormat($_SESSION["setting"]["date"],$_POST["tanggal_akhir"])->format("Y-m-d");
if(!empty($_POST["tanggal_akhir"]))
    $filtering["query"] .= " AND a.tanggal <= '".$_POST["tanggal_akhir"]."' ";

if(!empty($_POST["nomormhcabang"]))
    $filtering["query"] .= " AND a.nomormhcabang LIKE '".$_POST["nomormhcabang"]."' ";

if(!empty($_POST["nomormhcabang"]))
    $filtering["query"] .= " AND a.nomormhaccountaset LIKE '".$_POST["nomormhaccount"]."' ";

$_SESSION["menu_".$filtering["session_name"]]["filter_nomormhcabang"] = $_POST["nomormhcabang"];
$_SESSION["menu_".$filtering["session_name"]]["filter_tanggal_akhir"] = $_POST["tanggal_akhir"];
$_SESSION["menu_".$filtering["session_name"]]["filter_nomormhaccount"] = $_POST["nomormhaccount"];
?>