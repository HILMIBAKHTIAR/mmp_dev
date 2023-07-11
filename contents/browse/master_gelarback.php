<?php
$browse["id"] 				= "master_gelar";
$browse["caption"] 			= "Browse Gelar";
$browse["query"] 			= " SELECT a.nama,
 															a.kode
											FROM mhgelar a	
											WHERE a.status_aktif = 1 ? 
											";
$browse["query_order"] 		= "a.nama";
$browse["query_search"] 	= array("a.kode", "a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "kode", "nama");
$browse["items_visible"] 	= array("info");
$browse["items_selected"] 	= array("nama");
$browse["selected_url"] 	= ""; // "?m=master_valuta_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"] 			= ""; // "?m=master_valuta_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["selected_mode"] 	= "off";
$browse["debug"] 			= 1;
