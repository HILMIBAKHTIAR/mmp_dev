<?php
$index["debug"] = 1;
$index["ajax"] = 1;
$index_navbutton["generate"] ="reload|add";

$index["filter"] = 1;
$index_filter["hide"] = 0;
$i = 0;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["label_col"] = "col-sm-3";
$index_filter["field"][$i]["input_col"] = "col-sm-8";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["label_col"] = "col-sm-3";
$index_filter["field"][$i]["input_col"] = "col-sm-8";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

// SETTING FIELD INDEX
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
$index_table["column"][$i]["name"] = "kode_permintaan";
$index_table["column"][$i]["sort"] = "(SELECT GROUP_CONCAT(CONCAT('&#x25C8;&nbsp;',kode_permintaan) SEPARATOR '<br>') FROM tdbelipraorder WHERE nomorthbelipraorder=a.nomor)";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode Permintaan";
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
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "a.keterangan";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan";
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
// END SETTING FIELD INDEX
// SETTING QUERY
$index["query_select"] = "
	SELECT
		a.*,
		DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
		d.kode_permintaan,
		b.nama as pembuat,
		a.status_selesai_nota as nota_pembelian
	FROM thbelipraorder a 
	join tdbelipraorder b on b.nomorthbelipraorder = a.nomor 
	join tdbelipermintaan c on c.nomor = b.nomortdbelipermintaan 
	join thbelipermintaan d on d.nomor = c.nomorthbelipermintaan 
	JOIN mhadmin e on a.dibuat_oleh=e.nomor
";
$index["query_where"] = " a.status_aktif = 1";

if (empty($index["query_filter"]))
	$index["query_where"] .= " AND a.tanggal = '" . date("Y-m-d") . "' ";

$index["default_order"] = "	a.nomor desc";
// END SETTING QUERY
// ,(SELECT COUNT(a1.nomor) from thuangmuka a1 where a1.nomorthorderpembelian=a.nomor AND a1.status_aktif=1) as countthuangmuka
?>

