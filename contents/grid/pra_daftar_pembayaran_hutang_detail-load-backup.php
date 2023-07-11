<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
		'BELI_NOTA' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		''  as supplier_invoice_nomor,
		'' as faktur_pajak_nomor,
		a.dpp as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*1*(a.toggle_pph/100))) * a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thnotapembelian' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a.nomormhvaluta as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thnotapembelian a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.supplier
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'
	
	UNION ALL
	
	SELECT
		'BELI_NOTA_BIAYA_ESTIMASI' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		0 as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*1*(a.pph_prosentase/100))) * a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thbiayaestimasi' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.pph_prosentase as pph23,
		'' AS account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a.nomormhvaluta as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thbiayaestimasi a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.supplier
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	JOIN thorderpembelian b ON a.nomorthorderpembelian = b.nomor
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'
	
	UNION ALL

	SELECT
		'BELI_NOTA_KSO' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		0 as dpp,
		0 as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		(a.total-a.total_terbayar)*1*a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thkso' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		0 as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a.nomormhvaluta as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thkso a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.surveyor
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	JOIN thorderpembelian b ON a.nomorthorderpembelian = b.nomor
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'
	
	UNION ALL

	SELECT
		'BELI_NOTA_PIB' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		a.dpp_rounded as dpp,
		a.ppn_prosentase as ppn,
		(a.total_idr-a.total_terbayar) AS sisa,
		(a.total_idr-a.total_terbayar) AS bayar,
		1 as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		(a.total_idr-a.total_terbayar)*1 AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thpib' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		0 as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		1 as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thpib a
	JOIN mhrelasi a1 on a1.nomor=a.supplier
	LEFT JOIN mhvaluta a2 on a2.nomor = 1
	JOIN thorderpembelian b ON a.nomorthorderpembelian = b.nomor
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total_idr-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'
	
	UNION ALL
	
	SELECT
		'BELI_NOTA_UANG_MUKA' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		0 as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*1*(a.toggle_pph/100))) * a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thuangmuka' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a.nomormhvaluta as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thuangmuka a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.supplier
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	JOIN thorderpembelian b ON a.nomorthorderpembelian = b.nomor
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND b.tanggal <= '".$_GET["tgl"]."'
	
	UNION ALL

	SELECT
		'UANG_MASUK' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		0 as dpp,
		0 as ppn,
		(a.total-a.total_terpakai) AS sisa,
		(a.total-a.total_terpakai) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		(a.total-a.total_terpakai)*1*a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thuangmasuk' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		0 as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a.nomormhvaluta as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thuangmasuk a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.relasinomor
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND a.tipe = 0
	AND (a.total-a.total_terpakai) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL
	
	SELECT
		'SERTIFIKAT_PEMBAYARAN' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		''  AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		a.dpp as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*1*(a.toggle_pph/100)))*a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thsertifikatpembayaran' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph AS pph23,
		'' as account_pph,
		a1.nama AS relasinama,
		a1.nomor AS relasinomor,
		a1.kode AS relasikode,
		'mhrelasi' AS relasitabel,
		a2.nomor as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thsertifikatpembayaran a
	JOIN mhrelasi a1 ON a1.nomor=a.nomormhrelasi
	LEFT JOIN mhvaluta a2 on a2.nomor=1
	WHERE a.status_aktif = 1
	AND a.jenis like 'SERTIFIKAT_PEMBAYARAN'
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL

	SELECT
		'SERTIFIKAT_PEMBAYARAN_TAMBAH' AS jenis,
		'0' AS tipe,
		'1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		''  AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		a.dpp as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*1*(a.toggle_pph/100)))*a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thsertifikatpembayaran' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph AS pph23,
		'' as account_pph,
		a1.nama AS relasinama,
		a1.nomor AS relasinomor,
		a1.kode AS relasikode,
		'mhrelasi' AS relasitabel,
		a2.nomor as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thsertifikatpembayaran a
	JOIN mhrelasi a1 ON a1.nomor=a.nomormhrelasi
	LEFT JOIN mhvaluta a2 on a2.nomor=1
	WHERE a.status_aktif = 1
	AND a.jenis like 'SERTIFIKAT_PEMBAYARAN_TAMBAH'
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL

	SELECT
		'SERTIFIKAT_PEMBAYARAN_KURANG' AS jenis,
		'1' AS tipe,
		'-1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		''  AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		a.dpp as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terbayar) AS sisa,
		(a.total-a.total_terbayar) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terbayar)-(((a.total-a.total_terbayar)/(1+a.ppn_prosentase/100))*(a.toggle_pph/100)))*-1*a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'thsertifikatpembayaran' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph AS pph23,
		'' as account_pph,
		a1.nama AS relasinama,
		a1.nomor AS relasinomor,
		a1.kode AS relasikode,
		'mhrelasi' AS relasitabel,
		a2.nomor as nomormhvaluta,
		0 as nomormhaccountpph
	FROM thsertifikatpembayaran a
	JOIN mhrelasi a1 ON a1.nomor=a.nomormhrelasi
	LEFT JOIN mhvaluta a2 on a2.nomor=1
	WHERE a.status_aktif = 1
	AND a.jenis like 'SERTIFIKAT_PEMBAYARAN_KURANG'
	AND a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL

	SELECT
		'BELI_RETUR' AS jenis,
		'1' AS tipe,
		'-1' AS multiplier,
		a.kode AS transaksikode,
		a.tanggal AS transaksitanggal,
		'' AS supplier_invoice_nomor,
		'' AS faktur_pajak_nomor,
		a.dpp as dpp,
		a.ppn_prosentase as ppn,
		(a.total-a.total_terpakai) AS sisa,
		(a.total-a.total_terpakai) AS bayar,
		a.kurs as kurs,
		CONCAT(a2.kode,' - ',a2.nama) as valuta,
		((a.total-a.total_terpakai)-(((a.total-a.total_terpakai)/(1+a.ppn_prosentase/100))*(a.toggle_pph/100))) *-1* a.kurs AS subtotal,
		0 AS nol,
		a.keterangan AS keterangan,
		'threturpembelian' AS transaksitabel,
		a.nomor AS transaksinomor,
		1 AS nomormhaccount,
		a.toggle_pph as pph23,
		'' as account_pph,
		a1.nama as relasinama,
		a1.nomor as relasinomor,
		a1.kode as relasikode,
		'mhrelasi' as relasitabel,
		a2.nomor as nomormhvaluta,
		0 as nomormhaccountpph
	FROM threturpembelian a
	LEFT JOIN mhrelasi a1 on a1.nomor=a.supplier
	LEFT JOIN mhvaluta a2 on a2.nomor=a.nomormhvaluta
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1
	AND (a.total-a.total_terpakai) > 0
	AND a.tanggal <= '".$_GET["tgl"]."'
	
	";
$_SESSION["grid_".$grid_id]["query_order"] = "relasinama";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"transaksikode",
	"transaksitanggal",
	"relasinama",
	"supplier_invoice_nomor",
	"faktur_pajak_nomor",
	"dpp",
	"ppn",
	"sisa",
	"bayar",
	"kurs",
	"valuta",
	"pph23",
	"account_pph",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"multiplier",
	"relasinomor",
	"relasikode",
	"relasitabel",
	"nomormhvaluta",
	"nomormhaccountpph"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>