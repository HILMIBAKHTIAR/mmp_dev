<?php

$acomplete["query"] = "SELECT 
						a.*,
						c.kode as kode_permintaan,
						d.nama as satuan_permintaan,
						c.qty,
						b.kode as kode_barang,
						b.nama as nama_barang
						from 
						tdbelipermintaan a
						left join mhbarang b on b.nomor = a.nomormhbarang 
						left join thbelipermintaan c on c.nomor = a.nomorthbelipermintaan  
						left join mhsatuan d on d.nomor = a.nomormhsatuan 
					WHERE a.status_aktif = 1 AND a.nomor<>0
					";
$acomplete["query_order"] = "a.nomor";
$acomplete["query_search"] = array("a.nomor", "b.kode");
$acomplete["items"] = array("nomor","kode_permintaan", "kode_barang", "nama_barang", "qty", "satuan_permintaan");
$acomplete["items_visible"] = array("kode_permintaan|Satuan");
$acomplete["items_selected"] = array("kode_permintaan");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



