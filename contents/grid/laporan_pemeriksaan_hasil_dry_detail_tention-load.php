<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	a.*,
	a.nomor as nomorheadergrid,
	'' as kosong
	FROM
	headergrid a
	where a.nomor in(17, 18, 19, 20, 21, 22, 23, 24)
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"tention",
	"kosong",
	"kosong",
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
