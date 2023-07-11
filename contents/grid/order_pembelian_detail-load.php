<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
		a.kode as kode_permintaan,
		DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_permintaan,
		dpt.nama as departemen,
		COALESCE(CONCAT(t3.kode_custom,' - ',i.nama), CONCAT(d.kode,' - ',h.nama), CONCAT(d.kode,' - ',d.nama)) AS barang,
		l.nama as lokasi,
		b.nomormhlokasi as nomormhlokasi,
		b.jumlah_unit - b.jumlah_terpo as jumlah_permintaan,
		c.nama as satuan_permintaan,
		b.keterangan as keterangan_permintaan,
		1 as jumlah_konversi,
		b.jumlah_unit - b.jumlah_terpo as jumlah_order,
		c.nama as satuan_order,
		0 as harga_satuan,
		0 as diskon_1,
		0 as diskon_nominal_1,
		0 as subtotal,
		'' as keterangan,
		DATE_FORMAT(NOW(),'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kirim,
		a.nomor as nomorthbelipermintaan,
		b.nomor as nomortdbelipermintaan,
		d.nomor as nomormhbarang,
		b.nomormhsatuanqty as nomormhsatuanqty,
		dpt.nomor as nomormhdepartemen
	FROM thbelipermintaan a
	JOIN tdbelipermintaan b ON a.nomor = b.nomorthbelipermintaan 
	JOIN mhdepartemen dpt ON dpt.nomor = a.nomormhdepartemen
	JOIN mhbarang d ON d.nomor = b.nomormhbarang
	LEFT JOIN mhsatuan c ON c.nomor = b.nomormhsatuanqty 
	LEFT JOIN mhlokasi l ON l.nomor = b.nomormhlokasi 
	left join mhwarna h on h.nomor = d.nomormhwarna
	LEFT JOIN thbarang i ON i.nomor = d.nomormhcilinder
	left JOIN thpemesanancylinder t3 ON t3.nomor = b.nomorthpemesanancylinder 
	WHERE
		a.status_disetujui = 1 
		and a.status_aktif = 1 
		AND b.status_aktif = 1 
		AND a.nomormhdepartemen = " . $_GET[ "nomormhdepartemen"] . "
		AND a.tanggal <= '" . $_GET["tanggal"] . "'
		AND (b.jumlah_unit - b.jumlah_terpo) > 0 
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode_permintaan",
	"tanggal_permintaan",
	"departemen",
	"barang",
	"lokasi",
	"jumlah_permintaan",
	"satuan_permintaan",
	"keterangan_permintaan",
	"jumlah_konversi",
	"jumlah_order",
	"satuan_order",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"keterangan",
	"tanggal_kirim",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"nomormhbarang",
	"nomormhdepartemen",
	"nomormhsatuanqty",
	"nomormhlokasi",
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>