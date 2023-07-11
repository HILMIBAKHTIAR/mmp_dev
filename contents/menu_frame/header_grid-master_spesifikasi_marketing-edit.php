<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];




//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspesifikasimarketing";
$edit["detail"][$i]["field_name"] = array(
    "kepala",
    "ekor",
    "kanan",
    "kiri",
    "free",
    "is_arah_baca_roll"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
// $i = 0;
$edit["detail"][$i]["table_name"] = "tdspesifikasimarketing_eyemark";
$edit["detail"][$i]["field_name"] = array(
    "kosong",
    "kanan",
    "kiri",
    "kedua",
    "is_eye_mark"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_2";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;



// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"] 						= "Komposisi";
// $edit["field"][$i]["input"] 						= "komposisi";
// $i++;


$edit["field"][$i]["label"] 					= "Barang";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "barang";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Total Thickness(Mirkon)";
$edit["field"][$i]["input"] 						= "total_thickness";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

// $edit["field"][$i]["label"] 						= "Revisi";
// // $edit["field"][$i]["label_class"] 					= "req";
// $edit["field"][$i]["input"] 						= "nomormhbarangjenis";
// // $edit["field"][$i]["input_class"] 					= "required";
// $edit["field"][$i]["input_element"] 				= "browse";
// $edit["field"][$i]["browse_setting"] 				= "master_jenis_film";
// $i++;


$edit["field"][$i]["label"] 						= "Customer";
// $edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
// $edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_customer";
$i++;


// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"] 						= "Barang Jadi";
// $i++;


$edit["field"][$i]["label"] 					= "Toleransi Waste";
// $edit["field"][$i]["label_class"] 				= "req"; 
$edit["field"][$i]["input"]						= "tolerance_waste";
// $edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Lebar";
$edit["field"][$i]["input"] 						= "lebar";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;


$edit["field"][$i]["label"] 					= "Produk";
$edit["field"][$i]["input"]						= "produk";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Up";
$edit["field"][$i]["input"] 						= "up";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

// $edit["field"][$i]["label"] 						= "Satuan Jual";
// $edit["field"][$i]["input"] 						= "nomormhbarangjenis";
// $edit["field"][$i]["input_element"] 				= "browse";
// $edit["field"][$i]["browse_setting"] 				= "master_jenis_film";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= 1;
// $i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Pitch";
$edit["field"][$i]["input"] 						= "pitch";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;


// $edit["field"][$i]["label"] 						= "Jenis Packaging";
// $edit["field"][$i]["input"] 						= "nomormhbarangjenis";
// $edit["field"][$i]["input_element"] 				= "browse";
// $edit["field"][$i]["browse_setting"] 				= "master_jenis_film";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= 1;
// $i++;

$edit["field"][$i]["form_group"] 					= 0; 
$edit["field"][$i]["label"] 					= "Panjang(M)";
$edit["field"][$i]["input"]						= "panjang";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 					= "Total";
$edit["field"][$i]["input"]						= "total";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;


$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 					= "Estimasi Roll Jadi";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$edit["field"][$i]["input"]						= "estimasi";
$i++;


// $edit["field"][$i]["label"] 					= "FOR SPACE";
// $edit["field"][$i]["input"]						= "barang";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;


// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"] 					= "Panjang(M)";
// $edit["field"][$i]["input"]						= "'panjang'";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;



// $edit["field"][$i]["label"] 					= "FOR SPACE";
// $edit["field"][$i]["input"]						= "barang";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"] 					= "Total";
// $edit["field"][$i]["input"]						= "barang";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Arah Baca Roll'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Kepala',
'Ekor',
'Kanan',
'Kiri',
'Free',
'is_arah_baca_roll'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kepala",
    "ekor",
    "kanan",
    "kiri",
    "free",
    "is_arah_baca_roll"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    kepala:'',
    ekor:'',
    kanan:'',
    kiri:'',
    free:'',
    is_arah_baca_roll:'1'
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kepala'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kepala'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ekor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ekor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kanan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kanan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kiri'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kiri'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'free'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'free'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'is_arah_baca_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'is_arah_baca_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Eye Mark'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Kosong',
'Kanan',
'Kiri',
'Kedua',
'is_eye_mark'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kosong",
    "kanan",
    "kiri",
    "kedua",
    "is_eye_mark"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    kosong:'',
    kanan:'',
    kiri:'',
    kedua:'',
    is_eye_mark:'1'
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kosong'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kosong'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kanan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kanan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kiri'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kiri'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kedua'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kedua'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'is_eye_mark'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'is_eye_mark'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------


$edit["field"][$i]["label"] 					= "Keterangan";
// $edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "keterangan";
// $edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 						= "Status Aktif";
$edit["field"][$i]["input"] 						= "status_aktif";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("1|Aktif", "0|Tidak Aktif");
$i++;


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    FROM thspesifikasimarketing a
    LEFT JOIN mhrelasi b on b.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0 and a.is_arah_baca_roll = 1
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 1
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0 and a.is_eye_mark = 1
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];



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