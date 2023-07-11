<?php
$edit["debug"] = 0;
$edit["unique"] = array("");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["string_code"] = "kode_keuangan_saldo_awal_aset";

// $edit["sp_approve"] = "sp_disetujui_mhaset";
// $edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
// $edit["sp_disapprove"] = "sp_disetujui_mhaset";
// $edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
// $_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
// $_POST["param_status_disetujui"] = 1;
// $_POST["param_status_dibatalkan"] = 0;
// $_POST["param_nomor"] = $_GET["no"];
// $_POST["param_mode"] = "";

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Nomor";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Tanggal";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "tanggal";
// $edit["field"][$i]["input_class"] = "required date_1_custom";
// if($_SESSION["login"]["level"] >= $_SESSION["setting"]["level_backdate"])
// {
// 	$edit["field"][$i]["input_class"] = "required";
// 	if($edit["mode"] == "add")
// 		$edit["field"][$i]["input_value"] = date("Y-m-d");
// 	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
// $i++;

$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "temp_tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_save"] = "skip";
if($_SESSION["menu_".$_SESSION["g.menu"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    // if($edit["mode"] == "add")
    //     $edit["field"][$i]["input_value"] = date("d-m-Y");
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]                     = "Tanggal";
$edit["field"][$i]["label_class"]               = "req";
$edit["field"][$i]["input"]                     = "tanggal";
$edit["field"][$i]["input_class"]               = "required date_1";
if($_SESSION["menu_".$_SESSION["g.menu"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    if($edit["mode"] == "add")
        $edit["field"][$i]["input_value"] = date("Y-m-d");
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;

$edit["field"][$i]["label"] = "Nama Aset";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nama";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Nilai Perolehan (Rp)";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "perolehan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$i++;
$edit["field"][$i]["label"]                         = "Kategori Aset";
$edit["field"][$i]["label_class"]                   = "req";
$edit["field"][$i]["input"]                         = "nomormhkategoriaset";
$edit["field"][$i]["input_class"]                   = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                = "master_kategori_barang";
$i++;
$edit["field"][$i]["form_group"] = 0;

$edit["field"][$i]["label"] = "Tgl Mulai Penyusutan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "temp_tanggal_mulai_penyusutan";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_save"] = "skip";
if($_SESSION["menu_".$_SESSION["g.menu"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    // if($edit["mode"] == "add")
    //     $edit["field"][$i]["input_value"] = date("d-m-Y");
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;

$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]                     = "Tgl Mulai Penyusutan";
$edit["field"][$i]["label_class"]               = "req";
$edit["field"][$i]["input"]                     = "tanggal_mulai_penyusutan";
$edit["field"][$i]["input_class"]               = "required date_1";
if($_SESSION["menu_".$_SESSION["g.menu"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    if($edit["mode"] == "add")
        $edit["field"][$i]["input_value"] = date("Y-m-d");
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;


// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Tarif %";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "tarif";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "iptinteger";
// // $edit["field"][$i]["input_class"] = $_SESSION["setting"]["percent"];
// $i++;
// $edit["field"][$i]["label"] = "Nilai Sisa";
// $edit["field"][$i]["input"] = "penyusutan_sisa";
// $edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Total Penyusutan";
// $edit["field"][$i]["input"] = "penyusutan_total";
// $edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
// $i++;
// $edit["field"][$i]["label"] = "Kategori Aset";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "nomormhkategoriaset";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_aset_kategori";
// $edit["field"][$i]["browse_set"]["param_output"] = array("account|account",
// "nomormhaccountaset|nomormhaccountaset"
// );
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Account Aset";
// $edit["field"][$i]["input"] = "account";
// $edit["field"][$i]["input_class"] = "browse_master_aset_kategori_clear";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Kode Acc. Aset";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "nomormhaccountaset";
// $edit["field"][$i]["input_class"] = "required browse_master_aset_kategorii_clear";
// // $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_account";
// $edit["field"][$i]["browse_set"]["id"] = "master_account_aset";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Kode Acc. Akumulasi";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "nomormhaccountakumulasi";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_account";
// $edit["field"][$i]["browse_set"]["id"] = "master_account_akumulasi";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
// $edit["field"][$i]["label"] = "Kode Acc. Beban";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "nomormhaccountbeban";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_account";
// $edit["field"][$i]["browse_set"]["id"] = "master_account_beban";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;
$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;
// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"]      = "hiding"; 
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nama_cabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nama"];
$i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"] = "Nomor Account Aset";
// $edit["field"][$i]["input"] = "nomormhaccountaset";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_class"] = "browse_master_aset_kategori_clear";
// $i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;

if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*,
	CONCAT(b.nama,'|',b.nomor) AS 'browse|nomormhkategoriaset',
	c.nama AS nama_cabang, DATE_FORMAT(a.tanggal, '%d-%m-%Y') AS temp_tanggal
	FROM ".$edit["table"]." a
	JOIN mhkategoriaset b ON a.nomormhkategoriaset =  b.nomor
	JOIN mhcabang c on c.nomor = a.nomormhcabang AND c.status_aktif = 1
	WHERE a.nomor = ".$_GET["no"];
	if($edit["debug"] > 0)
		echo $edit["query"];

	$r = mysqli_fetch_array(mysqli_query($con,$edit["query"]));
	$edit = fill_value($edit,$r);

	if($edit["mode"] == "edit")
		check_edit($r);
}


$edit = generate_info($edit,$r);
$i = count($edit["field"]);

$features = "save|back|reload".check_approval($r,"edit");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

// $grid_str = generate_grid_string($edit["field"],$grid);
// $grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>
<script language="javascript" type="text/javascript">
function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}
$(document).ready(function() {
	calculate_total_penyusutan();
	$("#penyusutan").blur(function(){
		calculate_total_penyusutan();
	});
	$("#nilai_perolehan").blur(function(){
		calculate_total_penyusutan();
	});
	$("#tarif").blur(function(){
		calculate_total_penyusutan();
	});


	<?php if($edit["mode"] == "add"){ ?>

      var today = new Date($("#temp_tanggal").val());
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      var tempcustomtodaydate=pad(dd,2)+'-'+pad(mm,2)+'-'+yyyy;
      var customtodaydate=yyyy+'-'+pad(mm,2)+'-'+pad(dd,2);
    //   $("#temp_tanggal").val(tempcustomtodaydate);
        
      var today = new Date($("#temp_tanggal_mulai_penyusutan").val());
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      var tempcustomtodaydate=pad(dd,2)+'-'+pad(mm,2)+'-'+yyyy;
      var customtodaydate=yyyy+'-'+pad(mm,2)+'-'+pad(dd,2);
    //   $("#temp_tanggal_mulai_penyusutan").val(tempcustomtodaydate);
        
    <?php } ?>
    
    $('#temp_tanggal').change(function(){
    
      var today = new Date($("#temp_tanggal").val());
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      var tempcustomtodaydate=pad(dd,2)+'-'+pad(mm,2)+'-'+yyyy;
      var customtodaydate=yyyy+'-'+pad(mm,2)+'-'+pad(dd,2);
      $("#temp_tanggal").val(tempcustomtodaydate);
      $("#tanggal").val(customtodaydate);
    
    });

    $('#temp_tanggal_mulai_penyusutan').change(function(){
    
      var today = new Date($("#temp_tanggal_mulai_penyusutan").val());
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      var tempcustomtodaydate=pad(dd,2)+'-'+pad(mm,2)+'-'+yyyy;
      var customtodaydate=yyyy+'-'+pad(mm,2)+'-'+pad(dd,2);
      $("#temp_tanggal_mulai_penyusutan").val(tempcustomtodaydate);
      $("#tanggal_mulai_penyusutan").val(customtodaydate);
    
    });
});
function calculate_total_penyusutan()
{
	var harga_beli = $('#nilai_perolehan').val();
	var tarif = $('#tarif').val();
	var bulan = $('#penyusutan').val();
	var total_penyusutan = (harga_beli * tarif/100)/12;
	$('#total_penyusutan').val(total_penyusutan);
	console.log(total_penyusutan);
}
function checkHeader()
{
	var fields = [
		"nama|Nama",
		"browse_master_barang_kategori_hidden|Kategori",
		"browse_master_principal_hidden|Principal"
	];
	var check_failed = check_value_elements(fields);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
<?=generate_function_checkgrid($grid_str)?>
<?=generate_function_checkunique($grid_str)?>
<?=generate_function_realgrid($grid_str)?>
</script>