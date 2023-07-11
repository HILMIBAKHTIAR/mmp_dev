<?php

$acomplete["query"] = "SELECT a.*
					FROM mhbarang a
					WHERE a.status_aktif = 1 AND a.nomor<>0";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nomor","a.nama");
$acomplete["items"] = array("nomor","nama");
$acomplete["items_visible"] = array("kode|Satuan");
$acomplete["items_selected"] = array("kode");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



