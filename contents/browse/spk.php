<?php
$browse["id"] 				= "spk";
$browse["caption"] 			= "Browse TOP";
$browse["query"] 			= " SELECT 
								a.*
								FROM thspkmmp a
									";
$browse["query_order"] 		= " a.kode desc";
$browse["query_search"] 	= array("a.kode");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "kode", "nama");
$browse["items_visible"]	= array("kode", "nama");
$browse["items_selected"]	= array("kode");
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
