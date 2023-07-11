<?php
$acomplete["query"] 			= " SELECT 
COUNT(dt.nomor) as is_punya_detail,
a.*,
CONCAT('[', a.kode, '] ', a.nama) AS info,
a.nomor AS transaksi_nomor,
'mhaccount' AS transaksi_tabel,
'ACCOUNT' AS jenis
FROM mhaccount a
LEFT JOIN mhaccountdetail dt ON a.nomor = dt.nomormhaccount
WHERE 
	a.status_aktif = 1
	AND a.detail = 1
	AND ( 
		a.nomor NOT IN (
			SELECT DISTINCT aa.nomor
			FROM mhaccount aa
			JOIN ( 
				SELECT aw.kode AS acc_awal, ak.kode AS acc_akhir 
				FROM mhaccountsetting acs 
					LEFT JOIN mhaccount aw ON aw.nomor = acs.`nomormhaccountawal`
				LEFT JOIN mhaccount ak ON ak.nomor = acs.nomormhaccountakhir
			WHERE acs.status_aktif > 0 AND acs.is_browse = 0 
		) b ON aa.kode BETWEEN b.acc_awal AND b.acc_akhir
	) 
	OR a.kas = 1 OR a.bank = 1
)
GROUP BY a.nomor
										";
$acomplete["query_order"] 		= " a.kode";
$acomplete["query_search"] 		= array("a.kode","a.nama");
$acomplete["items"] 			= array("nomor||true","kode","nama", "detail", "is_punya_detail", "transaksi_nomor||true", "transaksi_tabel||true", "jenis", "info||true");
$acomplete["items_visible"] 	= array("info");
$acomplete["items_selected"]	= array("info");
$acomplete["param_input"] 		= array();
$acomplete["debug"] 			= 1;
?>