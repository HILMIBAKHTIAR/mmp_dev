<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*
	, '' as kosong
	FROM
	headergrid a
	where a.nomor in(44, 45, 46, 47, 48, 49, 50, 51, 52, 53)
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"persiapan",
	"kosong",
	"jenis_waste",
	"kosong"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
