<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];






// //------------------------------------------------GRID DATA 1------------------------------------------------------
// $i = 0;
// $edit["detail"][$i]["table_name"] = "tdqapbahanbaku_specification";
// $edit["detail"][$i]["field_name"] = array(
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10",
//     "metode",
//     "result",
//     "nomorheadergrid"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_specification";
// $i++;
// //------------------------------------------------END GRID DATA 1------------------------------------------------------


// //------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdqapbahanbaku_visual";
// $edit["detail"][$i]["field_name"] = array(
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10",
//     "metode",
//     "nomorheadergrid"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_visual";
// $i++;
// //------------------------------------------------END GRID DATA 2------------------------------------------------------



// //------------------------------------------------GRID DATA 3------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdqapbahanbaku_other";
// $edit["detail"][$i]["field_name"] = array(
//     "defects",
//     "parameter",
//     "toleransi",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10",
//     "result"

// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_other";
// $i++;
// //------------------------------------------------END GRID DATA 3------------------------------------------------------






$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
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


$edit["field"][$i]["label"]                     = "NO SJ";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthbelinota";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "penerimaan_barang";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "supplier|supplier",
    "tanggal_kedatangan|tanggal_kedatangan"
);
// if ($edit["mode"] == "add")
//     $edit["field"][$i]["browse_set"]["call_function"] = array(
//         "load_grid_detail2", "load_grid_detail"
//     );
$i++;

$edit["field"][$i]["label"]                     = "supplier";
$edit["field"][$i]["input"]                        = "supplier";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Material";
$edit["field"][$i]["input"]                        = "material";
$i++;


$edit["field"][$i]["label"]                     = "Lot Number";
$edit["field"][$i]["input"]                        = "lot_number";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Qty Kedatangan";
$edit["field"][$i]["input"]                        = "qty_kedatangan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Qty Pengecekan";
$edit["field"][$i]["input"]                        = "qty_pengecekan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]       = "Tanggal Kedatangan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_kedatangan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"]       = "Tanggal Pengecekan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_pengecekan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;



// //-----------------------------------------FRONTEND GRID 1--------------------------------
// $grid[0] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'SPECIFICATION TEST'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Spesifikasi',
// 'Standart',
// 'Toleransi',
// '1',
// '2',
// '3',
// '4',
// '5',
// 'Metode',
// 'Result',
// 'nomorheadergrid'

// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "spesifikasi",
//     "standart",
//     "toleransi",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "metode",
//     "result",
//     "nomorheadergrid"
// );

// // $counter = 1;

// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     spesifikasi:'',
//     standart:'',
//     toleransi:'',
//     aktual_sample_1:'',
//     aktual_sample_2:'',
//     aktual_sample_3:'',
//     aktual_sample_4:'',
//     aktual_sample_5:'',
//     metode:'',
//     result:'',
//     nomorheadergrid:''
// }";


// // $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// // $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
// $j = 0;

// // $counter++;  
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'spesifikasi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'spesifikasi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'standart'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'standart'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'toleransi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'toleransi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'metode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'metode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
// $j++;

// $row                                                                                         = 0;
// $k                                                                                                = 0;


// $edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "5";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Aktual Sampel'";
// $k++;

// $row++;

// $i++;


// // ---------------------------------------END FRONT GRID 1-------------------------------------------------




// //-----------------------------------------FRONTEND GRID 2--------------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'VISUAL CHECK'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Defecets/ Deviation',
// '1',
// '2',
// '3',
// '4',
// '5',
// '6',
// '7',
// '8',
// '9',
// '10',
// 'Result',
// 'nomorheadergrid',
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "defects",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10",
//     "result",
//     "nomorheadergrid"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     defects:'',
//     aktual_sample_1:'',
//     aktual_sample_2:'',
//     aktual_sample_3:'',
//     aktual_sample_4:'',
//     aktual_sample_5:'',
//     aktual_sample_6:'',
//     aktual_sample_7:'',
//     aktual_sample_8:'',
//     aktual_sample_9:'',
//     aktual_sample_10:'',
//     result:'',
//     nomorheadergrid:''
// }";

// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
// $j++;


// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
// $j++;

// $row                                                                                         = 0;
// $k                                                                                                = 0;


// $edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Aktual Sampel'";
// $k++;

// $row++;

// $i++;
// // ---------------------------------------END FRONT GRID 2-------------------------------------------------




// //-----------------------------------------FRONTEND GRID 3--------------------------------
// $grid[2] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'OTHER CHECK'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PARAMETERS/NAMA ALAT CEK',
// 'DEFECTS/DEVIATION',
// 'TOLERANSI',
// '1',
// '2',
// '3',
// '4',
// '5',
// '6',
// '7',
// '8',
// '9',
// '10',
// 'RESULT'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "parameter",
//     "defects",
//     "toleransi",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "aktual_sample_6",
//     "aktual_sample_7",
//     "aktual_sample_8",
//     "aktual_sample_9",
//     "aktual_sample_10",
//     "result"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     parameter:'',
//     defects:'',
//     toleransi:'',
//     aktual_sample_1:'',
//     aktual_sample_2:'',
//     aktual_sample_3:'',
//     aktual_sample_4:'',
//     aktual_sample_5:'',
//     aktual_sample_6:'',
//     aktual_sample_7:'',
//     aktual_sample_8:'',
//     aktual_sample_9:'',
//     aktual_sample_10:'',
//     result:''
// }";


// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'defects'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'toleransi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'toleransi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_6'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_7'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_8'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_9'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_10'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;


// $row                                                                                         = 0;
// $k                                                                                                = 0;


// $edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Aktual Sampel'";
// $k++;

// $row++;

// $i++;
// // ---------------------------------------END FRONT GRID 3-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal_pengecekan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_pengecekan
    , DATE_FORMAT(a.tanggal_kedatangan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kedatangan
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    , CONCAT(c.supplier_sj_nomor, '|', c.nomor) AS 'browse|nomorthbelinota'
    FROM thqappapercore a
    left join mhrelasi b on b.nomor = a.nomormhrelasi
    left join thbelinota c on a.nomorthbelinota = c.nomor
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    , b.spesifikasi
    , b.standart
    , b.toleransi
    FROM " . $edit["detail"][0]["table_name"] . " a
    join headergrid b on b.nomor = a.nomorheadergrid 
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    echo $edit["field"][$grid[0]]["grid_set"]["query"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
    , b.defects
    FROM " . $edit["detail"][1]["table_name"] . " a
    join headergrid b on b.nomor = a.nomorheadergrid 
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

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
</script>
<?php endif; ?>


$(document).ready(function() {

});


function load_grid_detail()
{

var pages = 'pages/grid_load.php?id=pengecekan_incoming_paper_core_detail_specification-load';
jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam',
{
url:pages,
datatype:'json',
loadComplete:function(data)
{
<?= $grid_str[0] ?>_load = 0;
actGridComplete_<?= $grid_str[0] ?>();
}
});
jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');

}


function load_grid_detail2()
{
var pages2 = 'pages/grid_load.php?id=pengecekan_incoming_paper_core_detail_visual-load';
jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam',
{
url:pages2,
datatype:'json',
loadComplete:function(data)
{
<?= $grid_str[1] ?>_load = 0;
actGridComplete_<?= $grid_str[1] ?>();
}
});
jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');

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