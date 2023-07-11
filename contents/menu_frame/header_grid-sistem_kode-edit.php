<?php
// SETTING DEFAULT
$edit["debug"]       = 0;
$edit["unique"]      = array("kode|nama");
// $edit["string_code"] = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];
$edit["manual_save"]="contents/menu_frame/header_grid-sistem_kode-save.php";

// SETTING DATA GRID FOR SAVE
// $i = 0;
// $edit["detail"][$i]["table_name"] = "mdcustomerrekanan";
// $edit["detail"][$i]["field_name"] = array(
//  "kode",
//  "nama",
//  "keterangan",
//  "status_aktif"
//  "nomormhrekanan",
//  "nomor"
// );
// $edit["detail"][$i]["foreign_key"]      = "nomor".$edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"]        = "";
// $edit["detail"][$i]["grid_id"]          = $_SESSION["menu_".$_SESSION["g.menu"]]["string"];
// $i++;
// END SETTING DATA GRID

// $edit["sp_add"] = "sp_setting_kode";
// $edit["sp_add_param"] = array("param_nomor|0","param_nomormhadmin|0","param_status_disetujui|0","param_mode|1", "param_");
// $edit["sp_edit"] = "sp_setting_kode";
// $edit["sp_edit_param"] = array("param_nomor|0","param_nomormhadmin|0","param_status_disetujui|0","param_mode|1");

// $_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
// $_POST["param_status_disetujui"] = 1;
// $_POST["param_status_dibatalkan"] = 0;
// $_POST["param_mode"] = 1;
// $_POST["param_nomor"] = $_GET["no"];


// SETTING FORM HEADER
$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view"){
    $edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
}
$edit["field"][$i]["box_tab"] = "data";
// SETTING FIELD

// $edit["field"][$i]["label"]                   = "Kode";
// $edit["field"][$i]["label_class"]             = "req";
// $edit["field"][$i]["input"]                   = "kode";
// $edit["field"][$i]["input_class"]             = "required";
// $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
// $edit["field"][$i]["input_attr"]["maxlength"] = "200";
// $i++;
$edit["field"][$i]["label"]            = "Kode";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomorshvariabel";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["input_col"]        = "col-sm-10";
if($edit["mode"]!="add"){
    $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
}
$edit["field"][$i]["browse_setting"]   = "master_shvariabel";
$edit["field"][$i]["browse_id"]   = "master_shvariabel";
$i++;
$edit["field"][$i]["label"]              = "Keterangan (Menu)";
$edit["field"][$i]["label_col"] = "col-sm-2";
$edit["field"][$i]["input"]              = "keterangan";
$edit["field"][$i]["input_element"]      = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_col"] = "col-sm-10";
$i++;
$edit["field"][$i]["label"]                   = "Nilai";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "nilai";
$edit["field"][$i]["input_col"]               = "col-sm-7";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;
$edit["field"][$i]["form_group"]              = 0;

$edit["field"][$i]["label"]                   = "Tabel";
$edit["field"][$i]["label_col"]               = "col-sm-1";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "header";
$edit["field"][$i]["input_col"]               = "col-sm-2";
$edit["field"][$i]["input_class"]             = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;
$edit["field"][$i]["label"]                   = "Example Code";
$edit["field"][$i]["input"]                   = "output";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_element"]      = "
    <a class='btn btn-info btn-app-sm col-sm-2' style='float:right;width:50px' onclick=formatting_code()><i class='fa fa-refresh'></i></a>
";
$edit["field"][$i]["input_col"] = "col-sm-1";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["label"]                   = "Inisial";
$edit["field"][$i]["input"]                   = "inisial";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "Digit";
$edit["field"][$i]["label_col"]               = "col-sm-1";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "max_digit";
$edit["field"][$i]["input_col"]               = "col-sm-1";
$edit["field"][$i]["input_class"]             = "required iptinteger";
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "Otf";
$edit["field"][$i]["label_col"]               = "col-sm-1";
$edit["field"][$i]["input"]                   = "otf";
$edit["field"][$i]["input_col"]               = "col-sm-3";
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["label"]                   = "Format Tanggal";
$edit["field"][$i]["input"]                   = "date_format";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array(
    "|No Date",
    "my|2 Digit Month + 2 Digit Year (my)",
    "ym|2 Digit Year + 2 Digit Month (ym)",
    "Y/m|Full Year + / + 2 Digit Month (Y/m)"
);
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                   = "Format Type";
$edit["field"][$i]["label_col"]               = "col-sm-1";
$edit["field"][$i]["input"]                   = "tipe";
$edit["field"][$i]["input_col"]               = "col-sm-5";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array(
    "|Default",
    "str-cab-tgl|Inisial + Kode Cabang + Format Tanggal (str-cab-tgl)",
    "cab-str-tgl|Kode Cabang + Inisial + Format Tanggal (cab-str-tgl)",
    "str-tgl|Inisial + Format Tanggal (str-tgl)",
    "str-tgl-otf|Inisial + Format Tanggal + String Tambahan (str-tgl-otf)",
    "str-cab-otf-tgl|Inisial + Kode Cabang + String Tambahan + Format Tanggal  (str-cab-otf-tgl)",
    "str-otf|Inisial + String Tambahan (str-otf)",
    "otf-str|String Tambahan + Inisial (otf-str)",
    "otf-cab-tgl|String Tambahan + Kode Cabang + Format Tanggal (otf-cab-tgl)",
    "cab-otf|Kode Cabang + String Tambahan (cab-otf)",
    "otf-tgl|String Tambahan + Format Tanggal (otf-tgl)",
    "cab-tgl-otf|Kode Cabang + Format Tanggal + String Tambahan (cab-tgl-otf)",
    "otf|String Tambahan (otf)"
);
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                   = "detail";
$edit["field"][$i]["input"]                   = "detail";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                   = "mode";
$edit["field"][$i]["input"]                   = "mode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array(
    "|Default",
    "last|Last"
);
$edit["field"][$i]["input_attr"]["onchange"] = "generateNilai()";
$i++;
// END SETTING FIELD
// END SETTING FORM HEADER



// QUERY FOR VIEW AND EDIT
if($edit["mode"] != "add")
{
    $edit["query"] = "
    SELECT a.* , CONCAT(b.kode, '|', b.nomor) as 'browse|nomorshvariabel'
    FROM mhsettingkode a
    LEFT JOIN shvariabel b on b.nomor=a.nomorshvariabel
    WHERE a.nomor = ".$_GET["no"];
    if($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
    // SELECT a.*,
    // CONCAT(b.kode,' - ',b.nama) AS rekanan
    // FROM ".$edit["detail"][0]["table_name"]." a
    // JOIN mhrekanan b ON a.nomormhrekanan = b.nomor AND b.status_aktif > 0
    // WHERE a.status_aktif > 0
    // AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];
    
    $edit = fill_value($edit,$r);
}
// END QUERY FOR VIEW AND EDIT
$edit           = generate_info($edit,$r,"insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);

$grid_str = generate_grid_string($edit["field"],$grid);
$grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>

<script type="text/javascript">
    // HEADER VALIDATION
    function checkHeader()
    {
        // var fields = ["kode|Kode"];
        // var check_failed = check_value_elements(fields);
        // if(check_failed != '')
        //  return check_failed;
        // else
            return true;
    }

    function generateNilai(){

        var inisial=$('#inisial').val().toUpperCase();
        var max_digit=$('#max_digit').val();
        var date_format=$('#date_format').val();
        var header=$('#header').val();
        var detail=$('#detail').val();
        var mode=$('#mode').val();
        var tipe=$('#tipe').val();
        
        var nilai=inisial + '|' + max_digit + '|' + date_format + '|' + header + '|' + detail + '|' + mode + '|' + tipe;
        $('#nilai').val(nilai);

        formatting_code();
    }

    function pad (str, max) {
      str = str.toString();
      return str.length < max ? pad("0" + str, max) : str;
    }

    function formatting_code()
    {
        var separator      = '<?php echo $_SESSION["setting"]["separator_code"]?>';
        var format         = $("#nilai").val().split("|");
        var inisial        = format[0];
        var max_digit      = format[1];
        var date_format    = format[2];
        var header         = format[3];
        var detail         = format[4];
        var mode           = format[5];
        var tipe           = format[6];
        var formatted_code = inisial;

        var today = new Date();
        var dd = pad(today.getDate(),2);
        var mm = pad(today.getMonth()+1,2); //January is 0!
        var yyyy = today.getFullYear();

        var year      = yyyy;
        var month     = mm;
        var day       = dd;

        var y="", ym="", my="";
        if(date_format != ""){
            if (date_format == "ym") {
                y  = year.toString().substr(2, 2);
                ym = y+month;
            } 
            else if (date_format == "my") {
                y  = year.toString().substr(2, 2);
                ym = month+y;
            } 
            else if ($date_format == "Y/m") {
                ym = year + "/" + month;
            }

            var branch = '<?php echo $_SESSION["cabang"]["kode"]?>';
            var otf = $("#otf").val();
            if (tipe != '') {
                if (tipe == "str-cab-tgl")
                    formatted_code = inisial + separator + branch + separator + ym + separator;
                else if (tipe == "str-cab-otf-tgl")
                    formatted_code = inisial + separator + branch + separator + otf + separator + ym + separator;
                else if (tipe == "str-otf")
                    formatted_code = inisial + separator + otf + separator;
                else if (tipe == "str-tgl")
                    formatted_code = inisial + separator + ym + separator;
                else if (tipe == "str-tgl-otf")
                    formatted_code = inisial + separator + ym + separator + otf + separator;
                else if (tipe == "cab-otf")
                    formatted_code = branch + separator + otf + separator;
                else if (tipe == "cab-str-tgl")
                    formatted_code = branch + separator + inisial + separator + ym + separator;
                else if (tipe == "cab-tgl-otf")
                    formatted_code = branch + separator + ym + separator + otf + separator;
                else if (tipe == "otf")
                    formatted_code = otf + separator;
                else if (tipe == "otf-cab-tgl")
                    formatted_code = otf + separator + branch + separator + ym + separator;
                else if (tipe == "otf-str")
                    formatted_code = otf + separator + inisial + separator;
                else if (tipe == "otf-str-tgl")
                    formatted_code = otf + separator + inisial + separator + ym + separator;
                else if (tipe == "otf-tgl")
                    formatted_code = otf + separator + ym + separator;
                else if (tipe == "str-cab-gud-tgl")
                    formatted_code = inisial + separator + branch + separator + string_plus["gudang"] + separator + ym + separator;
                else if (tipe == "str-gud")
                    formatted_code = string_plus["gudang"] + separator + inisial + separator;
            } else
                formatted_code = inisial + separator + branch + separator + ym + separator;
        }
        var number = pad("1",max_digit);
        formatted_code += number;
        $("#output").val(formatted_code);
    }
    // END HEADER VALIDATION
    <?=generate_function_checkgrid($grid_str)?>
    <?=generate_function_checkunique($grid_str)?>
    <?=generate_function_realgrid($grid_str)?>
</script>