<?php
$browse["id"] 				= "master_top_termin";
$browse["caption"] 			= "Browse TOP Termin";
$browse["query"] 			= " SELECT 
								a.*
								FROM mdtoptermin a
								join mhtop m on m.nomor = a.nomormhtop 
								WHERE a.status_aktif = 1 ?
								";

$browse["query_search"] 	= array("a.termin");
$browse["query_order"] 	= "a.termin";
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "termin");
$browse["items_visible"]	= array();
$browse["items_selected"]	= array("termin");
$browse["selected_url"] 	= "?m=master_top_termin&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_top_termin&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
