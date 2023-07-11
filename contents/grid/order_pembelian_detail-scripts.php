<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
	function after_complete_<?= $grid_id ?>(rowid, cellname) {
		<?= $grid_id ?>_selected_suggest = false;
	}

	function grid_complete_<?= $grid_id ?>() {
		// NO FUNCTION
		sum_subtotal_<?= $grid_id ?>();
	}

	function sum_subtotal_<?= $grid_id ?>() {
		var subtotal = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
		$('#sum_subtotal_<?= $grid_id ?>').val(subtotal);
		calculate_summary('<?= $grid_str[0] ?>');
	}


	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {

		var jumlah_order = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_order'));
		var jumlah_konversi = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_konversi'));
		var jumlah_permintaan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_permintaan'));

		var total_jumlah_terkonversi = jumlah_order * jumlah_konversi;


		if (total_jumlah_terkonversi) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', total_jumlah_terkonversi);
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah_order);
		}

		var jumlah_permintaan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_permintaan'));

		if (jumlah_order > jumlah_permintaan) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_order', jumlah_permintaan);
			alert(`Jumlah beli (${jumlah_order}) tidak boleh lebih dari jumlah permintaan (${jumlah_permintaan})`);
		}

		var harga = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan'));
		var diskon_nominal_1 = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_nominal_1'));
		var diskon_persen = 0;

		var subtotal_awal = harga * jumlah_order;

		if (diskon_nominal_1 > 0) {
			diskon_persen = (diskon_nominal_1 / subtotal_awal) * 100;
		}

		var subtotal_akhir = subtotal_awal - diskon_nominal_1;
		
		// var subtotals = (harga - diskon_nominal_1) * jumlah_order;

		console.log({
			jumlah_order,
			harga,
			diskon_nominal_1,
			subtotal_awal,
			subtotal_akhir
		})

		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1', diskon_persen);
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal_akhir);

		// var diskon1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_1');
		// subtotal = (harga - diskon_persen1) * jumlah_order;
		// jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

		// var diskon_persen = (diskon_nominal_1 / harga) * 100;
		// var diskon_persen1 = (harga * diskon_persen) / 100;




		// if (cellname == 'diskon_1') {
		// 	var diskon_nominal_1 = diskon_persen1 * jumlah_order;
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1', diskon1);
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_nominal_1', diskon_nominal_1);
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

		// } else
		// if (cellname == 'diskon_nominal_1') {


		// } else {
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1', diskon1);
		// 	jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_nominal_1', diskon_nominal_1);

		// }

		sum_subtotal_<?= $grid_id ?>();
	}

	function after_delete_<?= $grid_id ?>() {
		// NO FUNCTION
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		// SETTING ROW VALIDATION
		var cells = [
			"nomormhbarang|ID Barang",
			"nomorthbelipermintaan|ID Permintaan",
			"nomortdbelipermintaan|ID Detail Permintaan",
			"nomormhdepartemen|ID Departemen",
			"jumlah_order|Jumlah Order",
			"harga_satuan|Harga Satuan",
			// "nomormhsatuanqty|ID Satuan Qty",
		];

		var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

		if (check_failed != '') {
			return check_failed;
		} else {
			return true;
		}

		// END SETTING ROW VALIDATION
	}
</script>