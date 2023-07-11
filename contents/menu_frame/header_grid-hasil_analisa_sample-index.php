<?php
$index["debug"] = 1;
$index_navbutton["generate"] = "reload";
$index["ajax"] =  1;
$index["filter"] =  1;
$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$i = 0;
$index_filter["field"][$i]["label"]                     = "Jenis Packaging";
$index_filter["field"][$i]["input"]                     = "nomormhjenispackaging";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_jenis_packaging";
$i++;

$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"]                 = "Sales";
$index_filter["field"][$i]["input"]                     = "nomormhpegawai_sales";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_sales";
$i++;

$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"]                     = "Permintaan Analisa Sample";
$index_filter["field"][$i]["input"]                     = "nomortdpermintaananalisasample";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "permintaan_analisa_sample";
$i++;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

// $index_table["column"][$i]["name"] 		= "directory";
// $index_table["column"][$i]["sort"] 		= "a.directory";
// $index_table["column"][$i]["search"] 	= 1;
// $index_table["column"][$i]["caption"] 	= "Gambar";
// $index_table["column"][$i]["align"] 	= "";
// $index_table["column"][$i]["width"] 	= "50";
// $i++;

$index_table["column"][$i]["name"] 		= "kode";
$index_table["column"][$i]["sort"] 		= "a.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode");
$i++;
$index_table["column"][$i]["name"] 		= "kode_permintaan";
$index_table["column"][$i]["sort"] 		= "b1.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode Permintaan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_permintaan");
$i++;
$index_table["column"][$i]["name"] 		= "produk";
$index_table["column"][$i]["sort"] 		= "b.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "produk";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("produk");
$i++;
$index_table["column"][$i]["name"] 		= "customer";
$index_table["column"][$i]["sort"] 		= "a.customer";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Customer";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("customer");
$i++;
$index_table["column"][$i]["name"] 		= "jenispackaging";
$index_table["column"][$i]["sort"] 		= "jenispackaging";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Jenis Packaging";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("jenispackaging");
$i++;
$index_table["column"][$i]["name"] 		= "test";
$index_table["column"][$i]["sort"] 		= "a.test";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Gambar";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "250";
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

$index["query_select"] = " 	SELECT
							a.*,
							CONCAT('$test', m.nomor, '$modal1', m.directory, '$test2', m.nomor, '$modal2', m.directory, '$test3') AS test,
							b.produk as produk,
							b1.kode as kode_permintaan,
							c.nama as jenispackaging
							from thhasilanalisasample a
							JOIN tdpermintaananalisasample b on a.nomortdpermintaananalisasample = b.nomor
							join thpermintaananalisasample b1  on b.nomorthpermintaananalisasample =  b1.nomor
							join mhjenispackaging c on a.nomormhjenispackaging = c.nomor
							left join mharchievedfiles m on m.file_nomor = b.nomor and m.file_tabel = 'tdpermintaananalisasample' and m.kategori = 'PERMINTAAN_ANALISA_SAMPLE'
										";

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