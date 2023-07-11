<?php
$browse["id"] 				= "master_kabupaten";
$browse["caption"] 			= "Browse Kabupaten";
$browse["query"] 			= " SELECT a.*,
												a.nama, b.nama as provinsi
								FROM mhkabupaten a
								join mhprovinsi b on a.nomormhprovinsi = b.nomor
								WHERE a.status_aktif = 1 ? ";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama", "provinsi");
$browse["items_visible"]	= array("nama", "provinsi");
$browse["items_selected"]	= array("nama", "provinsi");
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
