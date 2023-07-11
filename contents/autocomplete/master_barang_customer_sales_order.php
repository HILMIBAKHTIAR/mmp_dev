<?php

$acomplete["query"] = "SELECT a.*, a.kode_custom as kode, b.harga as harga, a.kode_barang_customer as po_customer
					FROM thbarang a
					JOIN tdpenawaranharga b ON b.nomor = a.nomortdpenawaranharga
					WHERE a.status_aktif = 1 AND a.nomor<>0
					";
$acomplete["query_order"] = "a.nomor";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","nama_barang_customer", "harga", "po_customer");
$acomplete["items_visible"] = array("nama_barang_customer");
$acomplete["items_selected"] = array("nama_barang_customer");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



