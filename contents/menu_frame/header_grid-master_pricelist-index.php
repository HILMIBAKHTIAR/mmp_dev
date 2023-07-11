<?php
$index["debug"] = 1;
$index["ajax"] 			= 1;
$index["filter"] 			= 1;
// $index["filter_column"] 			= 1;
// $index_navbutton["generate"] .= "|filter_column";


$i = 0;
$index_filter["field"][$i]["label"]                     = "tipe";
$index_filter["field"][$i]["label_class"]                 = "req";
$index_filter["field"][$i]["input"]                     = "nomormdsuppliersupply";
$index_filter["field"][$i]["input_class"]                 = "required";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_tipe_filmV2";
$i++;

// $index_filter["field"][$i]["form_group"] = 0;
// $index_filter["field"][$i]["label"] = "Minimum Price";
// $index_filter["field"][$i]["input"] = "minimum price";
// $index_filter["field"][$i]["input_class"] = "iptnumber";
// $i++;

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "supplier";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Supplier";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "harga";
$index_table["column"][$i]["sort"] = "a.harga";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Price";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
// $index_table["column"][$i]["name"] = "minimum_price";
// $index_table["column"][$i]["sort"] = "a.minimum_price";
// $index_table["column"][$i]["search"] = 1;
// $index_table["column"][$i]["caption"] = "Minimum Price";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "";
// $i++;
// $index_table["column"][$i]["name"] = "maximum_price";
// $index_table["column"][$i]["sort"] = "a.maximum_price";
// $index_table["column"][$i]["search"] = 1;
// $index_table["column"][$i]["caption"] = "Maximum Price";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "";
// $i++;
$index_table["column"][$i]["name"] = "tanggal_expired";
$index_table["column"][$i]["sort"] = "a.tanggal_expired";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Expired";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "status_aktif";
$index_table["column"][$i]["sort"] = "a.status_aktif";
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

$index["query_select"] = "
	SELECT DISTINCT
		a.*, 
		b.nama as supplier,
		date_format(a.tanggal_expired	, '%d %b %Y') as tanggal_expired	
	FROM 
	mhpricelist a 
	join mhrelasi b on b.nomor = a.nomormhrelasi
"; 
							/*
							$index["query_select"] = "
	SELECT a.*, date_format(a.tanggal_expired	, '%d %b %Y') as tanggal_expired FROM (
		SELECT
			a.*, 
			b.nama as supplier
		FROM mhpricelist a 
		join mhrelasi b on b.nomor = a.nomormhrelasi
		JOIN mdsuppliersupply c ON c.nomormhrelasi = b.nomor
		GROUP BY a.nomor
	) a
";
							*/

$index["query_where"] .= "	AND a.nomor <> 0 AND a.status_aktif > 0 ";
$index["default_order"] = "	a.nomor DESC";
