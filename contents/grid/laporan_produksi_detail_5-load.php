<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*
	, a.solvent pemakaian
	, '' as kosong
	, a.nomor headergrid
	FROM
	headergrid a
	where a.nomor in(54, 55, 56, 57, 58)
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"pemakaian",
	"kosong",
	"headergrid",
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
