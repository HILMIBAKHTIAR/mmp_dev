<?php

$acomplete["query"] = "SELECT a.*
					FROM mhbarangkategori a
					WHERE a.status_aktif = 1 AND a.nomor<>0
					";
$acomplete["query_order"] = "a.nomor";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor||true","nama");
$acomplete["items_visible"] = array("nama");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



