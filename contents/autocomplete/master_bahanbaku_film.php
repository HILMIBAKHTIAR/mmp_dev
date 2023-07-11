<?php
$acomplete["query"] = "
SELECT 
	a.*,
	b.tipe as tipe
FROM mhbarang a
JOIN mdbarangtipe b ON b.nomor = a.nomormdbarangtipe
WHERE a.nomormhbarangkategori = 1
	AND a.nomormhbarangkelompok = 1
	
	?
";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array(
	"nomor",
	"nama",
	"tipe",
	"ketebalan",
);
$acomplete["items_visible"] = array("nama");
$acomplete["items_selected"] = array("tipe");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
