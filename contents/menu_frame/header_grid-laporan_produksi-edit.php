<?php
$edit["debug"]       = 0;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$i = 0;
//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanprinting_1";
$edit["detail"][$i]["field_name"] = array(
    "no_dus",
    "panjang",
    "no_rest",
    "jumlah_hasil",
    "waste",
    "sisa",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_1";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanprinting_2";
$edit["detail"][$i]["field_name"] = array(
    "persiapan",
    "menit|jqtime_1",
    "jenis_waste",
    "meter"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_2";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanprinting_3";
$edit["detail"][$i]["field_name"] = array(
    "no_cyl",
    "jenis_warna",
    "sisa_awal_baru",
    "permintaan_baru",
    "sisa_akhir_baru",
    "pakai_baru",
    "sisa_awal_bekas",
    "permintaan_bekas",
    "sisa_akhir_bekas",
    "pakai_bekas",
    "total_pemakaian"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_3";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------



//------------------------------------------------GRID DATA 4------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanprinting_4";
$edit["detail"][$i]["field_name"] = array(
    "komposisi_bahan",
    "jumlah_permintaan",
    "jumlah_hasil"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_4";
$i++;
//------------------------------------------------END GRID DATA 4------------------------------------------------------




//------------------------------------------------GRID DATA 5------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanprinting_5";
$edit["detail"][$i]["field_name"] = array(
    "pemakaian",
    "jumlah",
    "nomorheadergrid"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_5";
$i++;
//------------------------------------------------END GRID DATA 5------------------------------------------------------







$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}


$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["label"]                     = "No. SPK";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_spk";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"customer|customer",
	"nomormhrelasi|nomormhrelasi"
);
if ($edit["mode"] == "add")
    $edit["field"][$i]["browse_set"]["call_function"] = array(
        "load_grid_detail", "load_grid_detail2"
    );
$i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "Shift";
$edit["field"][$i]["input"]                        = "shift";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Mesin";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhmesin";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_mesin";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Produk";
$edit["field"][$i]["input"]                        = "jenis_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Bahan";
$edit["field"][$i]["input"]                        = "jenis_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Lebar bahan (mm)";
$edit["field"][$i]["input"]                        = "lebar";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;

$edit["field"][$i]["label"]                     = "Jumlah warna";
$edit["field"][$i]["input"]                        = "jumlah_warna";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;

$edit["field"][$i]["label"]                     = "Arah Glungan";
$edit["field"][$i]["input"]                        = "arah_gulungan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Order Cetak";
$edit["field"][$i]["input"]                        = "order_cetak";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;

$edit["field"][$i]["label"]                     = "Sisa Cetak";
$edit["field"][$i]["input"]                        = "sisa_cetak";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;


$edit["field"][$i]["label"]                     = "Spees Mesin";
$edit["field"][$i]["input"]                        = "speed";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;


$edit["field"][$i]["label"]       = "Mulai Proses";
$edit["field"][$i]["input"]       = "mulai_proses";
$edit["field"][$i]["input_class"] = "required jqtime_1";
$i++;

$edit["field"][$i]["label"]       = "Selesai Proses";
$edit["field"][$i]["input"]       = "selesai_proses";
$edit["field"][$i]["input_class"] = "required jqtime_1";
$i++;


$edit["field"][$i]["label"] 					= "Customer";
$edit["field"][$i]["input"]						= "customer";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$i++;


$edit["field"][$i]["label"] 					= "nomormhrelasi";
$edit["field"][$i]["input"]						= "nomormhrelasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'DETAIL'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'No. Dus',
'Panjang',
'No. Rest',
'Jumlah Hasil',
'Waste',
'Sisa',
'Keterangan'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "no_dus",
    "panjang",
    "no_rest",
    "jumlah_hasil",
    "waste",
    "sisa",
    "keterangan"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    no_dus:'',
    panjang:'',
    no_rest:'',
    jumlah_hasil:'',
    waste:'',
    sisa:'',
    keterangan:''
}";


// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

// $counter++;  
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_dus'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_dus'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_rest'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'toleransi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'waste'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'waste'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;



$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_dus'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Pemeriksaan Bahan'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_rest'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Setelah Printing'";
$k++;

$row++;

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'DOWNTIME 2'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Persiapan',
'Menit',
'Jenis Waste',
'Meter'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "persiapan",
    "menit",
    "jenis_waste",
    "meter"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    persiapan:'',
    menit:'',
    jenis_waste:'',
    meter:''
}";

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'persiapan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'persiapan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'menit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'menit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_jqtime_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis_waste'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis_waste'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$row                                                                                         = 0;
$k                                                                                                = 0;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'persiapan'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Down Time'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'jenis_waste'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Waste'";
$k++;


$row++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------




//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'PEMAKAIAN TINTA'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'No. Cyl',
'Jenis Warna',
'Sisa Awal',
'Permintaan',
'Sisa Akhir',
'Pakai',
'Sisa Awal',
'Permintaan',
'Sisa Akhir',
'Pakai',
'(Baru + Bekas)'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "no_cyl",
    "jenis_warna",
    "sisa_awal_baru",
    "permintaan_baru",
    "sisa_akhir_baru",
    "pakai_baru",
    "sisa_awal_bekas",
    "permintaan_bekas",
    "sisa_akhir_bekas",
    "pakai_bekas",
    "total_pemakaian"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    no_cyl:'',
    jenis_warna:'',
    sisa_awal_baru:'',
    permintaan_baru:'',
    sisa_akhir_baru:'',
    pakai_baru:'',
    sisa_awal_bekas:'',
    permintaan_bekas:'',
    sisa_akhir_bekas:'',
    pakai_bekas:'',
    total_pemakaian:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_cyl'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_cyl'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis_warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis_warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa_awal_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa_awal_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'permintaan_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'permintaan_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa_akhir_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa_akhir_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pakai_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pakai_baru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa_awal_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa_awal_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'permintaan_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'permintaan_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa_akhir_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa_akhir_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pakai_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pakai_bekas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'total_pemakaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'total_pemakaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;


$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'sisa_awal_baru'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "4";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Tinta Baru (Kg)'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'sisa_awal_bekas'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "4";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Tinta Bekas (Kg)'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'total_pemakaian'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "1";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Total Pemakaian (Kg)'";
$k++;

$row++;

$i++;
// ---------------------------------------END FRONT GRID 3-------------------------------------------------






//-----------------------------------------FRONTEND GRID 4--------------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'PEMAKAIAN BAHAN (ROLL FILM)'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Komposisi Bahan',
'Jumlah Permintaan (meter)',
'Jumlah hasil (meter)'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "komposisi_bahan",
    "jumlah_permintaan",
    "jumlah_hasil"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    komposisi_bahan:'',
    jumlah_permintaan:'',
    jumlah_hasil:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 4-------------------------------------------------



//-----------------------------------------FRONTEND GRID 5--------------------------------
$grid[4] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'PEMAKAIAN SOLVENT'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'',
'',
'nomorheadergrid'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "pemakaian",
    "jumlah",
    "nomorheadergrid"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    pemakaian:'',
    jumlah:'',
    nomorheadergrid:''
}";

$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pemakaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pemakaian'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 5-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomorthspk'
    , CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhmesin'
    , d.nama customer
    FROM thlaporanprinting a
    left join thspk b on b.nomor = a.nomorthspk
    left join mhmesin c on c.nomor = a.nomormhmesin
    left join mhrelasi d on d.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];
    echo  $edit["field"][$grid[0]]["grid_set"]["query"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];
    // echo  $edit["field"][$grid[1]]["grid_set"]["query"];

    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[3]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][3]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[4]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][4]["table_name"] . " a
    join headergrid b on b.nomor = a.nomorheadergrid
    WHERE a.status_aktif = 1 and a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];


    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    // setTimeout(function() {
    //     load_grid_detail();
    // }, 100);


    <?php if ($edit["mode"] == "view") : ?>
            <
            script >
            $(document).ready(function() {
                $('#jqgh_pengecekan_incoming_bahan_baku_detail_visual_grid_aktual_sample_1').prop('disabled', true);
            });
    <?php endif; ?>


    $(document).ready(function() {

    });


    function load_grid_detail() {

        var pages = 'pages/grid_load.php?id=laporan_produksi_detail_2-load';
        jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[1] ?>_load = 0;
                actGridComplete_<?= $grid_str[1] ?>();
            }
        });
        jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');

    }


    function load_grid_detail2() {
        var pages2 = 'pages/grid_load.php?id=laporan_produksi_detail_5-load';
        jQuery(<?= $grid_elm[4] ?>).jqGrid('setGridParam', {
            url: pages2,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[4] ?>_load = 0;
                actGridComplete_<?= $grid_str[4] ?>();
            }
        });
        jQuery(<?= $grid_elm[4] ?>).trigger('reloadGrid');

    }





    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>