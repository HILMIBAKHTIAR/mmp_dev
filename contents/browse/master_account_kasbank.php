<?php
$browse["id"] = "master_account_kasbank";
$browse["caption"] = "Browse Account";
$query_custom = "";
if($_SESSION["login"]["tipe"] != "admin")
	$query_custom = "
	AND a.nomor IN (
		SELECT a.relasi_nomor
		FROM shaksesmaster a
		WHERE a.status_aktif = 1
		AND a.relasi_table = 'mhaccount'
		AND a.nomormhadmin = ".$_SESSION["login"]["nomor"]."
	) ";
	
$browse["query"] = "
	SELECT a.*
	FROM mhaccount a
	WHERE a.status_aktif = 1
	AND a.detail = 1
	".$query_custom." ?";
$browse["query_order"] = "a.kode";
$browse["query_search"] = array("a.kode","a.nama");
$browse["param_input"] = array();
$browse["param_output"] = array();
$browse["items"] = array("nomor||true","kode|Nomor","nama","kode_inisial|Inisial");
$browse["items_visible"] = array("kode","nama");
$browse["items_selected"] = array("kode","nama");
$browse["selected_url"] = ""; // "?m=master_account_data&f=header_grid&sm=edit&a=view&no=";
$browse["new_url"] = ""; // "?m=master_account_data&f=header_grid&sm=edit";
$browse["autocomplete_url"] = "";
$browse["grid"] = "";
$browse["grid_editing"] = "";
$browse["grid_val"] = "";
$browse["grid_values"] = array();
$browse["call_function"] = "";
$browse["custom_function"] = "";
$browse["debug"] = 1;
?>