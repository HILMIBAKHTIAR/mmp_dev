<?php
$acomplete["query"] = "
	SELECT a.*,
	a.nomor AS nomormhsatuan,
	a.nama AS satuan,
	a.keterangan AS keterangan
	FROM mhsatuan a
	WHERE a.status_aktif = 1 ?
	";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array(
	"nomor",
	"nama",
	"keterangan"
);
$acomplete["items_visible"] = array("nama");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
