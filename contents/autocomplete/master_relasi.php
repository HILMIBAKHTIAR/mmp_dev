<?php

$acomplete["query"] = "SELECT a.*
					FROM mhrelasi a
					WHERE a.status_aktif = 1 AND a.nomor <> 0 and a.nomormhrelasikelompok = 2 ?";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","nama","ppn", "top");
$acomplete["items_visible"] = array("nama|Satuan");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array(); 
$acomplete["debug"] = 1;
?>



