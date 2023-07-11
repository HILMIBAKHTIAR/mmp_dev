<?php


if ($edit['mode'] == 'edit') {

    $query_custom = "SELECT a.* FROM thpemesanancylinder a WHERE a.nomor = {$nomor}";
    $debug_html .= "mysql_query : " . $query_custom . "<br /><br />";
    $result_custom = mysqli_query($con, $query_custom);
    $r = mysqli_fetch_assoc($result_custom);

    $kode = $r['kode'];
    $kode_custom = $r['kode_custom'];

    // delete string of $kode_custom from left until '/' then add from left $kode
    $kode_custom = substr($kode_custom, strpos($kode_custom, '/') + 1);
    $kode_custom = $kode . '/' . $kode_custom;

    $query_custom = "
    UPDATE thpemesanancylinder
    SET kode_custom = {$kode_custom}
    WHERE nomor = {$nomor}";
    $debug_html .= "mysql_query : " . $query_custom . "<br /><br />";
    $result_custom = mysqli_query($con, $query_custom);
}
