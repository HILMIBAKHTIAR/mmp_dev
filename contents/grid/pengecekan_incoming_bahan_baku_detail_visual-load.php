<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*,
	a.nomor as nomorheadergrid,
	'' as kosong
	FROM
	headergrid a
	where a.nomor in (1,2,3,4,5, 15)
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"defects",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
