<?php
if (!empty($index["query_filter"]) && isset($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_awal"]) && isset($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
    $index["title"] .= " " . $_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_awal"] . " s.d. " . $_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"];

$index["footer"] = 1;
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;
$index_datatable["drawCallback"] = "function ( settings ) {grupReport(this,settings,0,9);}";
// HIDE KOLOM KE 0 YANG MERUPAKAN GROUP
// $index_datatable["columnDefs"] = "[{\"targets\": 0,\"visible\": false}]";
$index_navbutton["generate"] = "reload|export_excel";

$i = 0;
$index_filter["field"][$i]["label"] = "Kas / Bank";
$index_filter["field"][$i]["input"] = "kasbank";
$index_filter["field"][$i]["input_element"] = "select1";
$index_filter["field"][$i]["input_option"] = array("1|Kas", "0|Bank");
$i++;
$index_filter["field"][$i]["form_group_class"] = "hiding";
$index_filter["field"][$i]["label"] = "Kas";
$index_filter["field"][$i]["input"] = "kas";
$i++;
$index_filter["field"][$i]["form_group_class"] = "hiding";
$index_filter["field"][$i]["label"] = "Bank";
$index_filter["field"][$i]["input"] = "bank";
$i++;
$index_filter["field"][$i]["label"] = "Account";
$index_filter["field"][$i]["label_class"] = "req";
$index_filter["field"][$i]["input"] = "nomormhaccount";
$index_filter["field"][$i]["input_class"] = "required";
$index_filter["field"][$i]["input_element"] = "browse";
$index_filter["field"][$i]["browse_setting"] = "master_account_kasbank";
$index_filter["field"][$i]["browse_set"]["param_input"] = array("a.kas|kas", "a.bank|bank");
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["label_class"] = "req";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_awal"]))
    $index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] = "req";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
    $index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;

$i = 0;
$index_table["column"][$i]["name"] = "grup";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Info Acc";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "transaksikode";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Bukti Transaksi";
$index_table["column"][$i]["align"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Uraian";
$index_table["column"][$i]["align"] = "";
$i++;
// $index_table["column"][$i]["name"] = "proyek";
// $index_table["column"][$i]["sort"] = "empty";
// $index_table["column"][$i]["search"] = 0;
// $index_table["column"][$i]["caption"] = "Proyek";
// $index_table["column"][$i]["align"] = "";
// $i++;
$index_table["column"][$i]["name"] = "detail_account_kode";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "COA Lawan";
$index_table["column"][$i]["align"] = "";
$i++;
$index_table["column"][$i]["name"] = "detail_account_nama";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Nama COA";
$index_table["column"][$i]["align"] = "";
$i++;
// $index_table["column"][$i]["name"] = "relasinama";
// $index_table["column"][$i]["sort"] = "empty";
// $index_table["column"][$i]["search"] = 0;
// $index_table["column"][$i]["caption"] = "Relasi";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "";
// $i++;
$index_table["column"][$i]["name"] = "saldo_debit";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Debit";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["number"] = "money";
$index_table["column"][$i]["total"] = 1;
$i++;
$index_table["column"][$i]["name"] = "saldo_kredit";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Kredit";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["number"] = "money";
$index_table["column"][$i]["total"] = 1;
$i++;
$index_table["column"][$i]["name"] = "saldo_total";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Saldo";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["number"] = "money";
$index_table["column"][$i]["total"] = 1;
$i++;


// $index_table["column_export"] = $index_table["column"];
// $i = count($index_table["column_export"]);
// $index_table["column_export"][$i]["name"] = "header_account_kode";
// $index_table["column_export"][$i]["caption"] = "Kode Account";
// $i++;
// $index_table["column_export"][$i]["name"] = "header_account_nama";
// $index_table["column_export"][$i]["caption"] = "Nama Account";
// $i++;

// 2019-04-31 -- Tanggal saldo awal

$index["query_select"] = "	CALL rp_lap_akuntansi_kas(
								1,
								0,
								'2000-01-01',
								'2000-01-01',
								-1,
								'%',
								'%'
							)";
$index["query_where"] = "";
?>
<script language="javascript" type="text/javascript">
    $(document).ready(function() {
        $(document).on("change", "#kasbank", function() {
            kasbank_value_changed(this);
        });
        $('#kasbank').change();
    });

    function kasbank_value_changed(obj) {
        if ($(obj).val() == '1') {
            $('#kas').val(1);
            $('#bank').val(0);
        } else if ($(obj).val() == '0') {
            $('#kas').val(0);
            $('#bank').val(1);
        } else {
            $('#kas').val(0);
            $('#bank').val(0);
        }
    }

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

        var total_debit = 0;
        var total_kredit = 0;
        var grand_total_debit = 0;
        var grand_total_kredit = 0;

        var start = 0;
        var end = 0;

        api.column(groupColumn, {
            page: 'current'
        }).data().each(function(group, i) {
            if (last !== group) {
                if (i > 0) {
                    start = end;
                    end = i;

                    total_debit = 0;
                    total_kredit = 0;
                    for (var j = start; j < end; j++) {
                        var vals = api.row(api.row($(rows).eq(j)).index()).data();
                        console.log({vals})
                        var debit = vals[5] ? price_to_number(vals[5]) : 0;
                        var kredit = vals[6] ? price_to_number(vals[6]) : 0;
                        total_debit += debit;
                        total_kredit += kredit;

                        grand_total_debit += debit;
                        grand_total_kredit += kredit;
                    }

                    var currency_total_debit = '<?= number_formatting('+total_debit+') ?>';
                    $(rows).eq(i).before(
                        "<tr class=\"info\"><td align=\"right\" style='text-align:right' colspan=\"4\"><b>TOTAL PER KODE</b></td><td align=\"right\"><b>" + number_to_price(total_debit) + "</b></td><td></td><td align=\"right\"><b>" + number_to_price(total_kredit) + "</b></td><td></td></tr>"
                    );
                }
                $(rows).eq(i).before(
                    '<tr><td>&nbsp;</td></tr><tr class="groupTitle" ><td colspan="' + totalColumn + '"><b>' + group + '</b></td></tr>'
                );
                last = group;
            }

            //Footer
            if (i == api.rows().count() - 1) {
                start = end;
                end = i;

                total_debit = 0;
                total_kredit = 0;
                for (var j = start; j <= end; j++) {
                    var vals = api.row(api.row($(rows).eq(j)).index()).data();
                    var debit = vals[6] ? price_to_number(vals[6]) : 0;
                    var kredit = vals[7] ? price_to_number(vals[7]) : 0;
                    total_debit += debit;
                    total_kredit += kredit;

                    grand_total_debit += debit;
                    grand_total_kredit += kredit;
                }

                $(rows).eq(i).after(
                    "<tr class=\"primary\"><td align=\"right\" style='text-align:right' colspan=\"5\"><b>GRAND TOTAL</b></td><td align=\"right\"><b>" + number_to_price(grand_total_debit) + "</b></td><td align=\"right\"><b>" + number_to_price(grand_total_kredit) + "</b></td><td></td></tr>"
                );

            }

        });

        $('.table-datatable').DataTable().column(groupColumn).visible(false);

    }

    // CUSTOM PRINT
    $(document).on('click', '.customPrint', function(event) {
        var tableHeader = $('.table-datatable').children("thead").html().toString();
        var tableBody = $('.table-datatable').children("tbody").html().toString();
        var periode = $("#tanggal_awal").val() + " - " + $("#tanggal_akhir").val();
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
                window.open('pages/export_print.php?m=lap_akuntansi_kasbank&f=report&&sm=edit&a=view&no=', '_newtab');
            },
            error: function(jqXHR, textStatus, errorThrown) {

                alert(errorThrown);
            }
        });
    });

    //CUSTOM PRINT
    $(document).ready(function() {
        buttonCustomPrint = "<a class='btn btn-default customPrint'><i class='fa fa-print' aria-hidden='true' title='Print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
        $(".bs-example").prepend(buttonCustomPrint);
    });
</script>
<?php
$today = date("d-m-Y h:i:ss");
$filename = $SESSION["menu" . $_SESSION["g.menu"]]["judul"] . $today;
// require "x_report_printdanexcels.php"; 
?>