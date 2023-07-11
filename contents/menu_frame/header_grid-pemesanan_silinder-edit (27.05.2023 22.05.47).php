<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];
$edit["test_code"]    = "kode_test";

// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";




$edit["sp_approve"] = "sp_disetujui_pemesanan_silinder";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_pemesanan_silinder";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "warnasilinder";
$edit["detail"][$i]["field_name"] = array(
    "nomor_silinder",
    "warna",
    "nomorstatus_warna_spare",
    "urutan_unit"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_warna";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "sparesilinder";
$edit["detail"][$i]["field_name"] = array(
    "nomor_silinder",
    "warna",
    "nomorstatus_warna_spare",
    "urutan_unit"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spare";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------





$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view"){
	$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload","info|Info");
}
 else {
	if(isset($_GET["no"])){
		$edit["field"][$i]["box_tabs"] = array("data|Data","upload|Upload");
	}else{
		$edit["field"][$i]["box_tabs"] = array("data|Data");
	}
}

$edit["field"][$i]["box_tab"] = "data";


$query = "SELECT @rownum:=@rownum+1 AS counter
    FROM thspesifikasimarketing t, (SELECT @rownum:=0) r
    ORDER BY counter DESC
    LIMIT 1";

	if ($query > 0)
		echo $query;
	$r = mysqli_fetch_array(mysqli_query($con, $query));




$edit["field"][$i]["label"] = "Kode Angka";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
// $edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;

$edit["field"][$i]["label"] = "NO. FORM";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly"; 
$i++;


$edit["field"][$i]["label"] = "Jenis Pemesanan Silinder";
$edit["field"][$i]["input"] = "jenis";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("REC|REC", "REP|REP", "KC|KC", "PEN|PEN", "SC|SC", "PCC|PCC");
$i++;


$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"] 						= "Kode Barang";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomorthbarang";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_barangV2";
$edit["field"][$i]["browse_set"]["param_output"]     = array("nomormhrelasi|nomormhrelasi", "customer|customer",
"lebar|width", "panjang|panjang", "up|up");
$i++;

$edit["field"][$i]["label"] 					= "nomormhrelasi";
$edit["field"][$i]["input"]						= "nomormhrelasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["form_group_class"] 				= "hiding";
$i++;


$edit["field"][$i]["label"] 					= "Kode Silinder";
$edit["field"][$i]["input"]						= "kode_silinder";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Nomor MD";
$edit["field"][$i]["input"]						= "nomor_md";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Proses";
$edit["field"][$i]["input"]						= "proses";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Customer";
$edit["field"][$i]["input"]						= "customer";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;

$edit["field"][$i]["label"] 						= "Supplier Silinder";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi_supplier";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_supplier_silinder";
$i++;






$edit["field"][$i]["label"] 					= "width";
$edit["field"][$i]["input"]						= "width";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "height";
$edit["field"][$i]["input"]						= "height";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$i++;

$edit["field"][$i]["label"] 					= "up";
$edit["field"][$i]["input"]						= "up";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "pitch";
$edit["field"][$i]["input"]						= "pitch";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;





$edit["field"][$i]["label"] 					= "panjang";
$edit["field"][$i]["input"]						= "panjang";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 1300;
    $edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "circum";
$edit["field"][$i]["input"]						= "circum";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$edit["field"][$i]["input_class"] 				= "iptmoney1";
$i++;


$edit["field"][$i]["label"] = "";
$edit["field"][$i]["input"] = "newbase";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "
    <br> 
    <div class='col-sm-12'>
        <label class='container control-label' style='text-align:left;margin-left: 59px;'> <b> CYLINDER BASE </b><br> 
        <label class='container control-label' style='text-align:left;margin-left: 50px;'> NEW BASE &nbsp;
            <input type='checkbox'  id='newbase' name='newbase'>
            <span class='checkmark' style='top:34%'></span>
        </label>
    </div>
    <br> <br> <br> 
";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('newbase').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;




$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "oldbase";
$edit["field"][$i]["input_element"] = "

    <br> 
 
    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;'> <br> 
    <label class='container control-label' style='text-align:left;margin-left: -150px;'> Old Base &nbsp;&nbsp;
    <input type='checkbox'  id='oldbase' name='oldbase'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('oldbase').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";

$i++;

$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "surface";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> <b> SISI CETAK </b><br> 
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> SURFACE &nbsp;
    <input type='checkbox'  id='surface' name='surface'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('surface').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";

$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "reverse";
$edit["field"][$i]["input_element"] = "
 
    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;'> <br> 
    <label class='container control-label' style='text-align:left;margin-left: -148px;'> Reverse &nbsp;&nbsp;
    <input type='checkbox'  id='reverse' name='reverse'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('reverse').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;

$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "ada";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> <b> BAGIAN TRANSPARAN </b><br> 
    <label class='container control-label' style='text-align:left;margin-left: 90px;'> ADA &nbsp;
    <input type='checkbox'  id='ada' name='ada'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('ada').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "tidakada";
$edit["field"][$i]["input_element"] = "
 
    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;'> <br> 
    <label class='container control-label' style='text-align:left;margin-left: -152px;'> Tidak Ada &nbsp;&nbsp;
    <input type='checkbox'  id='tidakada' name='tidakada'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('tidakada').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;


$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "engrave";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> <b> PROCESSING SYSTEM </b><br> 
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> ENGRAVE &nbsp;
    <input type='checkbox'  id='engrave' name='engrave'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('engrave').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "laser";
$edit["field"][$i]["input_element"] = "
 
    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;'> <br> 
    <label class='container control-label' style='text-align:left;margin-left: -130px;'> Laser &nbsp;&nbsp;
    <input type='checkbox'  id='laser' name='laser'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('laser').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;




$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "ikutexisting";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;margin-left: 105px;'> Ikut Existing &nbsp;
    <input type='checkbox'  id='ikutexisting' name='ikutexisting'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('ikutexisting').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;



$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "mmp";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;margin-left: 59px;'> <b> KEPEMILIKAN </b><br> 
    <label class='container control-label' style='text-align:left;margin-left: 90px;'> MMP &nbsp;
    <input type='checkbox'  id='mmp' name='mmp'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br> 
    

";


$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('mmp').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_col"] 			= "col-sm-6";
$edit["field"][$i]["input"]            = "customer";
$edit["field"][$i]["input_element"] = "

    <div class='col-sm-12'>
    <label class='container control-label' style='text-align:left;'> <b> </b><br> 
    <label class='container control-label' style='text-align:left;margin-left: -157px;'> CUSTOMER &nbsp;
    <input type='checkbox'  id='customer' name='customer'>
    <span class='checkmark' style='top:34%'></span>
    </label>
    </div>

    <br> <br> <br><br><br> 

";

$edit["field"][$i]["script"] = "
    <script>
    document.getElementById('customer').addEventListener('change', function() {
        if (this.checked) {
            // Checkbox is checked, perform actions here
            console.log('Checkbox is checked');
        } else {
            // Checkbox is unchecked, perform actions here
            console.log('Checkbox is unchecked');
        }
    });
    </script>
";
$i++;


$edit["field"][$i]["label"] 					= "Jumlah Silinder";
$edit["field"][$i]["input"]						= "jumlahcilinder";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Perubahan";
$edit["field"][$i]["input"]						= "perubahan";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


// $edit["field"][$i]["label"] 					= "Gambar Tambahan";
// $edit["field"][$i]["input"]						= "gambar_tambahan";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

$edit["field"][$i]["input"] 						= "catatan";
$edit["field"][$i]["input_class"] 					= "";
$edit["field"][$i]["input_col"] 					= "col-sm-6";
$edit["field"][$i]["input_element"] 				= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 			= "10";
$edit["field"][$i]["input_attr"]["cols"] 			= "70";
$edit["field"][$i]["input_attr"]["placeholder"] 	= "catatan";
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Urutan Unit',
'Serial Number',
'Warna',
'Status',
'nomorstatus_warna_spare'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "urutan_unit",
    "nomor",
    "warna",
    "status_silinder",
    "nomorstatus_warna_spare"
);

// $counter = 1;

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    urutan_unit:'',
    nomor:'',
    warna:'',
    status_silinder:'',
    nomorstatus_warna_spare:''
}";


$j = 0;

// $counter++; 

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna_1 }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;


// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Spare'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Urutan Unit',
'Serial Number',
'Warna',
'Status',
'nomorstatus_warna_spare'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "urutan_unit",
    "nomor",
    "warna",
    "status_silinder",
    "nomorstatus_warna_spare"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    urutan_unit:'',
    nomor:'',
    warna:'',
    status_silinder:'',
    nomorstatus_warna_spare:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------






// ============================== UPLOAD ============================================


$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'PEMESANAN_SILINDER' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PEMESANAN_SILINDER" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" .str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


            if ($edit["mode"] != "view")
                // $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="margin-left:10px;color:white;position:relative;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;X&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
            $count_i++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
    $edit["field"][$i]["form_group_class"]       = "hiding";
    $edit["field"][$i]["label"] = "directory";
    $edit["field"][$i]["input"] = "directory";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $i++;
}

$test = $_GET["mmp"];
echo $test;
// ========================================================= end test==============================


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    CONCAT(b.nama_barang_customer, '|', b.kode_barang_customer) AS 'browse|nomorthbarang',
    CONCAT(d.nama, '|', d.kode) AS 'browse|nomormhrelasi_supplier',
    c.nama as customer
	FROM " . $edit["table"] . " a
    left join thbarang b on b.nomor = a.nomorthbarang
    left join mhrelasi c on c.nomor = a.nomormhrelasi
    left join mhrelasi d on d.nomor = a.nomormhrelasi_supplier
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    (@counter := @counter + 1) - 1 AS urutan_unit,
    a.urutan_unit AS original_urutan_unit,
    b.nama AS status_silinder
    FROM " . $edit["detail"][0]["table_name"] . " a
    LEFT JOIN status_warna_spare b ON b.nomor = a.nomorstatus_warna_spare
    CROSS JOIN (SELECT @counter := 0) AS counter_init
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 1
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*,
    b.nama as status_silinder
	FROM " . $edit["detail"][1]["table_name"] . " a
    left join status_warna_spare b on b.nomor = a.nomorstatus_warna_spare
    where a.status_aktif > 0
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=PEMESANAN_SILINDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}
?>

<script type="text/javascript">

    function test() {
            var kode = $("#kode").val();
            var jenis = $('#jenis').val();
            const currentDate = new Date();
            const year = currentDate.getFullYear().toString().substr(-2);
            const month = ('0' + (currentDate.getMonth() + 1)).slice(-2); 
            const code = `${kode}/${jenis}/MMP/${month}/20${year}`;

            $('#kode_custom').val(code);
            
            return code;
        }


    function test_circum() {
        var height = $('#height').val();
        var pitch = $('#pitch').val();
        var circum = height * pitch;
        
        $('#circum').val(circum);
    }
    

    function test_css() {
    // Get the element by its ID
    const element = document.getElementById('kode_custom');

    // Set the CSS style
    element.style.color = 'red';
    element.style.fontSize = '20px';

    
}



    $(document).ready(function() {

        var checkbox = document.getElementById('mmp');
    
        checkbox.addEventListener('change', function() {
            var value = this.checked ? 1 : 0;
            console.log(`The value of MMP checkbox is: ${value}`);
        });


        

        <?php if($r["surface"] == 1){ ?>
			 $('#surface').val(1);
			 $('#surface').attr('checked','checked');
		<?php } ?>

        <?php if($r["newbase"] == 1){ ?>
			 $('#newbase').val(1);
			 $('#newbase').attr('checked','checked');
		<?php } ?>

        <?php if($r["oldbase"] == 1){ ?>
			 $('#oldbase').val(1);
			 $('#oldbase').attr('checked','checked');
		<?php } ?>

        <?php if($r["reverse"] == 1){ ?>
			 $('#reverse').val(1);
			 $('#reverse').attr('checked','checked');
		<?php } ?>

        <?php if($r["ada"] == 1){ ?>
			 $('#ada').val(1);
			 $('#ada').attr('checked','checked');
		<?php } ?>

        <?php if($r["tidakada"] == 1){ ?>
			 $('#tidakada').val(1);
			 $('#tidakada').attr('checked','checked');
		<?php } ?>

        <?php if($r["engrave"] == 1){ ?>
			 $('#engrave').val(1);
			 $('#engrave').attr('checked','checked');
		<?php } ?>

        <?php if($r["laser"] == 1){ ?>
			 $('#laser').val(1);
			 $('#laser').attr('checked','checked');
		<?php } ?>

        <?php if($r["ikutexisting"] == 1){ ?>
			 $('#ikutexisting').val(1);
			 $('#ikutexisting').attr('checked','checked');
		<?php } ?>

        <?php if($r["mmp"] == 1){ ?>
			 $('#mmp').val(1);
			 $('#mmp').attr('checked','checked');
		<?php } ?>

        <?php if($r["customer"] == 1){ ?>
			 $('#customer').val(1);
			 $('#customer').attr('checked','checked');
		<?php } ?>


		<?php if($edit["mode"] == "view"){ ?> 
			$('#surface').attr('readonly','readonly');
			$('#newbase').attr('readonly','readonly');
			$('#oldbase').attr('readonly','readonly');
			$('#reverse').attr('readonly','readonly');
			$('#ada').attr('readonly','readonly');
			$('#tidakada').attr('readonly','readonly');
			$('#engrave').attr('readonly','readonly');
			$('#laser').attr('readonly','readonly');
			$('#ikutexisting').attr('readonly','readonly');
			$('#mmp').attr('readonly','readonly');
			$('#customer').attr('readonly','readonly');
		<?php } ?>

        // $(document).on("click", "#surface", function() {
        // 	if ($(this).is(':checked'))	{ $(this).val(1); }
        // 	else{ $(this).val(0); }
		// });

    //     $(document).on("click", "#surface, #newbase, #oldbase", function() {
    //     if ($(this).is(':checked')) {
    //         $(this).val(1);
    //     } else {
    //         $(this).val(0);
    //     }
    // });

    $(document).on("click", "#newbase, #oldbase", function() {
    if ($(this).is(':checked')) {
        $(this).val(1);
        if ($(this).attr("id") == "newbase") {
            $("#oldbase").attr("disabled", true);
        } else {
            $("#newbase").attr("disabled", true);
        }
    } else {
        $(this).val(0);
        $("#newbase, #oldbase").attr("disabled", false);
    }
});

        
        
        calculate_all();
        test_circum();
        test();

        
    });


	// $(document).ready(function() { 
	// 	calculate_all()
	// })

	function calculate_all()
{
	
	var ppn = $('#ppn').val();
	console.log(ppn);
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(<?php  echo($_SESSION["setting"]["ppn"]); ?>);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(0);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }
}	
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


<?php include "x_tab_data_images_test.php"; ?>


