<!-- <img src="contents/image/drgadget_logo.png"  /> -->

<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.webdatarocks.com/latest/webdatarocks.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.css" />
</head>

<body>
  <h1> Laporan Pricelist </h1>
  <br>
  <div class="row rowFilter" style="margin-bottom: 30px; width: 40%; padding: 1em; display: flex; flex-direction: column; background-color: white; border: 1px solid black;">
    <div class="col">
      <p class="mb-0">Tipe:</p>
      <select id="browse_tipe_film" name="tipe_film"></select>
    </div>

    <button type="button" class="btn btn-primary" style="margin-top: 1em;" onclick="filter()">Filter</button>
  </div>

  <div style="margin-bottom: 30px; padding: 1em; background-color: white; border: 1px solid black; padding: 50px;">
    <table id="example" class="display table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Item</th>
          <th>Min</th>
          <th>Max</th>
          <th>Selisih</th>
          <th>Last Update</th>
        </tr>
      </thead>
    </table>
  </div>

  <div id="loadingContainer"></div>
  <div id="container" style="margin-bottom: 4em; width: 100%; overflow-x: scroll;">
    <div id="reportWdrContainer" style="margin-bottom: 1em;"></div>
    <div id="highchartsContainer" style="margin-bottom: 4em;"></div>

    <div id="reportPvtContainer"></div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="https://cdn.webdatarocks.com/latest/webdatarocks.toolbar.min.js"></script>
<script src="https://cdn.webdatarocks.com/latest/webdatarocks.js"></script>

<script src="https://cdn.webdatarocks.com/latest/webdatarocks.highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.23.0/pivot.min.js"></script>


<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js"></script>

<script>
  $(document).ready(function() {
    // set #tanggal_akhir value to today
    $('#tanggal_akhir').val(new Date().toISOString().slice(0, 10));

    $('#browse_tipe_film').select2({
      placeholder: "Pilih tipe",
      multiple: true,
      allowClear: true,
      ajax: {
        url: 'pages/browse/master_tipe_film.php',
        dataType: 'json',
        data: function(params) {
          var query = {
            search: params.term,
          }
          return query;
        },
        delay: 600,
        minimumInputLength: 2,
        processResults: function(data) {
          return {
            results: $.map(data, function(item) {
              return {
                id: item.id,
                text: item.nama
              }
            })
          };
        },
        cache: true,
      }
    });

    $('#example').DataTable({
      ajax: 'pages/reporting/summary_pricelist.php',
      columns: [{
          data: 'item'
        },
        {
          data: 'min'
        },
        {
          data: 'max'
        },
        {
          data: 'selisih'
        },
        {
          data: 'last_update'
        },
      ],
    });
  });

  function filter() {
    var nomor = $('#browse_tipe_film').val();

    if (!nomor) return alert('pilih tipe terlebih dahulu')

    // transform nomor from [1, 2, 4] to '1,2,4'
    nomor = nomor.join(',')

    const payload = {
      nomor
    }
    console.log({
      payload
    })

    $('#loadingContainer').html(`<h2 id="loading">Loading...</h2>`)
    renderReportUI(payload)
  }

  function renderReportUI(filter) {
    $.ajax({
      async: true,
      type: "get",
      url: "pages/reporting/report_pricelist.php",
      data: filter,
      success: function(response) {
        $('#reportWdrContainer').html('')
        $('#reportPvtContainer').html('')
        $('#loadingContainer').html('')

        // get response size in MB with two diferrent method
        const firstSize = parseFloat((new TextEncoder().encode(response).length / 1024 / 1024).toFixed(2));
        const secondSize = parseFloat(((encodeURI(response).split(/%..|./).length - 1) / 1024 / 1024).toFixed(2));
        const averageSize = parseFloat(((firstSize + secondSize) / 2).toFixed(2));
        const sizeLimit = 1 // 1MB

        console.log({
          firstSize,
          secondSize,
          averageSize
        })

        const data = JSON.parse(response)

        if (averageSize >= sizeLimit) {
          $("#reportPvtContainer").pivotUI(data, {
            // rows: ["Gudang"],
            // cols: ["Produk"],
            vals: ["harga"],
            aggregatorName: "Sum",
          });

          alert(`Data terlalu besar, sehingga dialihkan untuk tampilan laporan yang lebih sederhana`)
        } else {
          let webdatarocks = new WebDataRocks({
            container: "#reportWdrContainer",
            toolbar: true,
            report: {
              dataSource: {
                data
              },
              slice: {
                rows: [{
                  uniqueName: "supply",
                }, {
                  uniqueName: "supplier",
                }],
                columns: [{
                  uniqueName: "tanggal",
                }],
                measures: [{
                  uniqueName: "harga",
                  format: "currency",
                }]
              },
              formats: wdrFormats,
              conditions: wdrConditions,
            },
          });

          webdatarocks.on('reportcomplete', function() {
            webdatarocks.off("reportcomplete");
            createChart();
          });
        }

      },
      onError: function() {
        $('#reportWdrContainer').html('')
        $('#reportPvtContainer').html('')
        $('#loadingContainer').html('<h2>Terjadi kesalahan, hubungi administrator</h2>')
        alert("Data tidak ditemukan!");
      }
    });
  }

  const wdrFormats = [{
    name: "currency",
    thousandsSeparator: ",",
    decimalSeparator: ".",
    decimalPlaces: 2,
    maxDecimalPlaces: -1,
    maxSymbols: 20,
    currencySymbol: "",
    currencySymbolAlign: "left",
    nullValue: "0",
    infinityValue: "Infinity",
    divideByZeroValue: "Infinity",
    textAlign: "right",
    isPercent: false
  }]

  const wdrConditions = [{
    formula: "#value < 0",
    measure: "harga",
    aggregation: "sum",
    format: {
      backgroundColor: "red",
      color: "red",
      fontFamily: "Arial",
      fontSize: "12px",
    },
  }]

  function createChart() {
    webdatarocks.highcharts.getData({
      type: "line"
    }, createAndUpdateChart, createAndUpdateChart);
  }

  function createAndUpdateChart(data, rawData) {
    if (data.yAxis == undefined) data.yAxis = {};
    data.tooltip = {
      pointFormat: webdatarocks.highcharts.getPointYFormat(rawData.meta.formats[0])
    }
    Highcharts.chart('highchartsContainer', data);
  }
</script>

</html>