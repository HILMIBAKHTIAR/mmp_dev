<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspk";
$edit["detail"][$i]["field_name"] = array(
    "nomormhbarangkategori",
    "nomormhproses",
    "nomormhjenisbahanbakutinta",
    "tanggalmulai|coltemplate_date_1",
    "tanggalselesai|coltemplate_date_1",
    "panjangnonstd",
    "berat",
    "itemcodealias",
    "pakaifinal",
    "pakai",
    "penyesuaian",
    "sisaawal",
    "sisaakhir",
    "pakaisisa",
    "uom",
    "nama",
    "group_tinta",
    "kategori",
    "paket",
    "nomormhdowntime",
    "lari",
    "persesi",
    "speedmesin",
    "speedstd",
    "overtime",
    "awalprinting",
    "hasilprinting",
    "awalextru",
    "hasilextru",
    "awaldry1",
    "hasildry1",
    "hasildry2",
    "awalslitting",
    "hasilslitting",
    "awalrewind",
    "processrewind",
    "targetbarangjadi",
    "barang_jadi",
    "nomormhpegawai",
    "process",
    "shift",
    "nomorqc",
    "nomorhelper2",
    "nomorhelper1",
    "nomorcolormixer2",
    "nomorcolormixer1",
    "nomoroperator2",
    "nomoroperator1",
    "nomorsupervisor",
    "catatan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
    }
}


$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$i++;

$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Ukuran";
$edit["field"][$i]["input"]                        = "ukuran";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Komposisi";
$edit["field"][$i]["input"]                        = "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "jenis";
$edit["field"][$i]["input"]                        = "jenis";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




//-----------------------------------------FRONTEND GRID 1--------------------------------

// $edit["fields"][$i]["box_tabs_close"] = 1;

// $edit["field"][$i]["box_tabs"]                                = array(
// 	"order_beli|Pra Order Beli",
// );
// $edit["field"][$i]["box_tab"]                                 = "order_beli";

$grid[0]                                                      = $i;
$edit["field"][$i]["input_element"]                           = "grid";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = "spk_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'Detail'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "	
'Tanggal Mulai',
'Tanggal Selesai',
'Process',
'Nama Item',
'Panjang Non Std',
'Berat (@Roll)',
'Item COde Alias',
'Group Tinta',
'Kategori',
'Paket',
'Pakai Final',
'Pakai',
'Penyesuaian',
'Sisa Awal',
'Sisa Akhir',
'Pakai Sisa',
'UOM',
'nomormhproses',
'GR/M Lari',
'GR/M Persesi',
'Speed Mesin',
'Speed Std',
'Overtime',
'Downtime',
'nomormhdowntime',
'Awal Printing',
'Hasil Printing',
'Awal Extru',
'Hasil Extru',
'Awal Dry',
'Hasil Dry1',
'Hasil Dry2',
'Awal Slitting',
'Hasil Slitting',
'Awal Rewind',
'Proses Rewind',
'Barang Jadi',
'Target Barang Jadi',
'Process',
'Shift',
'Supervisor',
'Operator 1',
'Operator 2',
'Color Mixer 1',
'Color Mixer 2 ',
'Helper 1',
'Helper 2',
'QC',
'Catatan',
'nomorqc',
'nomorhelper2',
'nomorhelper1',
'nomorcolormixer2',
'nomorcolormixer1',
'nomoroperator2',
'nomoroperator1',
'nomorsupervisor'
	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
    "tanggalmulai",
    "tanggalselesai",
    "process",
    "nama",
    "panjangnonstd",
    "berat",
    "itemcodealias",
    "group_tinta",
    "kategori",
    "paket",
    "pakaifinal",
    "pakai",
    "penyesuaian",
    "sisaawal",
    "sisaakhir",
    "pakaisisa",
    "uom",
    "nomormhproses",
    "lari",
    "persesi",
    "speedmesin",
    "speedstd",
    "overtime",
    "downtime",
    "nomormhdowntime",
    "awalprinting",
    "hasilprinting",
    "awalextru",
    "hasilextru",
    "awaldry1",
    "hasildry1",
    "hasildry2",
    "awalslitting",
    "hasilslitting",
    "awalrewind",
    "processrewind",
    "barang_jadi",
    "targetbarangjadi",
    "process",
    "shift",
    "supervisor",
    "operator1",
    "operator2",
    "colormixer1",
    "colormixer2",
    "helper1",
    "helper2",
    "qc",
    "catatan",
    "nomorqc",
    "nomorhelper2",
    "nomorhelper1",
    "nomorcolormixer2",
    "nomorcolormixer1",
    "nomoroperator2",
    "nomoroperator1",
    "nomorsupervisor"

);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{
    tanggalmulai:'',
    tanggalselesai:'',
    process:'',
    nama:'',
    panjangnonstd:'',
    berat:'',
    itemcodealias:'',
    group_tinta:'',
    kategori:'',
    paket:'',
    pakaifinal:'',
    pakai:'',
    penyesuaian:'',
    sisaawal:'',
    sisaakhir:'',
    pakaisisa:'',
    uom:'',
    nomormhproses:'',
    lari:'',
    perseesin:'',
    speedssi:'',
    speedmtd:'',
    overtime:'',
    downtime:'',
    nomormhdowntime:'',
    awalprinting:'',
    hasilprinting:'',
    awalextru:'',
    hasilextru:'',
    awaldry1:'',
    hasildry1:'',
    hasildry2:'',
    awalslitting:'',
    hasilslitting:'',
    awalrewind:'',
    processrewind:'',
    barang_jadi:'',
    targetbarangjadi:'',
    process:'',
    shift:'',
    supervisor:'',
    operator1:'',
    operator2:'',
    colormixer1:'',
    colormixer2:'',
    helper1:'',
    helper2:'',
    qc:'',
    catatan:'',
    nomorqc:'',
    nomorhelper2:'',
    nomorhelper1:'',
    nomorcolormixer2:'',
    nomorcolormixer1:'',
    nomoroperator2:'',
    nomoroperator1:'',
    nomorsupervisor:''
}";

// $edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$j                                                            = 0;
// AUTOCOMPLETE GRID

// =============================================== data ====================================================
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tanggalmulai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tanggalmulai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tanggalselesai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tanggalselesai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_proses }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjangnonstd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjangnonstd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'itemcodealias'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'itemcodealias'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'group_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'group_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kategori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kategori'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'paket'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'paket'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pakaifinal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pakaifinal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pakai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pakai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'penyesuaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'penyesuaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisaawal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisaawal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisaakhir'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisaakhir'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pakaisisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pakaisisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'uom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'uom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

// =============================================== end data ====================================================


// =============================================== mesin ====================================================
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'lari'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'lari'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'persesi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'persesi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'speedmesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'speedmesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'speedstd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'speedstd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'overtime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'overtime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'downtime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'downtime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_downtime }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhdowntime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhdowntime'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

// =============================================== end mesin ====================================================



// =============================================== hasil ====================================================

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awalprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awalprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasilprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasilprinting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awalextru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awalextru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasilextru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasilextru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awaldry1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awaldry1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasildry1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasildry1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasildry2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasildry2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awalslitting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awalslitting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasilslitting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasilslitting'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awalrewind'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awalrewind'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'processrewind'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'processrewind'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'barang_jadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'barang_jadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'targetbarangjadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'targetbarangjadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

// =============================================== end hasil ====================================================


// =============================================== pekerja ====================================================
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'process'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'shift'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'shift'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'supervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'supervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'operator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'operator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'operator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'operator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'colormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'colormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'colormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'colormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'helper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'helper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'helper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'helper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'catatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'catatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorqc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorqc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorhelper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorhelper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorhelper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorhelper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorcolormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorcolormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorcolormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorcolormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomoroperator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomoroperator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomoroperator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomoroperator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorsupervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorsupervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";

$j++;

// =============================================== end pekerja ====================================================


$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'tanggalmulai'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "18";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Data'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'lari'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "7";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Mesin'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'awalprinting'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "13";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Hasil'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'process'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "19";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Pekerja'";
$k++;


$row++;
$i++;

// =================================================== END GRID 1======================================================




// ==============================break======================
$edit["field"][$i]["box_tab"] = "produksi";

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Target";
$edit["field"][$i]["input"]                        = "target";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Qty Produksi";
$edit["field"][$i]["input"]                        = "qtyproduksi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Qty Bt";
$edit["field"][$i]["input"]                        = "qtybt";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "UP";
$edit["field"][$i]["input"]                        = "up";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "pitch";
$edit["field"][$i]["input"]                        = "pitch";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "up produksi";
$edit["field"][$i]["input"]                        = "upproduksi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]       = "terbit";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "terbit";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]       = "tanggal produksi";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggalproduksi";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "verifikasi";
$edit["field"][$i]["input"]                        = "verifikasi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "closed";
$edit["field"][$i]["input"]                        = "closed";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;



// ==============================break======================
$edit["field"][$i]["box_tab"] = "ukuran";

$edit["field"][$i]["label"]                     = "lebar";
$edit["field"][$i]["input"]                        = "lebar";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "bahan";
$edit["field"][$i]["input"]                        = "bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "rollj";
$edit["field"][$i]["input"]                        = "rollj";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "count item";
$edit["field"][$i]["input"]                        = "countitem";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi',
    DATE_FORMAT(a.tanggalproduksi,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalproduksi,
    DATE_FORMAT(a.terbit,'" . $_SESSION["setting"]["date_sql"] . "') as terbit
    FROM thspk a
    join mhrelasi b on a.nomormhrelasi = b.nomor
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    b.nama process,
    DATE_FORMAT(a.tanggalmulai,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalmulai,
    DATE_FORMAT(a.tanggalselesai,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalselesai,
    b.nama downtime,
    d.nama qc,
    f.nama helper2,
    g.nama helper1,
    h.nama colormixer1,
    i.nama colormixer2,
    j.nama operator2,
    k.nama operator1,
    l.nama supervisor
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhproses b on b.nomor = a.nomormhproses
    left join mhdowntime c on c.nomor = a.nomormhdowntime
    left join mhpegawai d on d.nomor = a.nomorqc
    left join mhpegawai f on f.nomor = a.nomorhelper2
    left join mhpegawai g on g.nomor = a.nomorhelper1
    left join mhpegawai h on h.nomor = a.nomorcolormixer2
    left join mhpegawai i on i.nomor = a.nomorcolormixer1
    left join mhpegawai j on j.nomor = a.nomoroperator2
    left join mhpegawai k on k.nomor = a.nomoroperator1
    left join mhpegawai l on l.nomor = a.nomorsupervisor
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>