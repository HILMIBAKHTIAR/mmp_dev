<?php
$acomplete["query"] 			= "
	SELECT
		a.*
	FROM mhaccountdetail a
	JOIN mhaccount b ON b.nomor = a.nomormhaccount AND b.status_aktif > 0
	WHERE 
	a.status_aktif = 1
	?";
$acomplete["query_order"] 		= " a.nama";
$acomplete["query_search"] 		= array("a.nama");
$acomplete["items"] 			= array("nomor", "nama");
$acomplete["items_visible"] 	= array("nama");
$acomplete["items_selected"]	= array("nama");
$acomplete["param_input"] 		= array("b.nomor|nomor");
$acomplete["debug"] 			= 1;
?>