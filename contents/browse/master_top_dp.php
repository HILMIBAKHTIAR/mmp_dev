<?php
$browse["id"] 				= "master_top_dp";
$browse["caption"] 			= "Browse DP";


$browse["query"] 			= " SELECT a.*
								from mdtopdp a
								WHERE a.status_aktif = 1 ?
								";

$browse["query_order"] 		= "a.dp";
$browse["query_search"] 	= array("a.dp");
$browse["param_input"] 		= array("");
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "dp", "nomorthtop||true");
$browse["items_visible"]	= array("dp");
$browse["items_selected"]	= array("dp");
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
