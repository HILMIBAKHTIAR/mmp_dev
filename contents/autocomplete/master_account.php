<?php
$acomplete["query"] 			= "
	SELECT
		a.*
	FROM mhaccount a
	WHERE 
	a.status_aktif = 1
	?";
$acomplete["query_order"] 		= " a.nama";
$acomplete["query_search"] 		= array("a.nama");
$acomplete["items"] 			= array("nomor||true", "nama");
$acomplete["items_visible"] 	= array("nama");
$acomplete["items_selected"]	= array("nama");
$acomplete["param_input"] 		= array("b.nomor|nomor");
$acomplete["debug"] 			= 1;
?>