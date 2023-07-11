<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
	a.*,
	b1.tipe as komposisi
	FROM
	tdhasilanalisasample_komposisiproses a
	join mhbarang b on a.nomormhbarang = b.nomor
	join mdbarangtipe b1 on b.nomormdbarangtipe = b1.nomor
	where 1=1 and a.nomorthhasilanalisasample = ".$_GET['no']." and a.status_aktif = 1 and a.grid_ke = 1
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "b.nama";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"komposisi",
	"mikron",
	"grid_ke",
	"nomormhbarang"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
