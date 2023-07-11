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
		// calculate_all();
	}


	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
		var jumlah_unit = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_unit'));
		var jumlah_konversi = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_konversi'));

		var total_jumlah_terkonversi = jumlah_unit * jumlah_konversi;

		if (total_jumlah_terkonversi) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', total_jumlah_terkonversi);
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah_unit);
		}

		var jumlah_unit_order = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_unit_order'));
		if (jumlah_unit > jumlah_unit_order) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_unit', jumlah_unit_order);
			alert(`Jumlah beli (${jumlah_unit}) tidak boleh lebih dari jumlah permintaan (${jumlah_unit_order})`);
		}

		var jumlah_order = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah'));
		var harga = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga_satuan'));
		var diskon_nominal_1 = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_nominal_1'));
		var diskon_persen = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_1'));

		var subtotal_awal = harga * jumlah_order;

		if (diskon_persen > 0) {
			diskon_nominal_1 = (diskon_persen / 100) * subtotal_awal;
		}

		var subtotal_akhir = subtotal_awal - diskon_nominal_1;

		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal_akhir);

		sum_subtotal_<?= $grid_id ?>();
	}

	function after_delete_<?= $grid_id ?>() {
		// NO FUNCTION
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		// SETTING ROW VALIDATION
		var cells = [
			"nomortdbeliorder|ID Detail Order Beli",
			"nomormhbarang|ID Barang",
			"jumlah_unit|Jumlah Unit",
			"subtotal|Subtotal",
			"jumlah_konversi|Jumlah Konversi"
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