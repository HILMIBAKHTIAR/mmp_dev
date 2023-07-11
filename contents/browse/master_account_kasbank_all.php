<?php
$browse["id"] 				= "master_account_kasbank_all";
$browse["caption"] 			= "Browse Account";
$query_custom 				= "";
$browse["query"] 			= "	SELECT a.*, CONCAT('[', a.kode, '] ', a.nama) AS info
								FROM mhaccount a
								WHERE 
									a.status_aktif = 1
									AND a.detail = 1
									AND ( a.kas = 1 OR a.bank = 1 )
									" . $query_custom . "
								?";
$browse["query_order"] 		= "a.kode";
$browse["query_search"] 	= array("a.kode", "a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true","kode|Nomor","nama","inisial|Inisial","info||true");
$browse["items_visible"] 	= array("info");
$browse["items_selected"] 	= array("info");
$browse["selected_url"] 	= "?m=master_account_data&f=header_grid&sm=edit&a=view&no="; // "?m=master_account_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_account_data&f=header_grid&sm=edit"; // "?m=master_account_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
?>