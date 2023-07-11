<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT 
	a.nomor AS nomorthpermintaanmaterial, 
	a.kode AS kode_permintaan, 
	i.nama AS nama, 
	CONCAT(c.nama, ' - ', prh.kode, ' ', prh.nama) AS pekerjaan, 
	d.nama AS nama_material, 
	e.nama AS tipe, 
	f.nama AS ukuran, 
	(b.jumlah - b.ter_prapo ) AS qty_permintaan, 
	g.nama AS satuan_lapangan, 
	d.konversi_purchasing_ke_lapangan AS konversi_persatuan, 
	(b.jumlah - b.ter_prapo)*IF(d.konversi_purchasing_ke_lapangan = NULL, d.konversi_purchasing_ke_lapangan,1) AS konversi_pertotal, 
	0 AS qty_purchasing, 
	h.nama AS satuan_purchasing, 
	h.nomor as nomormhsatuan_purchasing, 
	'' AS merk, 
	'' AS supplier, 
	0 AS ppn, 
	'Exclude' AS status_ppn, 
	0 AS harga, 
	b.nomor AS nomortdpermintaanmaterial, 
	j.nama AS nama_proyek, 
	j.jenis_proyek AS jenis_proyek 
	FROM thpermintaanmaterial a 
	JOIN tdpermintaanmaterial b ON b.nomorthpermintaanmaterial = a.nomor
	JOIN mhpekerjaan c ON c.nomor = b.nomormhpekerjaan 
	JOIN mhbarang d ON d.nomor = b.nomormhbarang 
	LEFT JOIN mdbarangtipe e ON e.nomor = b.nomormdbarangtipe 
	LEFT JOIN mdbarangukuran f ON f.nomor = b.nomormdbarangukuran 
	JOIN mhsatuan g ON g.nomor = d.satuan_lapangan
	JOIN mhsatuan h ON h.nomor = d.satuan_purchasing 
	JOIN mhpegawai i ON i.nomor = a.nomormhpegawai
	JOIN mhproyek j ON j.nomor = b.nomormhproyek 
	JOIN thjualkontrak kontrak ON kontrak.nomor = b.nomorthjualkontrak 
	LEFT JOIN mhperusahaan prh ON prh.nomor = kontrak.nomormhperusahaan 
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1 AND a.status_diverifikasi = 1 AND a.status_diverifikasi_2 = 1 AND a.status_diverifikasi_3 = 1 
	-- AND b.ter_prapo < b.jumlah
	AND b.ter_po < b.jumlah";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode_permintaan",
	"nama",
	"pekerjaan",
	"nama_proyek",
	"jenis_proyek",
	"nama_material",
	"tipe",
	"ukuran",
	"qty_permintaan",
	"satuan_lapangan",
	"konversi_persatuan",
	"konversi_pertotal",
	"merk",
	"supplier",
	"jumlah_terkonversi",
	"jumlah_beli",
	"satuan_purchasing",
	"nomormhsatuan_purchasing",
	"nomormdbarangmerk",
	"nomormhsupplier",
	"ppn",
	"status_ppn",
	"harga",
	"nomorthpermintaanmaterial",
	"nomortdpermintaanmaterial",
	"nomor",
	"diskon_1",
	"diskon_2",
	"subtotal_diskon",
	"subtotal"
	
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>