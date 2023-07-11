<?php
$browse["id"] 				= "master_pegawai";
$browse["caption"] 			= "Browse Pegawai";
$browse["query"] 			= " SELECT 
								a.nomor,
								CONCAT(a.nama, ' | ', b.nama) as nama
								FROM mhpegawai a
								JOIN mhdepartemen b ON b.nomor = a.nomormhdepartemen AND b.status_aktif = 1
								WHERE a.status_aktif = 1 AND b.nomor = 6
									";
$browse["query_order"] 		= " a.nama";
$browse["query_search"] 	= array("a.nama");
$acomplete["param_input"] = array();
$browse["param_output"] 	= array();
$browse["items"] 			= array("nomor||true", "nama");
$browse["items_visible"]	= array("nama");
$browse["items_selected"]	= array("nama");
$browse["selected_url"] 	= "?m=master_pegawai&f=header_grid&&sm=edit&a=view&no=";
$browse["new_url"] 			= "?m=master_pegawai&f=header_grid&&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] 			= "";
$browse["grid_editing"] 	= "";
$browse["grid_val"] 		= "";
$browse["grid_values"] 		= array();
$browse["call_function"] 	= "";
$browse["custom_function"] 	= "";
$browse["debug"] 			= 1;
$browse["multiselect"] 		= 0;
