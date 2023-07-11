<?php
$index["debug"] = 1;

$index["filter"] = 1;
$index_filter["hide"] = 0;

$i = 0;
$index_filter["field"][$i]["label"] ="Customer";
$index_filter["field"][$i]["input"] ="relasinomor";
$index_filter["field"][$i]["input_element"] ="browse";
$index_filter["field"][$i]["browse_setting"] ="master_relasi";
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "metode";
$index_table["column"][$i]["sort"] = "a.metode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Metode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account";
$index_table["column"][$i]["sort"] = "bac.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Account";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "relasinama";
$index_table["column"][$i]["sort"] = "bv2.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Relasi";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "valuta";
$index_table["column"][$i]["sort"] = "bvl.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Valuta";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "total";
$index_table["column"][$i]["sort"] = "a.total";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Total";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "a.keterangan";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "pembuat";
$index_table["column"][$i]["sort"] = "bad.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Pembuat";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] 		= "dph";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "DPH";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "pp";
$index_table["column"][$i]["sort"] 		= "";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Pelunasan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] = "status_disetujui";
$index_table["column"][$i]["sort"] = "a.status_disetujui";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Status";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index["query_select"] = "	SELECT a.*,
							DATE_FORMAT(a.tanggal,'".$_SESSION["setting"]["date_sql"]."') AS tanggal,
							CONCAT(bac.kode,' - ',bac.nama) AS account,
							bvl.kode AS valuta,
							bv2.nama as relasinama,
							bad.nama AS pembuat,
							(
								SELECT GROUP_CONCAT(CONCAT('&#x25C8;&nbsp;', nh.kode) SEPARATOR '<br>')
								FROM `thpenagihanhutang` nh 
								JOIN tdpenagihanhutang nd ON nd.nomorthpenagihanhutang = nh.nomor 
									AND nd.status_aktif > 0 
									AND nd.transaksi_tabel = 'thuangmasuk' 
								WHERE 
									nh.status_aktif > 0
									AND nd.transaksi_nomor = a.nomor 
							) AS dph,
							(
								SELECT GROUP_CONCAT(CONCAT('&#x25C8;&nbsp;', nh.kode) SEPARATOR '<br>')
								FROM `thpelunasanpiutang` nh 
								JOIN `tdpelunasanpiutang` nd ON nd.nomorthpelunasanpiutang = nh.nomor 
									AND nd.status_aktif > 0 
									AND nd.transaksi_tabel = 'thuangmasuk'  
								WHERE 
									nh.status_aktif > 0
									AND nd.transaksi_nomor = a.nomor
							) AS pp
							FROM thuangmasuk a
							LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
							JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
							JOIN mhadmin bad ON a.dibuat_oleh = bad.nomor AND bad.status_aktif > 0 
							JOIN mhrelasi bv2 ON a.relasinomor=bv2.nomor
							";
$index["query_where"]  .= "	AND a.nomormhcabang = ".$_SESSION["cabang"]["nomor"]. " AND a.tipe = 0";
// if($_SESSION["login"]["tipe"] != "accounting")
// 	$index["query_where"] .= "
// 							AND a.nomormhaccount IN (
// 								SELECT a.relasi_nomor
// 								FROM shaksesmaster a
// 								WHERE a.status_aktif = 1
// 								AND a.relasi_table = 'mhaccount'
// 								AND a.nomormhadmin = ".$_SESSION["login"]["nomor"]."
// 							) ";
if(empty($index["query_filter"]))
    $index["query_where"] .= " AND a.tanggal = '".date("Y-m-d")."' ";
$index["default_order"] = "	a.tanggal DESC, a.kode DESC";
?>