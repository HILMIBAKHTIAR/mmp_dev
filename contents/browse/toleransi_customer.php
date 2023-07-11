<?php
$browse["id"] 				= "toleransi_customer";
$browse["caption"] 			= "Browse Toletansi";
$browse["query"] 			= " SELECT a.*
								FROM mhrelasi a
								WHERE a.status_aktif = 1
								AND a.nomormhrelasikelompok = 1 ?
								";
$browse["query_order"] 		= " a.toleransi_pengiriman";
$browse["query_search"] 	= array("a.toleransi_pengiriman");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "toleransi_pengiriman");
$browse["items_visible"]	= array("toleransi_pengiriman");
$browse["items_selected"]	= array("toleransi_pengiriman");
$browse["selected_url"] 	= "?m=master_customer&f=header_grid&&sm=edit&a=view&no="; //
$browse["new_url"] 			= "?m=master_customer&f=header_grid&&sm=edit"; //
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
