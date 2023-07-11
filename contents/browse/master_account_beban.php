<?php // watched
$browse["id"] = "master_account_beban";
$browse["caption"] = "Browse Account Beban";
$browse["query"] = "SELECT a.*
					FROM mhaccount a
					WHERE a.nomor in(154, 184) and a.status_aktif = 1 ?";
$browse["query_order"] = "a.kode";
$browse["query_search"] = array("a.kode","a.nama");
$browse["param_input"] = array();
$browse["param_output"] = array();
$browse["items"] = array("nomor||true","kode|kode","nama");
$browse["items_visible"] = array("kode","nama");
$browse["items_selected"] = array("kode","nama");
$browse["selected_url"] = "?m=master_account_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"] = "?m=master_account_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] = "";
$browse["grid_editing"] = "";
$browse["grid_val"] = "";
$browse["grid_values"] = array();
$browse["call_function"] = "";
$browse["custom_function"] = "";
$browse["debug"] = 1;
?>