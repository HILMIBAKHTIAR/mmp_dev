<?php
$browse["id"] 				= "spk";
$browse["caption"] 			= "Browse TOP";
$browse["query"] 			= " SELECT 
								a.*
								FROM thspk a
								left join tdspk t on t.nomorthspk = a.nomor 
								left join mhproses m on m.nomor = t.nomormhproses 
								WHERE a.status_aktif = 1 and m.nama LIKE '%SLITTING'
								group by a.nomor 
									
									";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama");
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
