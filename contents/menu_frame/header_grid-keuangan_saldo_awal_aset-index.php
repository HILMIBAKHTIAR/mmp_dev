<?php
$index["debug"] = 0;

// $index_navbutton["generate"] = "reload|export_excel";
// $index_datatable["drawCallback"] = "function ( settings ) {grupReport(this,settings,0,0);}";
$index_datatable["paging"] = "false";

// $index["filter"] = 1;
$index_filter["hide"] = 0;
// $index_datatable["paging"] = "true"; 

// $i = 0;
// $index_filter["field"][$i]["label"] = "Cabang";
// $index_filter["field"][$i]["input"] = "nomormhcabang";
// $index_filter["field"][$i]["input_element"] = "select1";
// $index_filter["field"][$i]["input_option"] = array();
// if($_SESSION["cabang"]["nomor"] == "1")
// {
//     $mhcabang = mysql_query("
//     SELECT 0 AS nomor, '%|SEMUA CABANG' AS opsi
//     UNION ALL
//     SELECT a.nomor, CONCAT(a.nomor,'|',a.nama,' - ',a.kode) AS opsi
//     FROM mhcabang a
//     WHERE a.status_aktif = 1
//     ORDER BY 1");
// }
// else
// {
//     $mhcabang = mysql_query("
//     SELECT a.nomor, CONCAT(a.nomor,'|',a.nama,' - ',a.kode) AS opsi
//     FROM mhcabang a
//     WHERE a.status_aktif = 1
//     AND a.nomor = ".$_SESSION["cabang"]["nomor"]);
// }
// while($cabang = mysql_fetch_array($mhcabang))
//     array_push($index_filter["field"][$i]["input_option"],$cabang["opsi"]);
// $i++;
// $index_filter["field"][$i]["form_group"] = 0;
// $index_filter["field"][$i]["label"] = "Tanggal Akhir";
// $index_filter["field"][$i]["label_class"] = "req";
// $index_filter["field"][$i]["input"] = "tanggal_akhir";
// $index_filter["field"][$i]["input_class"] = "required date_1_custom";
// $i++;
// $index_filter["field"][$i]["label"] = "Tipe Aset";
// $index_filter["field"][$i]["input"] = "nomormhaccount";
// $index_filter["field"][$i]["input_element"] = "select1";
// $index_filter["field"][$i]["input_option"] = array("102|INVENTARIS","111|KENDARAAN","%|ALL");
// $i++;

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "a.nomor";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Nomor";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "50";
$i++;
$index_table["column"][$i]["name"] = "cabang";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Cabang";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "50";
$i++;
$index_table["column"][$i]["name"] = "custom_tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tanggal Perolehan";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "50";
$i++;
$index_table["column"][$i]["name"] = "nama";
$index_table["column"][$i]["sort"] = "a.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "400";
$i++;
$index_table["column"][$i]["name"] = "kategori_aset";
$index_table["column"][$i]["sort"] = "";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kategori Aset";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "";
$i++;
// $index_table["column"][$i]["name"] = "penyusutan_lama";
// $index_table["column"][$i]["sort"] = "a.penyusutan_lama";
// $index_table["column"][$i]["search"] = 1;
// $index_table["column"][$i]["caption"] = "Lama Penyusutan (BULAN)";
// $index_table["column"][$i]["align"] = "right";
// $index_table["column"][$i]["width"] = "50";
// $i++;
// $index_table["column"][$i]["name"] = "penyusutan_total";
// $index_table["column"][$i]["sort"] = "a.penyusutan_total";
// $index_table["column"][$i]["search"] = 1;
// $index_table["column"][$i]["caption"] = "Akumulasi";
// $index_table["column"][$i]["align"] = "right";
// $index_table["column"][$i]["width"] = "50";
// $i++;
// $index_table["column"][$i]["name"] = "kategori_aset";
// $index_table["column"][$i]["sort"] = "c.nama";
// $index_table["column"][$i]["search"] = 1;
// $index_table["column"][$i]["caption"] = "Kategori Aset";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "";
// $i++;
// $index_table["column"][$i]["name"] = "status_disetujui";
// $index_table["column"][$i]["sort"] = "a.status_disetujui";
// $index_table["column"][$i]["search"] = 0;
// $index_table["column"][$i]["caption"] = "Status";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "50";
// $i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "75";
$i++;


$i = count($index_table["column_export"]);
$index_table["column_export"][$i]["name"] = "kode";
$index_table["column_export"][$i]["caption"] = "Nomor";
$i++;
$index_table["column_export"][$i]["name"] = "nama";
$index_table["column_export"][$i]["caption"] = "Nama Barang";
$i++;
$index_table["column_export"][$i]["name"] = "kategori_aset";
$index_table["column_export"][$i]["caption"] = "Kategori Aset";
$i++;

$index["query_select"] = "	SELECT a.*, 
							b.nama AS cabang,
							DATE_FORMAT(a.tanggal, '%d-%m-%Y') as custom_tanggal,
                            c.nama AS kategori_aset
							FROM ".$index["query_from"]." a
							JOIN mhcabang b on a.nomormhcabang = b.nomor
                            JOIN mhkategoriaset c on a.nomormhkategoriaset = c.nomor
							 ";
$index["query_where"] .= " AND a.status_aktif > 0  AND a.nomor <> 0 ";
$index["default_order"] = "	a.kode";
?>

<script type="text/javascript">
function price_to_number(v){
    if(!v){return 0;}
    v=v.split('.').join('');
    v=v.split(',').join('.');
    v=v.replace('(','-');
    return Number(v.replace(/[^0-9.|-]/g, ""));
}
function number_to_price(v){
    if(v==0){return '0,00';}
    v=parseFloat(v);
    v=v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    v=v.split('.').join('*').split(',').join('.').split('*').join(',');
    return v;
}
function grupReport(this_param,settings,groupColumn,totalColumn ){
    var api = this_param.api();
    var rows = api.rows( {page:'current'} ).nodes();
    var last=null;
    
    var total_debit=0;
    var total_kredit=0;
    var grand_total_debit=0;
    var grand_total_kredit=0;

    var start=0;
    var end=0;

    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
        //Footer
        if(i== api.rows().count()-1){
            start=end;
            end=i;

            total_debit=0;
            total_kredit=0;
            for (var j = start; j <= end; j++) {
                var vals = api.row(api.row($(rows).eq(j)).index()).data();
                var debit = vals[7] ? price_to_number(vals[7]) : 0;
                var kredit = vals[5] ? price_to_number(vals[5]) : 0;
                total_debit+=debit;
                total_kredit+=kredit;

                grand_total_debit+=debit;
                grand_total_kredit+=kredit;
            }

            $(rows).eq( i ).after(
                "<tr class=\"primary\"><td align=\"right\" style='text-align:right' colspan=\"5\"><b>GRAND TOTAL</b></td><td align=\"right\"><b>"+number_to_price(grand_total_kredit)+"</b></td><td></td><td align=\"right\"><b>"+number_to_price(grand_total_debit)+"</b></td><td></td></tr>"
            );
           
        }

    });
}
</script>