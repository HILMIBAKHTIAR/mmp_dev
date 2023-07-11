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
    "paket"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



//------------------------------------------------GRID DATA 2------------------------------------------------------
// $i = 0;
$edit["detail"][$i]["table_name"] = "tdspkmesin";
$edit["detail"][$i]["field_name"] = array(
    "nomormhdowntime",
    "lari",
    "persesi",
    "speedmesin",
    "speedstd",
    "overtime"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_mesin";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------


//------------------------------------------------GRID DATA 3------------------------------------------------------
// $i = 0;
$edit["detail"][$i]["table_name"] = "tdspkhasil";
$edit["detail"][$i]["field_name"] = array(
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
    "barang_jadi"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_hasil";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------


//------------------------------------------------GRID DATA 4------------------------------------------------------
// $i = 0;
$edit["detail"][$i]["table_name"] = "tdspkpekerja";
$edit["detail"][$i]["field_name"] = array(
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
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pekerja";
$i++;
//------------------------------------------------END GRID DATA 4------------------------------------------------------



$i = 0;

if(!empty($_GET["a"]) && $_GET["a"] == "view"){
	$edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
}
 else {
	if(isset($_GET["no"])){
		$edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
	}else{
		$edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "ukuran|Ukuran", "info|info");
	}
}


$edit["field"][$i]["box_tab"] = "data";



$edit["field"][$i]["label"] 					= "Nama";
$edit["field"][$i]["input"]						= "nama";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] 					= "Ukuran";
$edit["field"][$i]["input"]						= "ukuran";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Komposisi";
$edit["field"][$i]["input"]						= "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["label"] 					= "jenis";
$edit["field"][$i]["input"]						= "jenis";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;




//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Data'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
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
'nomormhproses'

";
$edit["field"][$i]["grid_set"]["column"] = array(
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
    "nomormhproses"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
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
    nomormhproses:''
}";


$j = 0;

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
$j++;


$i++;

// ============================== END GRID 1======================


//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Mesin'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'GR/M Lari',
'GR/M Persesi',
'Speed Mesin',
'Speed Std',
'Overtime',
'Downtime',
'nomormhdowntime'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "lari",
    "persesi",
    "speedmesin",
    "speedstd",
    "overtime",
    "downtime",
    "nomormhdowntime"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    lari:'',
    persesi:'',
    speedmesin:'',
    speedstd:'',
    overtime:'',
    downtime:'',
    nomormhdowntime:''
}";


$j = 0;

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
$j++;

$i++;

// ============================== END GRID 2======================







//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Hasil'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
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
'Target Barang Jadi'

";
$edit["field"][$i]["grid_set"]["column"] = array(
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
    "targetbarangjadi"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
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
    targetbarangjadi:''
}";


$j = 0;

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

$i++;

// ============================== END GRID 3======================





//-----------------------------------------FRONTEND GRID 4--------------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Pekerja'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
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
$edit["field"][$i]["grid_set"]["column"] = array(
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


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
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


$j = 0;

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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_pegawai }";
$j++;


// ===============================
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorqc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorqc'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorhelper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorhelper2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorhelper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorhelper1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorcolormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorcolormixer2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorcolormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorcolormixer1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomoroperator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomoroperator2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomoroperator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomoroperator1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorsupervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorsupervisor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;

// ============================== END GRID 4======================


// ==============================break======================
$edit["field"][$i]["box_tab"] = "produksi";

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] 					= "Target";
$edit["field"][$i]["input"]						= "target";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Qty Produksi";
$edit["field"][$i]["input"]						= "qtyproduksi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] 					= "Qty Bt";
$edit["field"][$i]["input"]						= "qtybt";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "UP";
$edit["field"][$i]["input"]						= "up";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] 					= "pitch";
$edit["field"][$i]["input"]						= "pitch";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "up produksi";
$edit["field"][$i]["input"]						= "upproduksi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "terbit";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "terbit";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "tanggal produksi";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggalproduksi";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] 					= "verifikasi";
$edit["field"][$i]["input"]						= "verifikasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "closed";
$edit["field"][$i]["input"]						= "closed";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;



// ==============================break======================
$edit["field"][$i]["box_tab"] = "ukuran";

$edit["field"][$i]["label"] 					= "lebar";
$edit["field"][$i]["input"]						= "lebar";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "bahan";
$edit["field"][$i]["input"]						= "bahan";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "rollj";
$edit["field"][$i]["input"]						= "rollj";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "count item";
$edit["field"][$i]["input"]						= "countitem";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;




if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggalproduksi,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalproduksi,
    DATE_FORMAT(a.terbit,'" . $_SESSION["setting"]["date_sql"] . "') as terbit
    FROM thspk a
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
    DATE_FORMAT(a.tanggalselesai,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalselesai
	FROM " . $edit["detail"][0]["table_name"] . " a
    left join mhproses b on b.nomor = a.nomormhproses
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    
    //query grid detail 2
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT
    a.*,
    b.nama downtime
    FROM " . $edit["detail"][1]["table_name"] . " a
    left join mhdowntime b on b.nomor = a.nomormhdowntime
    where a.status_aktif > 0
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 3
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
    where a.status_aktif > 0
    AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 4
    $edit["field"][$grid[3]]["grid_set"]["query"] = "
    SELECT
    a.*,
    b.nama qc,
    c.nama helper2,
    d.nama helper1,
    e.nama colormixer1,
    f.nama colormixer2,
    g.nama operator2,
    h.nama operator1,
    i.nama supervisor
    FROM " . $edit["detail"][3]["table_name"] . " a
    left join mhpegawai b on b.nomor = a.nomorqc
    left join mhpegawai c on c.nomor = a.nomorhelper2
    left join mhpegawai d on d.nomor = a.nomorhelper1
    left join mhpegawai e on e.nomor = a.nomorcolormixer2
    left join mhpegawai f on f.nomor = a.nomorcolormixer1
    left join mhpegawai g on g.nomor = a.nomoroperator2
    left join mhpegawai h on h.nomor = a.nomoroperator1
    left join mhpegawai i on i.nomor = a.nomorsupervisor
    where a.status_aktif > 0
    AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];
    


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