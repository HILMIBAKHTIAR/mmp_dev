<?php
if (!empty($index["query_filter"]) && isset($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
  $index["title"] .= " s.d. " . $_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"];

$index["footer"] = 1;
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;
$index_navbutton["generate"] = "reload|export_excel";
$i = 0;

$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Gudang";
$index_filter["field"][$i]["input"] = "nomormhgudang";
$index_filter["field"][$i]["input_element"] = "browse";
$index_filter["field"][$i]["browse_setting"] = "master_gudang";
$i++;
$index_filter["field"][$i]["label"] = "Produk";
$index_filter["field"][$i]["input"] = "nomormhbarang";
$index_filter["field"][$i]["input_element"] = "browse";
$index_filter["field"][$i]["browse_setting"] = "master_barang";
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Search Nama Produk";
$index_filter["field"][$i]["input"] = "namamhbarang";
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] = "req";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_tanggal_akhir"]))
  $index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Opsi Tampilan";
$index_filter["field"][$i]["input"] = "tampilkan_nol";
$index_filter["field"][$i]["input_element"] = "select1";
$index_filter["field"][$i]["input_option"] = array("0|Sembunyikan Nol", "1|Tampilkan Nol");
$i++;

$i = 0;
$index_table["column"][$i]["name"] = "kodespk";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Kode SPK";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "100";
$i++;

$index_table["column"][$i]["name"] = "barang";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Barang";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "bahan";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Bahan";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "doi";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "doi";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "batch";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "batch";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

// $index["query_select"] = "
//   CALL rp_lap_warehouse_bom_spk('2023-07-10', NOW(), 2143, 4)
// ";


$index["query_select"] = " CALL rp_lap_warehouse_bom_spkV2(
  '2023-07-10',
  '2023-07-20',
  2143,
  4
  )";


$index["query_where"] = "";



?>


<!-- 
<script language="javascript" type="text/javascript">
  $(document).on('click', '.customPrint', function(event) {
    var tableHeader = $('.table-datatable').children("thead").html().toString();
    var tableBody = $('.table-datatable').children("tbody").html().toString();
    var periode = $("#tanggal_akhir").val();
    var companyName = "<?= $_SESSION["setting"]["company_name"] ?>";
    var companyAddress = "<?= $_SESSION["setting"]["company_address"] ?> <br><?= $_SESSION["setting"]["company_contact"] ?>";
    var totalColumn = 4;

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
        window.open('pages/export_print.php?m=lap_stok_posisi&f=report&&sm=edit&a=view&no=', '_newtab');
      },
      error: function(jqXHR, textStatus, errorThrown) {

        alert(errorThrown);
      }
    });
  });
  $(document).ready(function() {
    buttonCustomPrint = "<a class='btn btn-default customPrint'><i class='fa fa-print' aria-hidden='true' title='Print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $(".bs-example").prepend(buttonCustomPrint);
  });
</script> -->





<!-- 
<script language="javascript" type="text/javascript">
  $(document).on('click', '.customPrint', function(event) {
    var tableHeader = $('.table-datatable').children("thead").html().toString();
    var tableBody = $('.table-datatable').children("tbody").html().toString();
    var periode = $("#tanggal_akhir").val();
    var companyName = "<?= $_SESSION["setting"]["company_name"] ?>";
    var companyAddress = "<?= $_SESSION["setting"]["company_address"] ?> <br><?= $_SESSION["setting"]["company_contact"] ?>";
    var totalColumn = 4;

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
        window.open('pages/export_print.php?m=lap_stok_posisi&f=report&&sm=edit&a=view&no=', '_newtab');
      },
      error: function(jqXHR, textStatus, errorThrown) {

        alert(errorThrown);
      }
    });
  });
  $(document).ready(function() {
    buttonCustomPrint = "<a class='btn btn-default customPrint'><i class='fa fa-print' aria-hidden='true' title='Print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
    $(".bs-example").prepend(buttonCustomPrint);
  });
</script> -->