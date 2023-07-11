<?php
$index["debug"]                 = 1;
$index["footer"]                = 1;
$index["filter"]                = 1;
$filter["start_date"]           = $_SESSION["setting"]["filter_start_date"];
$filter["end_date"]             = $_SESSION["setting"]["filter_end_date"];
$filter["g.menu"]               = "menu_".$_SESSION["g.menu"];
$index_datatable["paging"]      = "true";
$index_datatable["ordering"]    = "false";

if(isset($_GET['link'])) 
    foreach($_SESSION[$filter["g.menu"]] as $key => $val) 
        if(strstr($key,"filter_"))
            unset($_SESSION[$filter["g.menu"]][$key]);
if(isset($_GET['tgl_awal']))
   $_SESSION[$filter["g.menu"]]["filter_".$filter["start_date"]]= $_GET['tgl_awal'];
if(isset($_GET['tgl_akhir']))
   $_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]  = $_GET['tgl_akhir'];
if(isset($_GET['cabang_no']))
   $_SESSION[$filter["g.menu"]]["filter_nomormhcabang"]         = $_GET['cabang_no'];
if(isset($_GET['relasi']))
   $_SESSION[$filter["g.menu"]]["filter_browse|nomormhrelasi"]  = $_GET['relasi']."|".$_GET['relasi_no'];
if(isset($_GET['view']))
   $_SESSION[$filter["g.menu"]]["filter_view"]                  = $_GET['view'];

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
$index_filter["field"][$i]["label_class"]                   = "req";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "required";
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
$index_table["column"][$i]["name"]      = "nomor";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "";
$index_table["column"][$i]["align"]     = "right";
$index_table["column"][$i]["width"]     = "";
$i++;
$index_table["column"][$i]["name"] 		= "transaksi_tanggal";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Tanggal";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"]      = "cabang";
$index_table["column"][$i]["sort"]      = "empty";
$index_table["column"][$i]["search"]    = 0;
$index_table["column"][$i]["caption"]   = "Cabang";
$index_table["column"][$i]["align"]     = "";
$index_table["column"][$i]["width"]     = "";
$i++;
$index_table["column"][$i]["name"] 		= "transaksi_kode";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Kode Transaksi";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "pelunasan_kode";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Kode Pelunasan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "keterangan";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"]	= 0;
$index_table["column"][$i]["caption"] 	= "Keterangan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "debit";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Pembelian";
$index_table["column"][$i]["align"] 	= "right";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["number"] 	= "money";
$index_table["column"][$i]["total"] 	= 1;
$i++;
$index_table["column"][$i]["name"] 		= "kredit";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Pembayaran";
$index_table["column"][$i]["align"] 	= "right";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["number"] 	= "money";
$index_table["column"][$i]["total"] 	= 1;
$i++;
$index_table["column"][$i]["name"] 		= "saldo";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Saldo";
$index_table["column"][$i]["align"] 	= "right";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["number"] 	= "money";
$i++;

if(isset($_GET['link'])) 
{
    $awal = DateTime::createFromFormat($_SESSION["setting"]["date"],$_GET["tgl_awal"])->format("Y-m-d");
    $akhir= DateTime::createFromFormat($_SESSION["setting"]["date"],$_GET["tgl_akhir"])->format("Y-m-d");
    $relasi_nomor   = isset($_GET["relasi_no"]) ? $_GET["relasi_no"] : "%";
    $cabang_nomor   = isset($_GET["cabang_no"]) ? $_GET["cabang_no"] : "%";
    $view           = isset($_GET["view"]) ? $_GET["view"] : "CABANG";
    $jenis           = isset($_GET["jenis"]) ? $_GET["jenis"] : "BELI_NOTA";
    $index["query_filter"]  = " CALL rp_hutang(
                                    '".$awal."',
                                    '".$akhir."',
                                    '".$cabang_nomor."',
                                    '".$relasi_nomor."',
                                    0,
                                    0,
                                    '".$view."',
                                    '".$jenis."',
                                    3
                                )";
    $_SESSION[$filter["g.menu"]]["filter_query"] = $index["query_filter"];
}
else
    $index["query_select"]  = "	CALL rp_hutang(
                                    '2000-01-01',
                                    '2000-01-01',
                                    '%',
                                    '%',
                                    0,
                                    0,
                                    'CABANG',
                                    'BELI_NOTA',
                                    3
                                )";
?>