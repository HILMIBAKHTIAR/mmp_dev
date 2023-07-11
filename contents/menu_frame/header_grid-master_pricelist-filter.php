<?php

// $tipe = mysqli_fetch_array(mysqli_query($con," SELECT
//                                                                                 a.*,
//                                                                                 a.`tipe`,
//                                                                                 b1.nama
//                                                                                 FROM
//                                                                                 mdbarangtipe a
//                                                                                 JOIN mdsuppliersupply b
//                                                                                 ON a.nomor = b.`nomor`
//                                                                                 JOIN mhrelasi b1
//                                                                                 ON b.`nomormhrelasi` = b1.`nomor` WHERE a.nomor = ".$_POST["nomormdbarangtipe"])
//                                                                                 );
// if(empty($tipe["tipe"])) {
// 	$_POST["nomormdbarangtipe"]    = "%";
// 	$tipe["return"]          = "";
// }

$nomormdsuppliersupply = $_POST["nomormdsuppliersupply"];
if (!empty($_POST["nomormdsuppliersupply"])) {
    $tipe = mysqli_fetch_array(mysqli_query($con, "SELECT a.* FROM mdbarangtipe a  WHERE nomor = $nomormdsuppliersupply"));
    $filtering["query"] .= " AND a.supply = '" . $tipe['tipe'] . "' ";
}

    $_SESSION["menu_".$filtering["session_name"]]["filter_browse|nomormdsuppliersupply"]    = $tipe["tipe"]."|".$_POST["nomormdsuppliersupply"];
?>