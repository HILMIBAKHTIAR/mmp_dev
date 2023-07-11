<?php
$browse["id"] 				= "master_jenis_film";
$browse["caption"] 			= "Browse jenis film";
$browse["query"] 			= " SELECT a.*
								FROM mhbarangjenis a
								WHERE a.status_aktif = 1";
$browse["query_order"] 		= " a.jenis";
$browse["query_search"] 	= array("a.jenis");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "jenis");
$browse["items_visible"]	= array("jenis");
$browse["items_selected"]	= array("jenis");
$browse["selected_url"] 	= "?m=master_jenis_film&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_jenis_film&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
