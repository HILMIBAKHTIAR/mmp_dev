<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	a.*,
	a.nomor as nomorheadergrid,
	'' as kosong
	FROM
	headergrid a
	where a.nomor in(28, 29, 30, 31, 32, 33, 34, 35, 36, 37)
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"dimention",
	"satuan",
	"min",
	"max",
	"target",
	"kosong",
	"kosong",
	"nomorheadergrid"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>