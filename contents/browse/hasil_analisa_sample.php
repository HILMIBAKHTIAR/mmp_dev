<?php
$browse["id"] 				= "hasil_analisa_sample";
$browse["caption"] 			= "Browse Hasil Analisa Sampel";
$browse["query"] 			= " SELECT
													a.*,
													b1.kode AS kodepas,
													b1.customer_analisa AS customer,
													b.produk AS produk,
													c.nama AS jenispackaging,
													(SELECT
													GROUP_CONCAT(
														DISTINCT CONCAT(
														d.struktur_packaging
														) SEPARATOR ' / '
													)
													FROM
													tdhasilanalisasample_strukturpackaging d
													WHERE d.nomorthhasilanalisasample = a.nomor
													AND d.status_aktif > 0
													ORDER BY d.nomor ASC) AS struktur_packaging
													FROM
													thhasilanalisasample a
													JOIN tdpermintaananalisasample b
													ON a.nomortdpermintaananalisasample = b.nomor
													JOIN thpermintaananalisasample b1
													ON b.nomorthpermintaananalisasample = b1.nomor
													JOIN mhjenispackaging c
													ON a.nomormhjenispackaging = c.nomor
													WHERE a.status_aktif = 1 and a.status_disetujui = 1
? ";
$browse["query_order"] 		= " a.nomor DESC";
$browse["query_search"] 	= array("a.kode");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "kode", "kodepas", "produk", "width", "pitch", "length", "printing", "customer", "total_thickness", "sum_mikron_1","sum_mikron_2", "jenispackaging", "tahapan_proses", "struktur_packaging", "nomormhjenispackaging||true");
$browse["items_visible"]	= array("kodepas", "produk");
$browse["items_selected"]	= array("kodepas", "produk");
$browse["selected_url"] 	= "?m=hasil_analisa_sample&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=hasil_analisa_sample&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
