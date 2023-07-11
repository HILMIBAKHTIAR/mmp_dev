<?php
$acomplete["query"] = "
	SELECT a.*
	FROM status_warna_spare a
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
$acomplete["param_input"] = array();
$acomplete["debug"] = 1;
