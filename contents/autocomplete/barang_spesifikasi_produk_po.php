<?php

$acomplete["query"] = "SELECT
												a.*
												FROM
												thspesifikasiproduk a
												WHERE a.status_aktif = 1 and a.status_disetujui = 1
												AND a.nomor <> 0
					";
$acomplete["query_order"] = "a.nomor";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","kode_custom","nama", "harga");
$acomplete["items_visible"] = array("kode_custom", "nama");
$acomplete["items_selected"] = array("kode_custom", "nama");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



