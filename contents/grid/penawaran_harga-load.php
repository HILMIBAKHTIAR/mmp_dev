<?php
$_SESSION["grid_" . $grid_id]["query"] = "
	select
		CONCAT(d.kode_custom, ' | ', d.nama) as nama,
		(
			SELECT
				GROUP_CONCAT(
					DISTINCT CONCAT(
						' ',
						c.warna
					) SEPARATOR ' / '
				)
				FROM tdspesifikasiproduk c
				WHERE c.nomorthspesifikasiproduk=d.nomor AND c.status_aktif > 0
				ORDER BY c.nomor ASC
		) AS warna,
		CONCAT(
			d.width,
			' x ',
			d.pitch,
			' x ',
			d.length
		  ) AS size,
		d.struktur_packaging as komposisi,
		IFNULL(d.minimun_order, 0) as moq,
		d.harga as harga,
		0 as jumlah,
		d.nomor as nomorthspesifikasiproduk
	FROM thspesifikasiproduk d
	WHERE d.customer = '".$_GET['customer']. "' AND d.status_disetujui = 1 AND d.is_masuk_penawaran = 0

	";

$_SESSION["grid_" . $grid_id]["query_order"] = "d.nama";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"nama",
	"warna",
	"komposisi",
	"size",
	"moq",
	"harga",
	"nomorthspesifikasiproduk"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;

/*
nama
warna
komposisi
size
moq
harga
nomorthspesifikasiproduk

*/
