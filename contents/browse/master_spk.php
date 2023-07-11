<?php
$browse["id"] 				= "master_spk";
$browse["caption"] 			= "Browse SPK";
$browse["query"] 			= " SELECT 
								a.*
								, m.nama customer
								, m.nomor nomormhrelasi
								FROM thspk a
								join mhrelasi m on m.nomor = a.nomormhrelasi and m.status_aktif > 0
								WHERE a.status_aktif = 1
									
									";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama", "komposisi||true", "customer||true", "nomormhrelasi||true");
$browse["items_visible"]	= array("nama");
$browse["items_selected"]	= array("nama");
$browse["selected_url"] 	= "?m=spk&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=spk&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
