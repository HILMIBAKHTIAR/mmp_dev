<?php
$acomplete["query"] = "
	SELECT a.*,
	b.jenis as jenis
	FROM mdbarangtipe a
	join mhbarangjenis b on a.nomormhbarangjenis = b.nomor and b.status_aktif = 1
	WHERE a.is_film = 1 and a.status_aktif = 1 ?
	";
$acomplete["query_order"] = "b.jenis, a.tipe ";
$acomplete["query_search"] = array("a.tipe");
$acomplete["items"] = array(
	"nomor",
	"jenis",
	"tipe"
);
$acomplete["items_visible"] = array("jenis","tipe");
$acomplete["items_selected"] = array("jenis","tipe");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
