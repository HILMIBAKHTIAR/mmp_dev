<?php

$acomplete["query"] = "SELECT a.*,
					concat(a.kode,' - ',a.nama) AS barang,
					m.nama as satuan,
					m.nomor as nomormhsatuanqty,
					m2.nama as area,
					m2.nomor as nomormhlokasi
					FROM mhbarang a
					left join mhsatuan m on m.nomor = a.nomormhsatuan 
					left join mhlokasi m2 on m2.nomor = a.nomormhlokasi
					WHERE a.nomormhbarangkelompok = 2 and a.status_aktif = 1 ?
					";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array("nomor","nama", "barang", "satuan", "berat_jenis", "nomormhsatuan", "nomormhsatuanqty", "area", "nomormhlokasi");
$acomplete["items_visible"] = array("kode","nama");
$acomplete["items_selected"] = array("barang");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



