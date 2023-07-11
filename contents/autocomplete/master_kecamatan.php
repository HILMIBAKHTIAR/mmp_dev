<?php
$acomplete["query"] = "
	SELECT a.*,
	a.nomor AS nomormhkecamatan,
	a.nama AS kecamatan
	FROM mhkecamatan a
	WHERE a.status_aktif = 1 ?
	";
$acomplete["query_order"] = "a.nama";
$acomplete["query_search"] = array("a.nama");
$acomplete["items"] = array(
	"nomor",
	"nama"
);
$acomplete["items_visible"] = array("nama");
$acomplete["items_selected"] = array("nama");
$acomplete["param_input"] = array(
	"a.nomormhkabupaten|nomormhkabupaten",
);
$acomplete["debug"] = 1;
