<?php
$edit["debug"] = 0;
$edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
$edit["unique"] = array();
$edit["string_code"] = "kode_uang_keluar";

if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	CONCAT(b1.kode,'|',b1.nomor) AS 'browse|nomorthuangmasuk',
	CONCAT(ba.kode,' - ',ba.nama,'|',ba.nomor) AS 'browse|nomormhaccount',
	CONCAT(bv.kode,' - ',bv.nama,'|',bv.nomor) AS 'browse|nomormhvaluta'
	FROM " . $edit["table"] . " a
	JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	LEFT JOIN mhvaluta bv ON a.nomormhvaluta = bv.nomor AND bv.status_aktif > 0
	LEFT JOIN thuangmasuk b1 ON a.nomorthuangmasuk = b1.nomor AND b1.status_aktif > 0
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysql_fetch_array(mysql_query($edit["query"]));

	 // $edit["jabatan"] = "
  //       SELECT
  //           b.nama AS jabatan
  //       FROM
  //           mhadmin a
  //       JOIN mhadmingrup b ON a.nomormhadmingrup = b.nomor
  //       WHERE
  //           a.nomor = " . $_SESSION["login"]["nomor"];
  //   $p               = mysql_fetch_array(mysql_query($edit["jabatan"]));
}

$edit["sp_approve"] = "sp_disetujui_thuangkeluar";
$edit["sp_approve_param"] = array(
	"param_nomormhadmin|0", 
	"param_status_disetujui|0", 
	"param_nomor|0", 
	"param_mode|1"
);
$edit["sp_disapprove"] = "sp_disetujui_thuangkeluar";
$edit["sp_disapprove_param"] = array(
	"param_nomormhadmin|0", 
	"param_status_dibatalkan|0", 
	"param_nomor|0", 
	"param_mode|1"
);
$_POST["param_nomormhadmin"]      = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"]  = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"]             = $_GET["no"];
$_POST["param_mode"] = "";

$i = 0;
$edit["detail"][$i]["table_name"] = "tduangkeluar";
$edit["detail"][$i]["field_name"] = array(
	"keterangan",
	"bayar",
	"bayar_idr",
	"subtotal_idr",
	"pph",
	"pph_nominal",
	"subtotal",
	"nomormhformbudget",
	"nomormhaccount",
	"nomormhaccountpph",
	"nomormhkelompokcashflow",
	"nomormhdepartment",
	"nomor"
);

$edit["detail"][$i]["foreign_key"]      = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"]        = "";
$edit["detail"][$i]["grid_id"]          = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
$edit["detail"][$i]["table_name"] = "tduangkeluarselisih";
$edit["detail"][$i]["field_name"] = array(
	"subtotal",
	"subtotal_idr",
	"keterangan",
	"nomor",
	"nomormhaccount");
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_selisih";
$i++;

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Nomor";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] = formatting_code($edit["string_code"]);
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($_SESSION["login"]["level"] > 2) {
// 	$edit["field"][$i]["input_class"] = "required";
// 	if ($edit["mode"] == "add")
// 		$edit["field"][$i]["input_value"] = date("Y-m-d");
// 	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
$i++;
$edit["field"][$i]["label"] = "Metode";
$edit["field"][$i]["input"] = "metode";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("kas|KAS","bank|BANK","giro|GIRO");
if($edit["mode"] != "add")
{
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$edit["field"][$i]["input_save"] = "skip";
}
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Account Kas/Bank";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhaccount";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_kasbank";
$edit["field"][$i]["browse_set"]["param_input"] = array("a.kas|kas","a.bank|bank","a.giro|giro");
$edit["field"][$i]["browse_set"]["param_output"] = array("kode_inisial|account_kode");
if($edit["mode"] != "add")
{
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
	$edit["field"][$i]["input_save"] = "skip";
}
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "account_kode";
$edit["field"][$i]["input"] = "account_kode";
$edit["field"][$i]["input_class"] = "browse_master_account_kasbank_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "kas";
$edit["field"][$i]["input"] = "kas";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "bank";
$edit["field"][$i]["input"] = "bank";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "giro";
$edit["field"][$i]["input"] = "giro";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "giro_section";
$edit["field"][$i]["label"] = "Ref Giro";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "giro_ref";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"] = "giro_section";
$edit["field"][$i]["label"] = "Jatuh Tempo Giro";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "giro_tempo";
$edit["field"][$i]["input_class"] = "date_1_custom";
$i++;
// $edit["field"][$i]["form_group"]                  = 0;
$edit["field"][$i]["label"]                       = "Valuta";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                       = "nomormhvaluta";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]               = "browse";
$edit["field"][$i]["browse_setting"]              = "master_valuta";
$edit["field"][$i]["browse_set"]["param_output"]  = array(
    "kurs|kurs"
);
// $edit["field"][$i]["browse_set"]["param_input"]   = array(
//     "c.tanggal_awal|tanggal|<=",
//     "c.tanggal_akhir|tanggal|>="
// );
// $edit["field"][$i]["browse_set"]["call_function"] = array(
//     "get_kurs"
// );
$i++;
$edit["field"][$i]["form_group"]  = 0;
$edit["field"][$i]["label"]       = "Kurs";
$edit["field"][$i]["input"]       = "kurs";
$edit["field"][$i]["input_class"] = "iptnumber2 browse_master_valuta_clear";
$i++;
$edit["field"][$i]["label"] = "Kas Bon";
// $edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomorthuangmasuk";
// $edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "kas_bon_masuk";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Tipe";
$edit["field"][$i]["input"] = "jenis";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Relasi Kode";
$edit["field"][$i]["input"] = "relasikode";
$edit["field"][$i]["input_class"] = "browse_master_relasi_uang_masuk_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Relasi Nama";
$edit["field"][$i]["input"] = "relasinama";
$edit["field"][$i]["input_class"] = "browse_master_relasi_uang_masuk_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Relasi Tabel";
$edit["field"][$i]["input"] = "relasitabel";
$edit["field"][$i]["input_class"] = "browse_master_relasi_uang_masuk_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                  = "nomormhdepartmentdetail";
$edit["field"][$i]["input"]                  = "nomormhdepartmentdetail";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"]             = "skip";
$i++;

$grid[0] = $i;
$edit["field"][$i]["input_element"] 				 = "grid";
$edit["field"][$i]["grid_set"] 						 = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] 				 = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'Detail Arus Uang Keluar'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'DEPARTMENT',
	'ACCOUNT',
	'BUDGET',
	'CASHFLOW',
	'KETERANGAN',
	'BAYAR',
	'BAYAR IDR',
	'PPH (%)',
	'PPH NOMINAL',
	'ACC PPH',
	'TOTAL BAYAR',
	'TOTAL BAYAR IDR',
	'nomormhaccount',
	'nomormhaccountpph',
	'nomormhkelompokcashflow',
	'nomormhdepartment',
	'nomormhformbudget',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"department",
	"account",
	"budget",
	"cashflow",
	"keterangan",
	"bayar",
	"bayar_idr",
	"pph",
	"pph_nominal",
	"account_pph",
	"subtotal",
	"subtotal_idr",
	"nomormhaccount",
	"nomormhaccountpph",
	"nomormhkelompokcashflow",
	"nomormhdepartment",
	"nomormhformbudget",
	"nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{
	department:'',
	account:'',
	budget:'',
	cashflow:'',
	keterangan:'',
	bayar:'0',
	bayar_idr:'0',
	pph:'0',
	pph_nominal:'0',
	account_pph:'',
	subtotal:'0',
	subtotal_idr:'0',
	nomormhaccount:'',
	nomormhaccountpph:'',
	nomormhkelompokcashflow:'',
	nomormhdepartment:'',
	nomormhformbudget:'',
	nomor:''
	 }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'department'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'department'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_department }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_account }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'budget'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'budget'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_budget }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'cashflow'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'cashflow'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_cashflow }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bayar_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bayar_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pph_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pph_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'account_pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'account_pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_account_pph }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhaccountpph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhaccountpph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkelompokcashflow'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkelompokcashflow'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhdepartment'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhdepartment'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhformbudget'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhformbudget'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// $edit["field"][$i]["label"] = "&nbsp;";
// $edit["field"][$i]["input_element"] = " ";
// $edit["field"][$i]["input"] = "kosong";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
// $edit["field"][$i]["label"] = "&nbsp;";
// $edit["field"][$i]["input_element"] = " ";
// $edit["field"][$i]["input"] = "kosong";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total IDR";
$edit["field"][$i]["input"] = "total_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["label"] = "Bayar";
$edit["field"][$i]["input"] = "bayar";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["onkeyup"] = "hitungBayar()";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Bayar IDR";
$edit["field"][$i]["input"] = "bayar_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["onkeyup"] = "hitungBayarIdr()";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["label"] = "Selisih Bayar";
$edit["field"][$i]["input"] = "selisih_bayar";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Selisih Bayar IDR";
$edit["field"][$i]["input"] = "selisih_bayar_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Selisih'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'ACCOUNT',
	'KETERANGAN',
	'TOTAL',
	'TOTAL IDR',
	'nomormhaccount',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"account",
	"keterangan",
	"subtotal",
	"subtotal_idr",
	"nomormhaccount",
	"nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{
	account:'',
	keterangan:'',
	subtotal:'0',
	subtotal_idr:'0',
	nomormhaccount:'',
	nomor:''
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ ]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_account_selisih}";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal_idr'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "10";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$edit["field"][$i]["input_attr"]["placeholder"] = "Keterangan :";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total Selisih";
$edit["field"][$i]["input"] = "selisih";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total Selisih IDR";
$edit["field"][$i]["input"] = "selisih_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Sisa Bayar";
$edit["field"][$i]["input"] = "sisa_bayar";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Sisa Bayar IDR";
$edit["field"][$i]["input"] = "sisa_bayar_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if ($edit["mode"] != "add") {
	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*, c.nama AS cashflow,
	CONCAT(bc.kode,' - ',bc.nama) AS department,
	CONCAT(ba.kode,' - ',ba.nama) AS account,
	CONCAT(b2.kode,' - ',b2.nama) AS account_pph,
	bg.kode AS budget
	FROM " . $edit["detail"][0]["table_name"] . " a
	LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	LEFT JOIN mhaccount b2 ON a.nomormhaccountpph = b2.nomor AND b2.status_aktif > 0
	LEFT JOIN mhdepartment bc ON bc.nomor=a.nomormhdepartment AND bc.status_aktif >0
	LEFT JOIN mhkelompokcashflow c ON a.nomormhkelompokcashflow = c.nomor
	LEFT JOIN mhformbudget bg ON a.nomormhformbudget = bg.nomor
	WHERE a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

	$edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT a.*,
		CONCAT(ba.kode,' - ',ba.nama) AS account
	FROM " . $edit["detail"][1]["table_name"] . " a
		LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
		WHERE a.status_aktif > 0
		AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

// echo $edit["field"][$grid[0]]["grid_set"]["query"];

	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r);
$features       = "save|back|reload|add" . check_approval($r, "edit|approve|disappr|print");
// $features = "save|back|reload|add" . check_approval($r)
// $features = "save|back|reload|add";
// $features = "save|back|reload|print|add".check_approval($r,"edit|print");
// if ($r["status_disetujui_0"] == 1) {
//     $features = "save|back|reload";
// }

// if (  $p["jabatan"] == "SPV TREASURE") {
// 	if ($r["status_disetujui_0"] == 0) {
// 	    $features                                  = "save|back|reload|approve|edit|add";
// 	    $check_approval_fields["status_disetujui_0"] = "status_disetujui_0";
// 	}
//     if ($r["status_disetujui_0"] == 1 &&  $r["status_disetujui"] == 0) {
//         $features = "back|reload" . check_approval($r, "disappr|add");
//     }
// }
// if ($_SESSION["login"]["nomor"] == 1 || $p["jabatan"] == "FINANCE MANAGER" || $p["jabatan"] == "SPV ACC") {
//     if ($r["status_disetujui_0"] == 1) {
//         $features                                  = "save|back|reload|approve|edit|delete|add";
//         $check_approval_fields["status_disetujui"] = "status_disetujui";
//     }
//     if ($r["status_disetujui"] == 1) {
//         $features = "back|reload" . check_approval($r, "disappr|print");
//     }
// }
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		<?php if($edit["mode"] != "view"){ ?>
		totalidr();
		// hitungBayar();
		hitungBayarIdr();
		totalvaluta();
		hitungBayar();
		
		// $(document).on("change", "#metode", function() {
		// 	metode_value_changed(this);
		// });
		// $("#bayar").keyup(function() {
		// 	totalidr();
		// 	// hitungBayar();
		// 	hitungBayarIdr();
		// });
		// $("#bayar_idr").keyup(function() {
		// 	totalvaluta();
		// 	hitungBayar();
		// 	// hitungBayarIdr();
		// });
		$("#bayar").on("change", function() {
			totalidr();
			// hitungBayar();
			hitungBayarIdr();
		});
		$("#bayar_idr").on("change", function() {
			totalvaluta();
			hitungBayar();
			// hitungBayarIdr();
		});
		$("#browse_master_valuta_reset").click(function(){
			clear_grid();
		});
		$("#kurs").keyup(function() {
			clear_grid();
		});
		$(document).on("change", "#metode", function() {
			metode_value_changed(this);
		});
		$('#metode').change();
		<?php } ?>
	 // <?php if($edit["mode"] != "add") { ?>
  //       var noID = <?php echo $_GET["no"];?>;
  //       if(noID-1==0){
  //           var buttonPrev = '<a class="btn btn-primary btn-app-sm"  title="Previous" onclick="location.href=('+"'?m=<?=$_SESSION["menu_".$_SESSION["g.menu"]]["string"]?>&f=header_grid&&sm=edit&a=view&no="+ (noID-1) +"'"+')" disabled><i class="fa fa-angle-double-left"></i></a>';
  //           $(".bs-example").append(buttonPrev);
  //       }else{
  //           var buttonPrev = '<a class="btn btn-primary btn-app-sm"  title="Previous" onclick="location.href=('+"'?m=<?=$_SESSION["menu_".$_SESSION["g.menu"]]["string"]?>&f=header_grid&&sm=edit&a=view&no="+ (noID-1) +"'"+')"><i class="fa fa-angle-double-left"></i></a>';
  //           $(".bs-example").append(buttonPrev);
  //       }
  //       var buttonNext = '<a class="btn btn-primary btn-app-sm" title="Next" onclick="location.href=('+"'?m=<?=$_SESSION["menu_".$_SESSION["g.menu"]]["string"]?>&f=header_grid&&sm=edit&a=view&no="+ (noID+1) +"'"+')"><i class="fa fa-angle-double-right"></i></a>';
  //       $(".bs-example").append(buttonNext);
  //   <?php } ?>
		// $('#jenis').change();
	});

	// function totalidr() {
	// 	var total_idr = $('#bayar').val();
	// 	var kurs = $('#kurs').val();
	// 	var bayar_idr = total_idr * kurs;
	// 	// console.log (total_global_idr);
	// 	 // parseFloat($("#total").val());

	// 	$("#bayar_idr").val(bayar_idr);
	// 	// var bayar = grand_total - selisih;
	// 	// $('#bayar').val(bayar);
	// }
	// function totalvaluta() {
	// 	var total = $('#bayar_idr').val();
	// 	var kurs = $('#kurs').val();
	// 	var bayar = total / kurs;

	// 	$("#bayar").val(bayar);

	// 	// var bayar = grand_total - selisih;
	// 	// $('#bayar').val(bayar);
	// }
	// function hitungBayar() {
	// 	var total = $('#total').val();
	// 	var bayar1 = $('#bayar').val();
	// 	var selisih = $('#selisih').val();
	// 	// var selisih_bayar = $('#selisih_bayar').val();
	// 	// var sisa_bayar = selisih_bayar -  selisih;
	// 	// var selisih_bayar = bayar1 - total;
	// 	// $('#sisa_bayar').val(sisa_bayar);
	// 	// $('#selisih_bayar').val(selisih_bayar);
	// 	var selisih_bayar = $('#selisih_bayar').val();
	// 	// var sisa_bayar = selisih_bayar -  selisih;
	// 	var selisih_bayar1 = bayar1 - total;
	// 	var total_selisih =  Math.abs(selisih_bayar1);
	// 	// $('#sisa_bayar').val(sisa_bayar);
	// 	$('#selisih_bayar').val(total_selisih);
	// 	// console.log(total);
	// 	// console.log(bayar1);
	// 	// 	console.log(selisih);
	// 	// 	console.log(selisih_bayar);
	// 	// 	console.log(sisa_bayar);

	// }
	// function hitungBayarIdr() {
	// 		var total_idr = $('#total_idr').val();
	// 	var total_global_idr = $('#total_global_idr').val();
	// 	total_global_idr = total_global_idr*1;
	// 	var selisih_idr = $('#selisih_idr').val();
	// 	var grand_total_idr = total_idr - total_global_idr;

	// 	$("#grand_total_idr").val(grand_total_idr);

	// 	var bayar_idr = grand_total_idr - selisih_idr;
	// 	$('#bayar_idr').val(bayar_idr);
	// 	// var total_idr = $('#total_idr').val();
	// 	// var bayar1 = $('#bayar_idr').val();
	// 	// var selisih_bayar_idr = $('#selisih_bayar_idr').val();
	// 	// var selisih_idr = $('#selisih_idr').val();
	// 	// // var sisa_bayar_idr = selisih_bayar_idr -  selisih_idr;
	// 	// var selisih_idr_bayar1 = bayar1 - total_idr;
	// 	// var total_selisih_idr =  Math.abs(selisih_idr_bayar1);
	// 	// // $('#sisa_bayar_idr').val(sisa_bayar_idr);
	// 	// $('#selisih_bayar_idr').val(total_selisih_idr);
	// 	// var selisih_idr = $('#selisih_idr').val();
	// 	// var sisa_bayar_idr = selisih_bayar_idr -  selisih_idr;
	// 	// var selisih_idr_bayar = bayar1 - total_idr;
	// 	// $('#sisa_bayar_idr').val(sisa_bayar_idr);
	// 	// $('#selisih_bayar_idr').val(selisih_idr_bayar);
	// 	// console.log(total_idr);
	// 	// 	console.log(bayar1);
	// 	// 	console.log(selisih_idr_bayar);
	// }
	function totalidr() {
		var total_idr = $('#bayar').val();
		var kurs = $('#kurs').val();
		var bayar_idr = total_idr * kurs;
		// console.log (total_global_idr);
		 // parseFloat($("#total").val());

		$("#bayar_idr").val(bayar_idr);
		// var bayar = grand_total - selisih;
		// $('#bayar').val(bayar);
	}
	function totalvaluta() {
		var total = $('#bayar_idr').val();
		var kurs = $('#kurs').val();
		var bayar = total / kurs;

		$("#bayar").val(bayar);

		// var bayar = grand_total - selisih;
		// $('#bayar').val(bayar);
	}
	function hitungBayar() {
		var total = $('#total').val();
		var bayar1 = $('#bayar').val();
		var selisih = $('#selisih').val();
		var selisih_bayar = $('#selisih_bayar').val();
		// var sisa_bayar = selisih_bayar -  selisih;
		var selisih_bayar1 = bayar1 - total;
		var total_selisih =  Math.abs(selisih_bayar1);
		// $('#sisa_bayar').val(sisa_bayar);
		$('#selisih_bayar').val(total_selisih);
		// console.log(total);
		// 	console.log(bayar1);
		// 	console.log(selisih_bayar);
	}
	function hitungBayarIdr() {
		var total_idr = $('#total_idr').val();
		var bayar1 = $('#bayar_idr').val();
		var selisih_bayar_idr = $('#selisih_bayar_idr').val();
		var selisih_idr = $('#selisih_idr').val();
		// var sisa_bayar_idr = selisih_bayar_idr -  selisih_idr;
		var selisih_idr_bayar1 = bayar1 - total_idr;
		var total_selisih_idr =  Math.abs(selisih_idr_bayar1);
		// $('#sisa_bayar_idr').val(sisa_bayar_idr);
		$('#selisih_bayar_idr').val(total_selisih_idr);
		// console.log(total_idr);
		// 	console.log(bayar1);
		// 	console.log(selisih_idr_bayar);
	}

	function clear_grid()
	{
		jQuery(<?=$grid_elm[0]?>).jqGrid("clearGridData");
		jQuery(<?=$grid_elm[1]?>).jqGrid("clearGridData");
	}

	function metode_value_changed(obj) {
		<?php if ($edit["mode"] == "add") { ?>
			if ($(obj).val() == 'kas') {
				$('#kas').val(1);
				$('#bank').val(0);
				$('#giro').val(0);
			} else if ($(obj).val() == 'bank') {
				$('#kas').val(0);
				$('#bank').val(1);
				$('#giro').val(0);
			} else if ($(obj).val() == 'giro') {
				$('#kas').val(0);
				$('#bank').val(0);
				$('#giro').val(1);
			} else {
				$('#kas').val(0);
				$('#bank').val(0);
				$('#giro').val(0);
			}
			browse_clear('master_account_uang_header');
		<?php } ?>

		if ($(obj).val() == 'giro') {
			$('.giro_section').show();
		} else {
			$('.giro_section').hide();
		}
	}

	function jenis_value_changed(obj) {
		if ($(obj).val() == '1') {
			<?php if ($edit["mode"] != "view") { ?>
				browse_clear('master_account_uang_lain');
			<?php } ?>
			$('.lain_section').hide();
			$('.utama_section').show();
		} else {
			<?php if ($edit["mode"] != "view") { ?>
				browse_clear('master_relasi_uang_keluar');
			<?php } ?>
			$('.utama_section').hide();
			$('.lain_section').show();

		}
	}

	function checkSave() {
		var check_failed = '';

		var metode = $('#metode').val();
		var giro_ref = $('#giro_ref').val();
		var giro_tempo = $('#giro_tempo').val();
		var selisih_bayar = $('#selisih_bayar').val();
		var grand_total = $('#grand_total').val();
		var selisih = $('#selisih').val();
		var jenis = $('#jenis').val();
		var master_relasi_uang_keluar = $('#browse_master_relasi_uang_keluar_hidden').val();
		var master_account_uang_lain = $('#browse_master_account_uang_lain_hidden').val();

		if (metode == 'giro' && giro_ref == '')
			check_failed += '- Ref Giro wajib diisi\n\n';
		if (metode == 'giro' && giro_tempo == '')
			check_failed += '- Jatuh Tempo Giro wajib diisi\n\n';
		if (jenis == '1' && master_relasi_uang_keluar == '')
			check_failed += '- Supplier wajib diisi\n\n';
		if ((selisih_bayar - selisih) != 0)
				check_failed += '- Total Bayar tidak sama dengan selisih\n\n';
		// if (grand_total != selisih)
		// 	check_failed += '- Total Bayar tidak sama dengan selisih\n\n';
		// if ((selisih_bayar - selisih) != 0)
		// 	check_failed += '- Total Bayar tidak sama dengan selisih\n\n';
		// if ((selisih_bayar - selisih) != 0)
		// 		check_failed += '- Total Bayar tidak sama dengan selisih\n\n';
		/*if(jenis == '0' && master_account_uang_lain == '')
		 	check_failed += '- Account Tujuan wajib diisi\n\n';*/

		if (check_failed != '')
			alert(check_failed);
		else
			return true;
	}

	function checkHeader() {
		var fields = [
			"tanggal|Tanggal", "browse_master_relasi_hidden|Supplier"
		];
		var check_failed = check_value_elements(fields);
	if(check_failed != '')
		return check_failed;
	else
		return true;
	}
	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>
