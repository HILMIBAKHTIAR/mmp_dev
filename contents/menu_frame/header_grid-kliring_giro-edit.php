<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["unique"]      = array("kode");

$edit["string_code"] = "kode_kliring_giro";
$edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";

// if ($edit['mode'] == 'add') {
// 	$edit["manual_save_beforecommit"] = "contents/menu_frame/header_grid-kliring_giro-save_beforecommit.php";
// }

$edit["sp_approve"] = "sp_disetujui_kliring_giro";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_kliring_giro";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";




$i = 0;
$edit["detail"][$i]["table_name"]       = "tdkliringgiro";
$edit["detail"][$i]["field_name"]       = array(
	"nomor",
	"nomorthuang",
	"jenis_uang",
	"tanggal",
	"kode",
	"tipe",
	"relasi",
	'kode_account',
	"nama_account",
	'valuta',
	"total_idr",
	"ref_giro",
	'bayar',
	'pembuat'
);

$edit["detail"][$i]["foreign_key"]      = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"]        = "";
$edit["detail"][$i]["grid_id"]          = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;


// SETTING FORM HEADER
$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view"){
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
}
$edit["field"][$i]["box_tab"] = "data";
// SETTING FIELD


$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;
$edit["field"][$i]["label"] = "Status Kliring";
$edit["field"][$i]["input"] = "status_kliring";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("kliring|Kliring Giro", "unkliring|Unkliring Giro");
$i++;
$edit["field"][$i]["label"]                   = "Tanggal Kliring";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "tanggal_kliring";
$edit["field"][$i]["input_class"]             = "required date_1";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "bank";
$edit["field"][$i]["input"] = "bank";
$edit["field"][$i]["input_save"]             = "skip";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_value"] = "1";
$i++;
$edit["field"][$i]["label"] = "Kode Account";
$edit["field"][$i]["input"] = "nomormhaccount";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_kasbank";
$edit["field"][$i]["browse_set"]["param_input"] = array("a.bank|bank");
$i++;
$edit["field"][$i]["label"] = "Jenis Uang";
$edit["field"][$i]["input"] = "jenis_uang";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("uang_masuk|Uang Masuk", "uang_keluar|Uang Keluar");
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_value"] = "Load Detail";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px";
$edit["field"][$i]["input_attr"]["onclick"] = "load_grid_detail()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;
$edit["field"][$i]["label"]              = "Keterangan";
$edit["field"][$i]["input"]              = "keterangan";
$edit["field"][$i]["input_element"]      = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
// $edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;
// END SETTING FIELD
// END SETTING FORM HEADER

$edit = generate_info($edit,$r,"insert|update");

$i = count($edit["field"]);


$edit["fields"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["box_tabs"]                                = array(
    "kliring_giro_detail|List Giro",
);
$edit["field"][$i]["box_tab"]                                 = "kliring_giro_detail";
$grid[0]                                                      = $i;
$edit["field"][$i]["input_element"]                           = "grid";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'List Giro'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "'Tanggal', 'Kode', 'Jenis Uang', 'Tipe', 'Relasi', 'Kode Account', 'Nama Account', 'Valuta', 'Total IDR', 'Ref Giro', 'Bayar', 'Pembuat', 'nomorthuang', 'nomor'";
$edit["field"][$i]["grid_set"]["column"]                      = array(
    "tanggal",
    "kode",
		"jenis_uang",
    "tipe",
		"relasi",
		'kode_account',
		"nama_account",
		'valuta',
    "total_idr",
    "ref_giro",
		'bayar',
		'pembuat',
		"nomorthuang",
		"nomor",
);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{}";
$edit["field"][$i]["grid_set"]["nav_option"]["add"] 			= "false";
$edit["field"][$i]["grid_set"]["var"]["column_unique"]        = "[ 'nomorthuang' ]";
$j                                                            = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'jenis_uang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'jenis_uang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'relasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'relasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'kode_account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'kode_account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nama_account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nama_account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'total_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'total_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'ref_giro'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'ref_giro'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'pembuat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'pembuat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomorthuang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomorthuang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;

// QUERY FOR VIEW AND EDIT
if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal_kliring,'".$_SESSION["setting"]["date_sql"]."') AS tanggal_kliring,
	CONCAT('[', b.kode, '] ', b.nama, '|',b.nomor) as 'browse|nomormhaccount'
	FROM thkliringgiro a
	LEFT JOIN mhaccount b ON a.nomormhaccount = b.nomor
	WHERE a.nomor = ".$_GET["no"];
	if($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


	$edit["field"][$grid[0]]["grid_set"]["query"] = "
		SELECT
			a.*,
			DATE_FORMAT(b.tanggal,'".$_SESSION["setting"]["date_sql"]."') AS tanggal,
			b.kode as kode,
			IF (b.tipe = 0, 'Arus Utama', 'Arus Lain') AS tipe,
			CONCAT(bv3.nama,' - ',bv2.kode,' - ',bv2.nama) AS relasi,
			bac.kode AS 'kode_account',
			bac.nama AS 'nama_account',
			b.total_idr as total_idr,
			bvl.kode AS 'valuta',
			b.giro_ref AS 'ref_giro',
			bad.nama AS pembuat
		FROM tdkliringgiro a
		JOIN ". ($r['jenis_uang'] == 'uang_masuk' ? 'thuangmasuk' : 'thuangkeluar') ." b ON a.nomorthuang = b.nomor AND b.status_aktif > 0
		JOIN mhvaluta bvl ON b.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
		LEFT JOIN mhaccount bac ON b.nomormhaccount = bac.nomor AND bac.status_aktif > 0
		LEFT JOIN mhrelasi bv2 ON b.relasinomor = bv2.nomor AND bv2.status_aktif > 0
		LEFT JOIN mhrelasijenis bv3 ON bv3.nomor = bv2.nomormhrelasijenis AND bv3.status_aktif > 0
		JOIN mhadmin bad ON b.dibuat_oleh = bad.nomor AND bad.status_aktif > 0
		WHERE
			a.status_aktif > 0 
			AND b.status_aktif > 0 
			AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

	

	
	$edit = fill_value($edit,$r);
}
// END QUERY FOR VIEW AND EDIT



// END QUERY FOR VIEW AND EDIT
$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr|print"); 
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

$grid_str = generate_grid_string($edit["field"],$grid);
$grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>

<script type="text/javascript">
	// on document ready
	$(document).ready(function() {
		<?php if($edit['mode'] != 'add') : ?>
			$('#load_grid_detail_button').hide()
		<?php endif; ?>

		var kliring_status = $("#status_kliring").val();

		const tanggalKliringContainer = document.getElementsByName('div_H_i3')[0]
		const accountContainer = document.getElementsByName('div_H_i5')[0]

		const accountField = document.getElementById('browse_master_account_kasbank_search');
		const tanggalKliringField = document.getElementById('tanggal_kliring');

		accountField.required = true

		$('#status_kliring').change(function() {
			if ($('#status_kliring').val() == 'kliring')  {
				tanggalKliringContainer.classList.remove('hiding')

				accountField.required = true
				accountContainer.classList.remove('hiding')
				console.log({accountField})
			} else if ($('#status_kliring').val() == 'unkliring') {
				tanggalKliringContainer.classList.add('hiding')

				accountField.required = false
				accountField.value = null
				document.getElementById('browse_master_account_kasbank_hidden').value = null
				accountContainer.classList.add('hiding')
				console.log({accountField})
			}
		})

		if (kliring_status == 'unkliring') {
			tanggalKliringContainer.classList.add('hiding')
			accountContainer.classList.add('hiding')
		} else {
			tanggalKliringContainer.classList.remove('hiding')
			accountContainer.classList.remove('hiding')
		}
	})
	

	function load_grid_detail() {
		var status_kliring = $('#status_kliring').val() == 'kliring' ? 0 : 1;

		var pages = `pages/grid_load.php?id=kliring_giro_detail-load&status_kliring=${status_kliring}&jenis_uang=${$('#jenis_uang').val()}`;
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
	// HEADER VALIDATION
	function checkHeader()
	{
		var fields = [];
		var check_failed = check_value_elements(fields);
		if(check_failed != '')
			return check_failed;
		else
			return true;
	}
	// END HEADER VALIDATION
	<?=generate_function_checkgrid($grid_str)?>
	<?=generate_function_checkunique($grid_str)?>
	<?=generate_function_realgrid($grid_str)?>
</script>