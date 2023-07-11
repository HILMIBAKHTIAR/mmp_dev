<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*
	, '' as kosong
	, a.nomor headergrid
	FROM
	headergrid a
	where a.nomor in(59, 60, 61)
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"spesifikasi",
	"kosong",
	"standart",
	"kosong",
	"kosong",
	"headergrid",
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
