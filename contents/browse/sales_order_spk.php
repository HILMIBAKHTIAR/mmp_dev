<?php
$browse["id"] 				= "sales_order_spk";
$browse["caption"] 			= "Browse Sales Order";
$browse["query"] 			= " SELECT 
											a.*,
											a.quantity as qty_sliting,
											b.kode as kode_po,
											b1.nama as customer,
											c.nama_barang_customer as nama_barang,
											c.komposisi,
											c.ukuran_barang_jadi,
											c.kode_custom,
											c.nomor as brg_id,
											c.nomor_md as no_md,
											c.nomor_md as no_md_printing,
											c1.nama as satuanproduk,
											c.total as total_micron,
											c.eye_mark,
											c.sisi_cetak,
											c.arah_baca,
											c.arah_baca as arah_baca_sliting,
											c.eye_mark eye_mark_sliting,
											c.tahapan_proses as proses_spk,
											concat(c.width,' x ', c.height,' x ',c.produksi,'m') as ukuran_sliting,
											c.up_cilinder as baris
											FROM tdjualorder a
											join thjualorder b on a.nomorthjualorder = b.nomor and b.status_aktif = 1
											join mhrelasi b1 on b.nomormhrelasi = b1.nomor and b1.status_aktif = 1
											join thbarang c on a.nomorthbarang =  c.nomor and c.status_aktif = 1
											join mhsatuan c1 on c.nomormhsatuanpo = c1.nomor and c1.status_aktif = 1
											WHERE a.status_aktif = 1 and b.status_disetujui = 1
								?";
$browse["query_order"] 		= " a.produk, b.kode";
$browse["query_search"] 	= array("a.produk");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array(
	"nomor||true", "kode_po", "quantity", "produk", "customer", "nama_barang",
	"komposisi", "ukuran_barang_jadi", "kode_custom", "brg_id", "no_md",
	"satuanproduk", "total_micron", "no_md_printing", "eye_mark", "sisi_cetak", "arah_baca",
	"ukuran_sliting", "arah_baca_sliting", "eye_mark_sliting", "qty_sliting", "proses_spk", "baris"
);
$browse["items_visible"]	= array("kode_po", "produk");
$browse["items_selected"]	= array("kode_po", "produk");
$browse["selected_url"] 	= "?m=sales_order&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=sales_order&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
