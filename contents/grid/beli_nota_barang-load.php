<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT 
		CONCAT(bbr.kode,' - ',bbr.nama) AS barang,
		SUM((a.jumlah_unit-(a.jumlah_selesai_nota/a.jumlah_konversi))) AS jumlah_unit,
		bsu.nama AS satuan_unit,
		'' AS batch_number,
		'' AS batch_expired,
		bo.rusak AS rusak,
		bo.harga_ppn,
		bo.harga,
		bo.diskon_1,
		bo.diskon_nominal_1,
		bo.diskon_2,
		bo.diskon_nominal_2,
		bo.diskon_3,
		bo.netto,
		SUM((a.jumlah_unit-(a.jumlah_selesai_nota/a.jumlah_konversi)))*bo.netto AS subtotal,	
		'' AS keterangan,
		0 AS hpp_biaya,
		0 AS hpp,
		GROUP_CONCAT(a.nomor) AS nomortdbelipenerimaan,
		GROUP_CONCAT(DISTINCT a.nomorthbelipenerimaan) AS nomorthbelipenerimaan,
		bo.nomor AS nomortdbeliorder,
		a.master_nomor,
		a.master_tabel,
		a.nomormhsatuan,
		a.nomormhsatuanunit,
		SUM((a.jumlah-a.jumlah_selesai_nota)) AS jumlah,
		bo.jumlah_konversi,
		a.sn,
		a.batch,
		a.expdate
	FROM tdbelipenerimaan a
	JOIN tdbeliorder bo ON bo.nomor = a.nomortdbeliorder
    JOIN mhbarang bbr ON a.master_nomor = bbr.nomor AND a.master_tabel = 'mhbarang'
	JOIN mhsatuan bst ON a.nomormhsatuan = bst.nomor
	JOIN mhsatuan bsu ON a.nomormhsatuanunit = bsu.nomor
	WHERE a.status_aktif = 1
	AND (a.jumlah-a.jumlah_selesai_nota) > 0
	AND FIND_IN_SET(a.nomorthbelipenerimaan, '".$_GET["no"]."')
	AND bo.nomorthbeliorder = ".$_GET["ob"]."
	GROUP BY bo.nomor";
$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"barang",
	"jumlah_unit",
	"satuan_unit",
	"batch_number",
	"batch_expired",
	"rusak",
	"harga_ppn",
	"harga",
	"diskon_1",
	"diskon_nominal_1",
	"diskon_2",
	"diskon_nominal_2",
	"diskon_3",
	"netto",
	"subtotal",
	"keterangan",
	"hpp_biaya",
	"hpp",
	"nomortdbelipenerimaan",
	"nomorthbelipenerimaan",
	"nomortdbeliorder",
	"master_nomor",
	"master_tabel",
	"nomormhsatuan",
	"nomormhsatuanunit",
	"jumlah",
	"jumlah_konversi",
	"sn",
	"batch",
	"expdate"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>