<?php
// var_dump("test");
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
		'FB' AS jenis,
		a.no_invoice AS no_inv,
		a.no_sj_supplier AS no_sj,
		v.nama AS valuta,
		a.kode AS transaksikode,
		(
			SELECT CONCAT(z.nomormhaccountawal,'|',y.kode,' - ',y.nama)
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS account,
		(a.total-a.total_terbayar) AS bayar,
		(a.total-a.total_terbayar) AS sisa,
		((a.total-a.total_terbayar) * a.kurs) AS bayar_idr,
		((a.total-a.total_terbayar) * a.kurs) AS sisa_idr,
		a.keterangan AS keterangan,
		a.nomormhvaluta,
		a.kurs,
		'thpurchasebtb' AS transaksitabel,
		a.nomor AS transaksinomor,
		(
			SELECT z.nomormhaccountawal
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS nomormhaccount,
		'0' AS tipe,
		'1' AS multiplier,
		a.subtotal AS dpp,
		a.ppn_nominal AS ppn,
		a.faktur_pajak_tanggal,
		a.faktur_pajak_nomor,
		a.tgl_terima_tagihan,
		IFNULL(a.pph, 0) AS pph,
		(((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) - ( ((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) * ( a.ppn_prosentase / 100 ) )) AS subtotal,
		((((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) - ( ((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/(1+( a.ppn_prosentase / 100 ))) * ( a.ppn_prosentase / 100 ) )) * a.kurs) AS subtotal_idr
	FROM thpurchasebtb a
	JOIN mhvaluta v ON a.nomormhvaluta = v.nomor
	WHERE a.status_disetujui = 1
	AND a.status_disetujui_dokumen = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.nomormhsupplier = ".$_GET["no"]."
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL
	SELECT
		a.jenis,
		'' AS no_inv,
		'' AS no_sj,
		v.nama AS valuta,
		a.kode AS transaksikode,
		(
			SELECT CONCAT(z.nomormhaccountawal,'|',y.kode,' - ',y.nama)
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS account,
		(IF(a.jenis = 'NDS', (a.total * -1), a.total) - IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai)) AS bayar,
		(IF(a.jenis = 'NDS', (a.total * -1), a.total) - IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai)) AS sisa,
		((IF(a.jenis = 'NDS', (a.total * -1), a.total) - IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai)) * a.kurs) AS bayar_idr,
		((IF(a.jenis = 'NDS', (a.total * -1), a.total) - IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai)) * a.kurs) AS sisa_idr,
		a.keterangan,
		a.nomormhvaluta,
		a.kurs,
		'thnotadebitkredit' AS transaksitabel,
		a.nomor AS transaksinomor,
		(
			SELECT z.nomormhaccountawal
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS nomormhaccount,
		'0' AS tipe,
		'1' AS multiplier,
		IF(a.jenis = 'NDS', (a.dpp * -1), a.dpp) AS dpp,
		a.ppn_nominal AS ppn,
		''  AS faktur_pajak_tanggal,
		'' AS faktur_pajak_nomor,
		'' AS tgl_terima_tagihan,
		0 AS pph,
		(((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) * 1 ) + ( ((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) * IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1) )) AS subtotal,
		((((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) * 1 ) + ( ((IF(a.jenis = 'NDS', (a.total * -1), a.total)-IF(a.jenis = 'NDS', (a.total_terpakai * -1), a.total_terpakai))/IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1)) * IF(a.ppn > 0, (1+ (a.ppn_prosentase / 100)), 1) )) * a.kurs) AS subtotal_idr
	FROM thnotadebitkredit a
	JOIN mhvaluta v ON a.nomormhvaluta = v.nomor
	WHERE
	a.status_disetujui = 1
	AND (a.jenis = 'NDS' OR a.jenis = 'NKS')
	AND (a.total - a.total_terpakai) > 0
	AND a.nomormhrelasi = ".$_GET["no"]."
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL

	SELECT
		'UMS' AS jenis,
		'' AS no_inv,
		'' AS no_sj,
		v.nama AS valuta,
		a.kode AS transaksikode,
		(
			SELECT CONCAT(z.nomormhaccountawal,'|',y.kode,' - ',y.nama)
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: TITIPAN_DP_SUPPLIER'
		) AS account,
		(a.total-a.total_terbayar) AS bayar,
		(a.total-a.total_terbayar) AS sisa,
		((a.total-a.total_terbayar) * a.kurs) AS bayar_idr,
		((a.total-a.total_terbayar) * a.kurs) AS sisa_idr,
		a.keterangan AS keterangan,
		a.nomormhvaluta,
		a.kurs,
		'thuangtitipan' AS tabel,
		a.nomor AS transaksinomor,
		(
			SELECT z.nomormhaccountawal
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: TITIPAN_DP_SUPPLIER'
		) AS nomormhaccount,
		'0' AS tipe,
		'1' AS multiplier,
		a.dpp AS dpp,
		a.ppn_nominal AS ppn,
		'' AS faktur_pajak_tanggal,
		'' AS faktur_pajak_nomor,
		'' AS tgl_terima_tagihan,
		IFNULL(a.pph, 0) AS pph,
		(((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) )) AS subtotal,
		((((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) )) * a.kurs) AS subtotal_idr
	FROM thuangtitipan a
	JOIN mhvaluta v ON a.nomormhvaluta = v.nomor
	WHERE a.status_disetujui = 1
	AND a.jenis = 'UMS'
	AND (a.total-a.total_terbayar) > 0
	AND a.nomormhrelasi = ".$_GET["no"]."
	AND a.tanggal <= '".$_GET["tgl"]."'

	UNION ALL

	SELECT
		'UMS-P' AS jenis,
		'' AS no_inv,
		'' AS no_sj,
		v.nama AS valuta,
		a.kode AS transaksikode,
		(
			SELECT CONCAT(z.nomormhaccountawal,'|',y.kode,' - ',y.nama)
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: TITIPAN_DP_SUPPLIER'
		) AS account,
		(a.total-a.total_terpakai)*-1 AS bayar,
		(a.total-a.total_terpakai)*-1 AS sisa,
		((a.total-a.total_terpakai) * a.kurs)*-1 AS bayar_idr,
		((a.total-a.total_terpakai) * a.kurs)*-1 AS sisa_idr,
		a.keterangan AS keterangan,
		a.nomormhvaluta,
		a.kurs,
		'thuangtitipan' AS tabel,
		a.nomor AS transaksinomor,
		(
			SELECT z.nomormhaccountawal
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: TITIPAN_DP_SUPPLIER'
		) AS nomormhaccount,
		'0' AS tipe,
		'-1' AS multiplier,
		a.dpp AS dpp,
		a.ppn_nominal AS ppn,
		'' AS faktur_pajak_tanggal,
		'' AS faktur_pajak_nomor,
		'' AS tgl_terima_tagihan,
		IFNULL(a.pph, 0) AS pph,
		(((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) ))*-1 AS subtotal,
		((((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terpakai)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) )) * a.kurs)*-1 AS subtotal_idr
	FROM thuangtitipan a
	JOIN mhvaluta v ON a.nomormhvaluta = v.nomor
	WHERE a.status_disetujui = 1
	AND a.jenis = 'UMS'
	AND (a.total_terbayar-a.total_terpakai) > 0
	AND a.nomormhrelasi = ".$_GET["no"]."
	AND a.tanggal <= '".$_GET["tgl"]."'


	UNION ALL

	SELECT
		'RB' AS jenis,
		a.nota_retur AS no_inv,
		'' AS no_sj,
		v.nama AS valuta,
		a.kode AS transaksikode,
		(
			SELECT CONCAT(z.nomormhaccountawal,'|',y.kode,' - ',y.nama)
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS account,
		(a.total-a.total_terbayar)* -1 AS bayar,
		(a.total-a.total_terbayar)* -1 AS sisa,
		((a.total-a.total_terbayar) * a.kurs)* -1 AS bayar_idr,
		((a.total-a.total_terbayar) * a.kurs)* -1 AS sisa_idr,
		a.keterangan AS keterangan,
		a.nomormhvaluta,
		a.kurs,
		'thbeliretur' AS tabel,
		a.nomor AS transaksinomor,
		(
			SELECT z.nomormhaccountawal
			FROM mhaccountsetting z
			JOIN mhaccount y ON z.nomormhaccountawal = y.nomor
			WHERE z.status_aktif = 1
			AND z.kode = 'Auto: BELI_NOTA'
		) AS nomormhaccount,
		'0' AS tipe,
		'-1' AS multiplier,
		a.subtotal AS dpp,
		a.ppn_nominal AS ppn,
		'' AS faktur_pajak_tanggal,
		'' AS faktur_pajak_nomor,
		'' AS tgl_terima_tagihan,
		IFNULL(a.pph, 0) AS pph,
		(((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) ))*-1 AS subtotal,
		((((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) - ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (IFNULL(a.pph, 0)/100) ) + ( ((a.total-a.total_terbayar)/IF(a.ppn_prosentase > 0, (1+ (a.ppn_prosentase / 100)), 1)) * (a.ppn_prosentase/100) )) * a.kurs)*-1 AS subtotal_idr
	FROM thbeliretur a
	JOIN mhvaluta v ON a.nomormhvaluta = v.nomor
	WHERE a.status_disetujui = 1
	AND (a.total-a.total_terbayar) > 0
	AND a.nomormhsupplier = ".$_GET["no"]."
	AND a.tanggal <= '".$_GET["tgl"]."'


";
$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"jenis",
	"transaksikode",
	"no_inv",
	"no_sj",
	"dpp",
	"ppn",
	"faktur_pajak_tanggal",
	"faktur_pajak_nomor",
	"account",
	"valuta",
	"kurs",
	"tgl_terima_tagihan",
	"sisa",
	"sisa_idr",
	"bayar",
	"bayar_idr",
	"pph",
	"subtotal",
	"subtotal_idr",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"nomormhvaluta",
	"tipe",
	"multiplier"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>