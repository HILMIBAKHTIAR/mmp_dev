<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*, a.warna as unit_cylinder,
	'' as kosong
	FROM
	tdbarangcustomerwarna a
	where 1=1 and a.nomorthbarang = " . $_GET['no'] . " and a.status_aktif = 1
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "a.nomor";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"unit_cylinder",
	"kosong",
	"kosong",
	"kosong"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
