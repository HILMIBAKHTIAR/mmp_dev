<?php
$index["debug"] = 0;
// $index["ajax"] = ;

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
$i++;

$index_table["column"][$i]["name"] 		= "customer";
$index_table["column"][$i]["sort"] 		= "a.customer";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Customer";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "barang";
$index_table["column"][$i]["sort"] 		= "(SELECT
GROUP_CONCAT(
	DISTINCT CONCAT( '&#x25C8;&nbsp;', 
	c.nama
	) SEPARATOR '<br>' 
)
FROM
tdpenawaranharga c
WHERE c.nomorthpenawaranharga = a.nomor
AND c.status_aktif > 0
ORDER BY c.nomor ASC)";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "barang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "harga";
$index_table["column"][$i]["sort"] 		= "(SELECT
GROUP_CONCAT(
	DISTINCT CONCAT( '&#x25C8;&nbsp;', 
	c.harga
	) SEPARATOR '<br>' 
)
FROM
tdpenawaranharga c
WHERE c.nomorthpenawaranharga = a.nomor
AND c.status_aktif > 0
ORDER BY c.nomor ASC)";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "harga";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "peruntukan";
$index_table["column"][$i]["sort"] 		= "peruntukan";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama Dituju";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

// $index_table["column"][$i]["name"] 		= "status_aktif";
// $index_table["column"][$i]["sort"] 		= "a.status_aktif";
// $index_table["column"][$i]["search"] 	= 1;
// $index_table["column"][$i]["caption"] 	= "Status Aktif";
// $index_table["column"][$i]["align"] 	= "";
// $index_table["column"][$i]["width"] 	= "";
// $i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$index["query_select"] = " 	SELECT
							a.*,
							(SELECT
							GROUP_CONCAT(
								DISTINCT CONCAT( '&#x25C8;&nbsp;', 
								c.nama
								) SEPARATOR '<br>' 
							)
							FROM
							tdpenawaranharga c
							WHERE c.nomorthpenawaranharga = a.nomor
							AND c.status_aktif > 0
							ORDER BY c.nomor ASC) AS barang,
							(SELECT
							GROUP_CONCAT(
								DISTINCT CONCAT( '&#x25C8;&nbsp;', 
								c.harga
								) SEPARATOR '<br>' 
							)
							FROM
							tdpenawaranharga c
							WHERE c.nomorthpenawaranharga = a.nomor
							AND c.status_aktif > 0
							ORDER BY c.nomor ASC) AS harga
							from thpenawaranharga a
							left join tdpenawaranharga b on b.nomorthpenawaranharga = a.nomor and b.status_aktif = 1
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