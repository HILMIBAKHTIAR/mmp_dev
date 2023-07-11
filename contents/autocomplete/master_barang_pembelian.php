<?php

$acomplete["query"] = "SELECT a.*,
					concat(a.kode,' - ',a.nama) AS barang,
					m.nama as satuan
					FROM mhbarang a
					join mhsatuan m on m.nomor = a.nomormhsatuanqtypurchasing 
					WHERE a.status_aktif = 1 AND a.nomor<>0?
					";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","nama", "barang", "satuan", "berat_jenis", "nomormhsatuanqtypurchasing", "nomormhsatuanberatpurchasing");
$acomplete["items_visible"] = array("kode","nama");
$acomplete["items_selected"] = array("barang");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



