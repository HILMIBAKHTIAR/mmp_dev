<?php
$index["debug"]		= 1;
$index["ajax"] 		= 1;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "nama";
$index_table["column"][$i]["sort"] 		= "a.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "kode";
$index_table["column"][$i]["sort"] 		= "a.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Username";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "admin_grup";
$index_table["column"][$i]["sort"] 		= "b.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Grup User";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "cabang";
$index_table["column"][$i]["sort"] 		= "c.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Cabang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "status_aktif";
$index_table["column"][$i]["sort"] 		= "a.status_aktif";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Status";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index["query_select"] 		= "	SELECT a.*,
								GROUP_CONCAT(DISTINCT b.nama SEPARATOR '<br>') AS admin_grup,
								GROUP_CONCAT(DISTINCT c.kode,' - ',c.nama SEPARATOR '<br>') AS cabang
								FROM ".$index["query_from"]." a
								LEFT JOIN shaksesmaster f ON f.nomormhadmin = a.nomor AND f.status_aktif = 1
								LEFT JOIN mhadmingrup b ON f.relasi_nomor = b.nomor AND f.relasi_tipe = 'master_group' AND b.status_aktif > 0 
								LEFT JOIN mhcabang c ON f.relasi_nomor = c.nomor AND f.relasi_tipe = 'master_cabang' AND c.status_aktif > 0 
								LEFT JOIN mhusaha d ON d.nomor = f.nomormhusaha
								";
$index["query_where"] 		.= "AND a.nomor > 0 
								AND IFNULL(d.nomor,'') LIKE '".$_SESSION["usaha"]["nomor"]."'
								GROUP BY a.nomor";
$index["default_order"] 	= "	a.nama";
?>