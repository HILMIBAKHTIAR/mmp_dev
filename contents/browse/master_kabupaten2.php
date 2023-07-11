<?php
$browse["id"] 				= "master_kabupaten2";
$browse["caption"] 			= "Browse Kabuoaten";

$browse["query"] 			= " SELECT a.*,
								a.nama,
								m2.nomor as nomormhprovinsi,
								m2.nama as provinsi
								FROM mhkabupaten a
								join mhkecamatan m on m.nomormhkabupaten = a.nomor 
								join mhprovinsi m2 on m2.nomor = a.nomormhprovinsi 
								WHERE a.status_aktif = 1 
								group by a.nomor ";

// $browse["query"] 			= " SELECT m.*,
// 								m.nama,
// 								m2.nomor as nomormhprovinsi,
// 								m2.nama as provinsi
// 								FROM mhkecamatan a
// 								join mhkabupaten m on m.nomor = a.nomormhkabupaten  
// 								join mhprovinsi m2 on m2.nomor = m.nomormhprovinsi 
// 								WHERE m.status_aktif = 1 ";

$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
// $browse["param_input"] 		= array("m.nomor|nomor");
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama", "nomormhprovinsi||true", "provinsi||true");
$browse["items_visible"]	= array("nama");
$browse["items_selected"]	= array("nama");
$browse["selected_url"] 	= "?m=master_kabupaten&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_kabupaten&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
