<?php

$acomplete["query"] = "SELECT a.*
					, b.nama_barang_customer as barang
					, '' as satuan
					, a.jumlahcilinder as qty
					, a.keterangan
					, a.nomor nomorthpemesanancylinder
					, b.nomor nomorthbarang
					, 3 as nomormhsatuanqty
					, 'PCS' as satuan_qty
					, concat(
						a.cylinder_base,
					 	' <br><br>', 'UK.' , a.circum, 'x', a.panjang, 'MM',
						' <br> ', 'Kode Cyl:', a.kode_custom) AS keterangan
					, DATE_FORMAT(a.tanggal_eta,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_eta
					FROM thpemesanancylinder a
					join thbarang b on b.nomor = a.nomorthbarang
					WHERE a.status_po = 1 and a.status_aktif = 1 group by a.nomor  ? 
					";

$acomplete["query_order"] = "b.nama_barang_customer, a.kode_custom";
$acomplete["query_search"] = array("b.nama_barang_customer");
$acomplete["items"] = array("nomor","keterangan", "barang", "satuan_qty", "qty", "nomorthpemesanancylinder", "nomorthbarang", "nomormhsatuanqty", "tanggal_eta");
$acomplete["items_visible"] = array("barang","kode_silinder");
$acomplete["items_selected"] = array("barang", "kode_silinder");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
?>



