<?php
if (!empty($index["query_filter"]) && isset($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
    $index["title"] .= " s.d. " . $_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"];
$index["footer"] = 1;
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;
$index_datatable["paging"] = "false";
$index_datatable["drawCallback"] = "function ( settings ) {grupReport(this,settings,0,8);}";
// HIDE KOLOM KE 0 YANG MERUPAKAN GROUP
$index_datatable["columnDefs"] = "[{\"targets\": 0,\"visible\": false}]";
$index_navbutton["generate"] = "reload|export_excel";


$i = 0;
$index_filter["field"][$i]["label"] = "Nama Cabang";
$index_filter["field"][$i]["input"] = "nomormhcabang";
$index_filter["field"][$i]["input_element"] = "browse";
$index_filter["field"][$i]["browse_setting"] = "master_cabang";
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Nama Supplier / Tukang";
$index_filter["field"][$i]["input"] = "nomormhsupplier";
$index_filter["field"][$i]["input_element"] = "browse";
$index_filter["field"][$i]["browse_setting"] = "master_supplier_tukang";
$i++;
// $index_filter["field"][$i]["label"] = "Tanggal Awal";
// $index_filter["field"][$i]["label_class"] = "req";
// $index_filter["field"][$i]["input"] = "tanggal_awal";
// $index_filter["field"][$i]["input_class"] = "date_1";
// if(empty($_SESSION["menu_".$_SESSION["g.menu"]]["filter_tanggal_awal"]))
// 	$index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
// // $i++;
// $index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] = "req";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
    $index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;

$i = 0;
$index_table["column"][$i]["name"] = "supplier_nama";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Nama Supplier";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "transaksi_kode";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Kode Transaksi";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Keterangan";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "250";
$i++;
$index_table["column"][$i]["name"] = "valuta_nama";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Valuta";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kurs_nominal";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Nominal Kurs";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "total";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Total";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["number"] = "money";
$index_table["column"][$i]["total"] = 1;
$i++;
$index_table["column"][$i]["name"] = "total_idr";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Total IDR";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["number"] = "money";
$index_table["column"][$i]["total"] = 1;
$i++;

$index["query_select"] = "	CALL rp_5_hutang_laporan(
							                2,
                              '2000-01-01',
                              '3000-01-01',
							                " . $_SESSION["cabang"]["nomor"] . ",
                               0,
                               1,
                               0
						                )";
$index["query_where"] = "";
?>

<script type="text/javascript">
    function price_to_number(v) {
        if (!v) {
            return 0;
        }
        v = v.split('.').join('');
        v = v.split(',').join('.');
        v = v.replace('(', '-');
        return Number(v.replace(/[^0-9.|-]/g, ""));
    }

    function number_to_price(v) {
        if (v == 0) {
            return '0,00';
        }
        v = parseFloat(v);
        v = v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        v = v.split('.').join('*').split(',').join('.').split('*').join(',');
        return v;
    }

    function grupReport(this_param, settings, groupColumn, totalColumn) {
        var api = this_param.api();
        var rows = api.rows({
            page: 'current'
        }).nodes();
        var last = null;

        var total = 0;
        var total_idr = 0;
        var grand_total = 0;
        var grand_total_idr = 0;

        var start = 0;
        var end = 0;

        api.column(groupColumn, {
            page: 'current'
        }).data().each(function(group, i) {
            if (last !== group) {
                if (i > 0) {
                    start = end;
                    end = i;

                    total = 0;
                    total_idr = 0;
                    for (var j = start; j < end; j++) {
                        var vals = api.row(api.row($(rows).eq(j)).index()).data();
                        var subtotal = vals[5] ? price_to_number(vals[5]) : 0;
                        var subtotal_idr = vals[6] ? price_to_number(vals[6]) : 0;

                        total += subtotal;
                        total_idr += subtotal_idr;
                        grand_total += subtotal;
                        grand_total_idr += subtotal_idr;
                    }
                    $(rows).eq(i).before(
                        "<tr class=\"info\"><td align=\"right\"  style='text-align:right' colspan=\"5\"><b>TOTAL</b></td><td align=\"right\"><b>" + number_to_price(total_idr) + "</b></td><td></td></tr>"
                    );
                }
                $(rows).eq(i).before(
                    '<tr><td>&nbsp;</td></tr><tr class="groupTitle"><td colspan="' + totalColumn + '"><b>' + group + '</b></td></tr>'
                );

                last = group;
            }

            //Footer
            if (i == api.rows().count() - 1) {
                start = end;
                end = i;

                total = 0;
                total_idr = 0;
                for (var j = start; j <= end; j++) {
                    var vals = api.row(api.row($(rows).eq(j)).index()).data();
                    var subtotal = vals[5] ? price_to_number(vals[5]) : 0;
                    var subtotal_idr = vals[6] ? price_to_number(vals[6]) : 0;

                    total += subtotal;
                    total_idr += subtotal_idr;
                    grand_total += subtotal;
                    grand_total_idr += subtotal_idr;
                }
                $(rows).eq(i).after(
                    `
                        <tr class="info">
                            <td align="right" style='text-align:right' colspan="5"><b>TOTAL</b></td>
                            <td align="right"><b>${number_to_price(total_idr)}</b></td>
                            <td></td>
                        </tr>
                        <tr class="primary">
                            <td align="right" style='text-align:right' colspan="5"><b>GRAND TOTAL</b></td>
                            <td align="right"><b>${number_to_price(grand_total_idr)}</b></td>
                            <td></td>
                        </tr>
                    `
                );
            }
        });

        $('.table-datatable').DataTable().column(groupColumn).visible(false);
    }

    // CUSTOM PRINT
    $(document).on('click', '.customPrint', function(event) {
        var tableHeader = $('.table-datatable').children("thead").html().toString();
        var tableBody = $('.table-datatable').children("tbody").html().toString();
        var periode = $("#tanggal_akhir").val();
        var companyName = "<?= $_SESSION["setting"]["company_name"] ?>";
        var companyAddress = "<?= $_SESSION["setting"]["company_address"] ?> <br><?= $_SESSION["setting"]["company_contact"] ?>";
        var totalColumn = 8;

        var obj = $.alert({
            icon: 'fa fa-spinner fa-spin',
            title: 'Working!',
            // theme: 'modern',
            animation: 'scale',
            // type: 'orange',
            content: '<font style="font-size:14px">Mohon Tunggu Proses Hingga Selesai..</font>',
            buttons: {
                ok: {
                    isHidden: true,
                }
            }
        });

        $.ajax({
            async: true, // this will solve the problem
            type: "POST",
            url: "pages/ajax.php",
            data: {
                "tipe": "setDataTable",
                tableHeader: tableHeader,
                tableBody: tableBody,
                periode: periode,
                companyName: companyName,
                companyAddress: companyAddress,
                totalColumn: totalColumn
            },
            success: function(data) {
                obj.close();
                window.open('pages/export_print.php?m=lap_hutang_detail&f=report&&sm=edit&a=view&no=', '_newtab');
            },
            error: function(jqXHR, textStatus, errorThrown) {

                alert(errorThrown);
            }
        });
    });

    // CUSTOM PRINT
    $(document).ready(function() {
        buttonCustomPrint = "<a class='btn btn-default customPrint'><i class='fa fa-print' aria-hidden='true' title='Print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        $(".bs-example").prepend(buttonCustomPrint);
    });
</script>