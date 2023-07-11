<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*
	FROM
	tdhasilanalisasample_komposisiproses a
	where 1=1 and a.nomorthhasilanalisasample = " . $_GET['no'] . " and a.status_aktif = 1 and a.grid_ke = 3
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "a.nomor";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"proses",
	"nomormhproses"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
