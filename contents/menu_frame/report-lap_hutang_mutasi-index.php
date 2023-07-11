<?php
$index["debug"]                 = 1;
$index["footer"]                = 1;
$index["filter"]                = 1;
$filter["start_date"]           = $_SESSION["setting"]["filter_start_date"];
$filter["end_date"]             = $_SESSION["setting"]["filter_end_date"];
$filter["g.menu"]               = "menu_".$_SESSION["g.menu"];
$index_datatable["paging"]      = "true";
$index_datatable["ordering"]    = "false";

if( isset($_SESSION[$filter["g.menu"]]["filter_".$filter["start_date"]]) && 
    isset($_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]) )
    $index["title"] .= " ".$_SESSION[$filter["g.menu"]]["filter_tanggal_awal"]." s.d. ".$_SESSION[$filter["g.menu"]]["filter_tanggal_akhir"];

$i = 0;
$index_filter["field"][$i]["label"]                         = "Cabang";
$index_filter["field"][$i]["input"]                         = "nomormhcabang";
$index_filter["field"][$i]["input_element"]                 = "select1";
$index_filter["field"][$i]["input_col"]                     = "col-sm-10";
$index_filter["field"][$i]["input_option"]                  = array();

$mhcabang = mysqli_query($con,"
SELECT 0 AS nomor, '%|SEMUA CABANG' AS opsi
UNION ALL
SELECT a.nomor, CONCAT(a.nomor,'|',a.nama,' - ',a.kode) AS opsi
FROM mhcabang a
WHERE a.status_aktif = 1
ORDER BY 1");

while($cabang = mysqli_fetch_array($mhcabang))
   array_push($index_filter["field"][$i]["input_option"],$cabang["opsi"]);
$i++;
$index_filter["field"][$i]["label"]                         = "Relasi";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_col"]                     = "col-sm-10";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_relasi";
$i++;
$index_filter["field"][$i]["label"]                         = "Tanggal Awal";
$index_filter["field"][$i]["label_class"]                   = "req";
$index_filter["field"][$i]["input"]                         = $filter["start_date"];
$index_filter["field"][$i]["input_class"]                   = "required date_1";
if(empty($_SESSION["menu_".$_SESSION["g.menu"]]["filter_".$filter["start_date"]]))
    $index_filter["field"][$i]["input_value"]               = date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["form_group"]                    = 0;
$index_filter["field"][$i]["label"]                         = "Tanggal Akhir";
$index_filter["field"][$i]["label_class"]                   = "req";
$index_filter["field"][$i]["input"]                         = $filter["end_date"];
$index_filter["field"][$i]["input_class"]                   = "required date_1";
if(empty($_SESSION["menu_".$_SESSION["g.menu"]]["filter_".$filter["end_date"]]))
    $index_filter["field"][$i]["input_value"]               = date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["label"]                         = "Opsi Tampilan";
$index_filter["field"][$i]["input"]                         = "view";
$index_filter["field"][$i]["input_col"]                     = "col-sm-10";
$index_filter["field"][$i]["input_element"]                 = "select1";
$index_filter["field"][$i]["input_option"]                  = array("CABANG|PER CABANG","ALL|ALL");
$i++;

$i = 0;
$index_table["column"][$i]["name"]      = "relasi";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Relasi";
$index_table["column"][$i]["align"]     = "";
$index_table["column"][$i]["width"]     = "";
$i++;
$index_table["column"][$i]["name"]      = "saldo_awal";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Saldo Awal";
$index_table["column"][$i]["align"]     = "right";
$index_table["column"][$i]["width"]     = "100";
$index_table["column"][$i]["number"]    = "money";
$i++;
$index_table["column"][$i]["name"]      = "debit";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Debit";
$index_table["column"][$i]["align"]     = "right";
$index_table["column"][$i]["width"]     = "100";
$index_table["column"][$i]["number"]    = "money";
$i++;
$index_table["column"][$i]["name"]      = "kredit";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Kredit";
$index_table["column"][$i]["align"]     = "right";
$index_table["column"][$i]["width"]     = "100";
$index_table["column"][$i]["number"]    = "money";
$i++;
$index_table["column"][$i]["name"]      = "saldo_akhir";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Saldo Akhir";
$index_table["column"][$i]["align"]     = "right";
$index_table["column"][$i]["width"]     = "100";
$index_table["column"][$i]["number"]    = "money";
$i++;
$index_table["column"][$i]["name"]      = "link";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Link";
$index_table["column"][$i]["align"]     = "center";
$index_table["column"][$i]["width"]     = "100";
$index_table["column"][$i]["number"]    = "money";
$i++;

$index["query_select"] = "	CALL rp_hutang(
                                '2000-01-01',
                                '2000-01-01',
								'%',
                                '%',
                                0,
                                0,
                                'CABANG',
                                '',
                                1
							)";
$index["query_where"] = "";
?>