<?php
$acomplete["query"] = "
			SELECT
			b.jenis komposisi
			, c.tipe mikron
			, b.nomor nomormhbarangjenis
			, c.nomor nomormdbarangtipe
			FROM mhbarang a
			join mhbarangjenis b on b.nomor = a.nomormhbarangjenis 
			join mdbarangtipe c on c.nomormhbarangjenis = b.nomor 
			WHERE a.nomormhbarangkategori = 1
			AND a.nomormhbarangkelompok = 1
			group by a.nomor 
		
	?";
$acomplete["query_order"] = "b.jenis";
$acomplete["query_search"] = array("b.jenis");
$acomplete["items"] = array(
	"komposisi",
	"mikron",
	"nomormhbarangjenis",
	"nomormdbarangtipe"
);
$acomplete["items_visible"] = array("b.jenis");
$acomplete["items_selected"] = array("b.jenis");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
