<?php
$browse["id"] 				= "master_kategoricustomer";
$browse["caption"] 			= "Browse Kategori Customer";
$browse["query"] 			= " SELECT a.*,
												a.nama
								FROM mhrelasikategori a
								WHERE a.status_aktif = 1
								AND a.nomormhrelasikelompok = 1
								";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$browse["param_input"] 		= array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama");
$browse["items_visible"]	= array("nama");
$browse["items_selected"]	= array("nama");
$browse["selected_url"] 	= "?m=master_kategori_customer&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_kategori_customer&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
