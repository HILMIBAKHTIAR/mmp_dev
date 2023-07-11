<?php

$where = "";

if($_GET['status_kliring'] != ''){
    $where .= " AND a.status_giro = ".$_GET['status_kliring'];
}

if($_GET['jenis_uang'] == 'uang_masuk') {
  $_SESSION["grid_".$grid_id]["query"] = "
	SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'".$_SESSION["setting"]["date_sql"]."') AS tanggal,
    IF (a.tipe = 0, 'Utama', 'Lain') AS tipe,
    CONCAT(b.nama,' - ',bv2.kode,' - ',bv2.nama) AS relasi,
    bac.kode AS 'kode_account',
    bac.nama AS 'nama_account',
    bvl.kode AS 'valuta',
    a.giro_ref AS 'ref_giro',
    bad.nama AS pembuat,
    'uang_masuk' as jenis_uang,
    a.nomor as nomorthuang
	FROM thuangmasuk a
  LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
  JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
  LEFT JOIN mhrelasi bv2 ON a.relasinomor = bv2.nomor
  LEFT JOIN mhrelasijenis b ON b.nomor = bv2.nomormhrelasijenis
  JOIN mhadmin bad ON a.dibuat_oleh = bad.nomor AND bad.status_aktif > 0 
	WHERE
		a.status_aktif > 0
		AND a.status_disetujui = 1
    AND a.metode = 'giro'
    AND a.giro = 1
    ". $where ."
";
} else if ($_GET['jenis_uang'] == 'uang_keluar') {
  $_SESSION["grid_".$grid_id]["query"] = "
	SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'".$_SESSION["setting"]["date_sql"]."') AS tanggal,
    IF (a.tipe = 0, 'Utama', 'Lain') AS tipe,
    CONCAT(b.nama,' - ',bv2.kode,' - ',bv2.nama) AS relasi,
    bac.kode AS 'kode_account',
    bac.nama AS 'nama_account',
    bvl.kode AS 'valuta',
    a.giro_ref AS 'ref_giro',
    bad.nama AS pembuat,
    'uang_keluar' as jenis_uang,
    a.nomor as nomorthuang
	FROM thuangkeluar a
  LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
  JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
  LEFT JOIN mhrelasi bv2 ON a.relasinomor = bv2.nomor
  LEFT JOIN mhrelasijenis b ON b.nomor = bv2.nomormhrelasijenis
  JOIN mhadmin bad ON a.dibuat_oleh = bad.nomor AND bad.status_aktif > 0 
	WHERE
		a.status_aktif > 0
		AND a.status_disetujui = 1
    AND a.metode = 'giro'
    AND a.giro = 1
    ". $where ."
";
}


$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"tanggal",
	"kode",
	"jenis_uang",
	"tipe",
	"relasi",
	"kode_account",
	"nama_account",
	"valuta",
	"total_idr",
	"ref_giro",
	"bayar",
	"pembuat",
	"nomorthuang",
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>