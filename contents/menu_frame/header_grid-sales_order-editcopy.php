<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdjualorder";
$edit["detail"][$i]["field_name"] = array(
    "status_disetujui",
    "kode",
    "nomormhbarang",
    "jumlah_unit",
    "nomormhsatuanunit",
    "dpp",
    "ppn",
    "kirim",
    "sisa",
    "tgltiba|coltemplate_date_1",
    "status_tiba",
    "delivery",
    "close",
    "production",
    "width",
    "height",
    "meter",
    "nomormd",
    "komposisi",
    "berat",
    "total_berat",
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------




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


$edit["field"][$i]["label"] 						= "Nomor PO";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_class"]                 = "required";
$i++;

$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomor|nomormhrelasi",
    "oem|oem"
);
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Tanggal PO";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] 						= "Up";
$edit["field"][$i]["input"] 						= "up";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Toleransi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhtoleransi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "toleransi_customer";
$i++;

$edit["field"][$i]["label"]                     = "Nama Barang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhbarang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barangjadi";
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Pembayaran";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhtop";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_top";
$i++;


$edit["field"][$i]["label"] 					= "Jumlah Warna";
$edit["field"][$i]["input"]						= "jumlah_warna";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Alamat Pengiriman";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormdrelasialamat";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_alamat_pengiriman";
$edit["field"][$i]["browse_set"]["param_input"] = array(
	"a.nomormhrelasi|browse_master_customer_hidden"
);
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomor|nomormdrelasialamat"
);
$i++;


$edit["field"][$i]["label"] 					= "nomormdrelasialamat";
$edit["field"][$i]["input"]						= "nomormdrelasialamat";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Oem";
$edit["field"][$i]["input"]						= "oem";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$i++;


$edit["field"][$i]["label"] 					= "Komposisi";
$edit["field"][$i]["input"]						= "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] 					= "Hari Perjalanan";
$edit["field"][$i]["input"]						= "hari_perjalanan";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "MOQ";
$edit["field"][$i]["input"]						= "moq";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Closed";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "closed";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] 					= "Size";
$edit["field"][$i]["input"]						= "size";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] 					= "Harga";
$edit["field"][$i]["input"]						= "harga";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"] = "Status Tiba";
$edit["field"][$i]["input"] = "status_tiba";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("1|Maju", "0|Mundur");
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'List'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
    'Status',
    'Kode',
    'Jumlah Unit',
    'Dpp',
    'Ppn',
    'Kirim',
    'Sisa',
    'Tanggal Tiba',
    'Status Tiba',
    'Delivery',
    'Close',
    'Production',
    'Width',
    'Height',
    'Meter',
    'Nomor Md',
    'Komposisi',
    'Berat',
    'Total Berat',
    'nomormhbarang',
    'nomormhsatuanunit'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "status_disetujui",
    "kode",
    "jumlah_unit",
    "dpp",
    "ppn",
    "kirim",
    "sisa",
    "tgltiba",
    "status_tiba",
    "delivery",
    "close",
    "production",
    "width",
    "height",
    "meter",
    "nomormd",
    "komposisi",
    "berat",
    "total_berat",
    "nomormhbarang",
    "nomormhsatuanunit"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    status_disetujui:'',
    kode:'',
    jumlah_unit:'',
    dpp:'',
    ppn:'',
    kirim:'',
    sisa:'',
    tgltiba:'',
    status_tiba:'',
    delivery:'',
    close:'',
    production:'',
    width:'',
    height:'',
    meter:'',
    nomormd:'',
    komposisi:'',
    berat:'',
    total_berat:'',
    nomormhbarang:'',
    nomormhsatuanunit:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_disetujui'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_disetujui'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tgltiba'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tgltiba'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_date_1";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_tiba'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_tiba'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";

$j++;



$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'delivery'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'delivery'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'close'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'close'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'production'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'production'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'width'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'width'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'height'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'height'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormd'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'total_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'total_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanunit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanunit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$i++;

// ========================================= END GRID 1 ========================================



$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "10";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;









// ============================== UPLOAD ============================================


// ============================== UPLOAD ============================================


$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT nomor, `directory`, `nama`, category  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		category = 'SALES_ORDER' AND 
		tablename = '$file_tabel' AND 
		filenumber = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Thumbnail/ITEM" . "/" . $json[$count_i]["nama"]));
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
    $edit["field"][$i]["input_save"] = "skip";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $i++;
}

// ========================================================= end test==============================


// ========================================================= end test==============================


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    DATE_FORMAT(a.closed,'" . $_SESSION["setting"]["date_sql"] . "') as closed,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhbarang',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhtop',
    CONCAT(d.toleransi_pengiriman, '|', d.nomor) AS 'browse|nomormhtoleransi',
    CONCAT(e.nama, '|', e.nomor) AS 'browse|nomormhrelasi',
    CONCAT(f.alamat, '|', f.nomor) AS 'browse|nomormdrelasialamat',
    e.oem
    FROM thjualorder a
    left join mhbarang b on b.nomor = a.nomormhbarang
    left join mhtop c on c.nomor = a.nomormhtop
    left join mhrelasi d on d.nomor = a.nomormhtoleransi
    left join mhrelasi e on e.nomor = a.nomormhrelasi
    left join mdrelasialamat f on f.nomor = nomormdrelasialamat
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    , DATE_FORMAT(a.tgltiba,'" . $_SESSION["setting"]["date_sql"] . "') as tgltiba
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



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
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });


    function load_grid_detail()
	{	
	var no = $('#nomorthspk').val();
	
	var pages = 'pages/grid_load.php?id=spk_printing_baru_detail-load&no='+no+'';
	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
	{
		url:pages,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[0]?>_load = 0;
			actGridComplete_<?=$grid_str[0]?>();
		}
	});
	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
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
