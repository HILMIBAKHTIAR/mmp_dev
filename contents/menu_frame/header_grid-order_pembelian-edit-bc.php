<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


$edit["sp_approve"] = "sp_disetujui_orderpembelian";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_orderpembelian";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbeliorder";
$edit["detail"][$i]["field_name"] = array(
    "qty",
    "tipe"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "Kategori";
$edit["field"][$i]["input"] 						= "nomormhbarangkategori";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 1;
$i++;

$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;


$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required jqdate_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
if ($query_detail["total"] > 0) {
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;

$edit["field"][$i]["label"] 						= "Supplier";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_relasi";
$i++;


$edit["field"][$i]["label"] 						= "PPN/NON-PPN";
$edit["field"][$i]["input"] 						= "status_aktif";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("1|Ppn", "0|Non-Ppn");
$i++;

$edit["field"][$i]["label"] 						= "Status PPN";
$edit["field"][$i]["input"] 						= "status_aktif";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("1|Include", "0|Exclude");
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Kode Permintaan',
'Kode Barang',
'Nama Barang',
'Qty',
'Satuan',
'Qty',
'Satuan',
'Harga',
'Diskon',
'Sub Total'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kode_permintaan",
    "kode_barang",
    "nama_barang",
    "qty",
    "satuan",
    "jumlah",
    "satuan",
    "harga",
    "diskon_nominal_1",
    "subtotal"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    kode_permintaan:'',
    kode_barang:'',
    nama_barang:'',
    qty:'',
    satuan:'',
    jumlah:'',
    satuan:'',
    harga:'',
    diskon_nominal_1:'',
    subtotal:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'harga'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'harga'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;




// ---------------------------------------END FRONT GRID 1-------------------------------------------------

$edit["field"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["input"] 						= "keterangan";
$edit["field"][$i]["input_class"] 					= "";
$edit["field"][$i]["input_col"] 					= "col-sm-6";
$edit["field"][$i]["input_element"] 				= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 			= "10";
$edit["field"][$i]["input_attr"]["cols"] 			= "70";
$edit["field"][$i]["input_attr"]["placeholder"] 	= "Keterangan";

$edit = generate_summary($edit,"subtotal|diskontotal|ppn|totalakhir", $edit["string_summary"]);
// $edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["detail"][0]["grid_id"]);
//  $edit = generate_summary($edit,"subtotal|diskon1|subtotalakhir|totalakhir|dpp|ppn|totalbayar", $edit["string_summary"]);


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
    CONCAT(e.tipe, '|', e.nomor) AS 'browse|nomormhrelasi',
    from thbeliorder a
    left join mhbarang b on b.nomor = a.nomormhbarang and b.status_aktif > 0
    left join thbelipermintaan d on d.nomor = a.nomorthbelipermintaan and d.status_aktif > 0
    left join mhrelasi e on e.nomor = a.nomormhrelasi and e.status_aktif > 0
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add".check_approval($r,"edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    
function reload_jatuh_tempo(){
	var from 	= $("#tanggal").val();
	from 		= from.replace("/", "-");
	from 		= from.replace("/", "-");
	from 		= from.split("-").reverse().join("-");
	var tgl 	= $("#tanggal").val();
    var date1	= new Date(from);

	var days	= $("#top").val();
	date1.setDate(date1.getDate() + parseInt(days));
	var dd 		= pad(date1.getDate(),2);
	var mm 		= pad(date1.getMonth()+1,2); //January is 0!
	var yyyy 	= date1.getFullYear();
	
	var customtanggaljatuhtempo=dd+'/'+mm+'/'+yyyy;
	var customtanggaljatuhtempo1=dd+'.'+mm+'.'+yyyy;
	var customtanggaljatuhtempo2=mm+'.'+dd+'.'+yyyy;

	// $("#jatuh_tempo").val(customtanggaljatuhtempo);
	// $("#tanggal_jatuh_tempo").val(customtanggaljatuhtempo);
}
function calculate_all()
{
	// var ppn_include = $('#ppn_include').val();
    // if(ppn_include == 1)
    // {
    //     $('#ppn').val(1);
    // }
    // else
    // {
    //     $('#ppn').val(0);
    // }

 	// PPN
	var ppn = $('#ppn').val();
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$edit["string_summary"]?>').val(<?php  echo($_SESSION["setting"]["ppn"]); ?>);
        $('#sum_ppn_<?=$edit["string_summary"]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$edit["string_summary"]?>').val(0);
        $('#sum_ppn_<?=$edit["string_summary"]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }

	<?php if($edit["mode"] != "view") { ?>
		// SUBTOTAL
		var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
		var subtotal_1 = 0;
		if(subtotal_0 !=0 && subtotal_1!=0){
			var subtotal_2 = subtotal_0+subtotal_1;
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_2 );
		}
		else if(subtotal_0 != 0){
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_0 );
		}else if(subtotal_1 !=0){
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_1 );
		}
		calculate_summary_include_ppn('<?=$edit["string_summary"]?>');
		console.log(subtotal_0);
		
		// TOTAL (KURS)
		var total 			= $('#sum_total_<?=$edit["string_summary"]?>').val();
	    var kurs 			= $('#kurs').val();
	    var total_valuta 	= total * kurs;
	    $('#sum_totalvaluta_<?=$edit["string_summary"]?>').val(total_valuta);
    <?php } ?>
}
// END HEADER VALIDATION

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