<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*,
	b.nama as warna
	FROM
	tdhasilanalisasample a
	join mhwarna b on a.nomormhwarna = b.nomor
	where 1=1 and a.nomorthhasilanalisasample = ".$_GET['no']." and a.status_aktif = 1
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "b.nama";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"warna",
	"jumlah",
	"nomormhwarna"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
