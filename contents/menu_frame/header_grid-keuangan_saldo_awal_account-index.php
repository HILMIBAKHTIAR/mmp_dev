<?php
$index["debug"] = 1;
// $index["ajax"] = 1;
$index_datatable["drawCallback"] = "function ( settings ) {grupReport(this,settings,0,0);}";
$index_datatable["paging"] = "false";
$index_navbutton["generate"] ="reload|add";

// SETTING FIELD INDEX
$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account";
$index_table["column"][$i]["sort"] = "a.account";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama Account";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "total_debet";
$index_table["column"][$i]["name"] = "total_debet";
$index_table["column"][$i]["sort"] = "a.total_debet";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Total Debet";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "total_kredit";
$index_table["column"][$i]["name"] = "total_kredit";
$index_table["column"][$i]["sort"] = "a.total_kredit";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Total Kredit";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
// END SETTING FIELD INDEX

// SETTING QUERY
$index["query_select"] = "	SELECT 
								a.*, 
								CONCAT(b.kode,' - ',b.nama) AS account 
							FROM tsaldoawalaccount a 
							JOIN mhaccount b ON a.nomormhaccount = b.nomor ";
$index["query_where"] .= "	AND a.nomor > 0 ";
$index["default_order"] = "b.kode";
// END SETTING QUERY
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
                var debit = vals[4] ? price_to_number(vals[4]) : 0;
                var kredit = vals[5] ? price_to_number(vals[5]) : 0;
                total_debit+=debit;
                total_kredit+=kredit;

                grand_total_debit+=debit;
                grand_total_kredit+=kredit;
            }

            $(rows).eq( i ).after(
                "<tr class=\"primary\"><td align=\"right\" style='text-align:right' colspan=\"4\"><b>GRAND TOTAL</b></td><td align=\"right\"><b>"+number_to_price(grand_total_debit)+"</b></td><td align=\"right\"><b>"+number_to_price(grand_total_kredit)+"</b></td><td></td></tr>"
            );
           
        }

    });
}
</script>