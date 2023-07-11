<?php
$index["debug"] = 	1;
$index["ajax"] = 1;
$index["filter"] = 1;

$index_filter["hide"] = 0;
$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

$i = 0;

$index_filter["field"][$i]["label"]                     = "Sales";
$index_filter["field"][$i]["label_class"]                 = "req";
$index_filter["field"][$i]["input"]                     = "nomormhpegawai_sales";
$index_filter["field"][$i]["input_class"]                 = "required";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_sales";
$i++;

$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "kode";
$index_table["column"][$i]["sort"] 		= "a.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode");
$i++;

$index_table["column"][$i]["name"] 		= "sales";
$index_table["column"][$i]["sort"] 		= "e.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "sales";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("sales");
$i++;

$index_table["column"][$i]["name"] 		= "tanggal";
$index_table["column"][$i]["sort"] 		= "a.tanggal";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "tanggal";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("tanggal");
$i++;

$index_table["column"][$i]["name"] 		= "produk";
$index_table["column"][$i]["sort"] 		= "(SELECT
GROUP_CONCAT(
	DISTINCT CONCAT( '&#x25C8;&nbsp;', 
	c.produk
	) SEPARATOR '<br>' 
)
FROM
tdpermintaananalisasample c
WHERE c.nomorthpermintaananalisasample = a.nomor
AND c.status_aktif > 0
ORDER BY c.nomor ASC)";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Produk";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("produk");
$i++;

$index_table["column"][$i]["name"] 		= "customer_analisa";
$index_table["column"][$i]["sort"] 		= "customer_analisa";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Customer";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("customer_analisa");
$i++;

$index_table["column"][$i]["name"] 		= "test";
$index_table["column"][$i]["sort"] 		= "a.test";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Gambar";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("test");
$i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$test = '
<a data-toggle="modal" href="#myModal';

$modal1 = '"> <img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';


$test2 = '" alt="Image" id="profilepic" style="cursor:pointer;display:inline;margin: 0 auto; height:auto; width:20%;"> </a>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="myModal';

$modal2 = '"><div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-body">
	<img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';

$test3 = '" alt="Image" class="img-responsive" id="profilepic" style="cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;"></div></div></div></div>
';


$index["query_select"] = " 	

SELECT a.* FROM (

SELECT
							a.*,
							(SELECT
								GROUP_CONCAT(
									DISTINCT CONCAT( '&#x25C8;&nbsp;', 
									c.produk
									) SEPARATOR '<br>' 
								)
								FROM
								tdpermintaananalisasample c
								WHERE c.nomorthpermintaananalisasample = a.nomor
								AND c.status_aktif > 0
								ORDER BY c.nomor ASC) AS produk,
							e.nama as sales,
							CONCAT('$test', ma.nomor, '$modal1', ma.directory, '$test2', ma.nomor, '$modal2', ma.directory, '$test3') AS test
							from thpermintaananalisasample a
							JOIN tdpermintaananalisasample d ON d.nomorthpermintaananalisasample = a.nomor and d.status_aktif = 1
							join mhpegawai e on a.nomormhpegawai_sales = e.nomor and e.status_aktif = 1
							left join mharchievedfiles ma on ma.file_nomor = d.nomor and ma.file_tabel = 'tdpermintaananalisasample' and ma.kategori = 'PERMINTAAN_ANALISA_SAMPEL'
							group by a.nomor			
							) a";

$index["query_where"] .= "	AND a.nomor <> 0";
$index["default_order"] = "	a.nomor DESC";
?>


<div class="modal fade preview" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="previmg"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.preview').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		console.log(id);
		$("#previmg").html("<img src='" + id + "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'>");
	});

	function duplicateItem(nomor) {
		var m = <?php echo "\"" . $_GET['m'] . "\"" ?>;
		var lokasi = "pages/duplicate_item.php?m=" + m + "&table=mitem&no=" + nomor;
		// alert(lokasi);
		location.href = lokasi;
	}
</script>