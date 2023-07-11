<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	a.*,
	a.nomor as nomorheadergrid,
	'' as kosong
	FROM
	headergrid a
	where a.nomor in (1, 3, 13, 5, 14, 15)
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
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
	"kosong",
	"kosong",
	"nomorheadergrid"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
