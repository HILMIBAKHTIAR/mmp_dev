<?php include $dir . "codes/autocomplete_grid.php";
// echo $autogrid_html; 
?>
<script language="javascript" type="text/javascript">
	function autocomplete_valuta(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_master_valuta_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_valuta', 'master_valuta', '', '');
	}

	// function autocomplete_account(element) {
	// 	var url = '';
	// 	var jenis = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'jenis');

	// 	if (jenis == 'LAIN_LAIN') {
	// 		$(element).on('keyup', function(e) {
	// 			if (e.which === 113)
	// 				browse_grid_master_account_uang_lain_reloadopen();
	// 		});
	// 		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'account_data', 'master_account_uang_lain', '', '');
	// 	} else if (jenis == 'TRANSFER_KAS') {
	// 		$(element).on('keyup', function(e) {
	// 			if (e.which === 113)
	// 				browse_grid_master_account_uang_kas_reloadopen();
	// 		});
	// 		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'account_data', 'master_account_uang_kas', '', '');
	// 	} else
	// 		return false;
	// }

	
	// ==========================================fery===========================================


	function autocomplete_test(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_master_account_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_account', 'master_account', '', '');
	}




	function autocomplete_transaksikode(element) {
		var url = '';
		var jenis = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'jenis');

		if (jenis == 'BELI_NOTA') {
			$(element).on('keyup', function(e) {
				if (e.which === 113)
					browse_grid_transaksi_belinota_reloadopen();
			});
			return autocomplete_grid_<?= $grid_id ?>(element, 0, 'transaksi_data', 'transaksi_belinota', 'relasinomor|browse_master_supplier_hidden', '');
		} else {
			return false;
		}
	}

	function after_complete_<?= $grid_id ?>(rowid, cellname) {
		// if (cellname == 'transaksikode') {
		// 	if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.transaksi_data) {
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksitabel', <?= $grid_id ?>_selected_suggest.transaksi_data.tabel);
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksinomor', <?= $grid_id ?>_selected_suggest.transaksi_data.nomor);
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksikode', <?= $grid_id ?>_selected_suggest.transaksi_data.kode);
		// 		var account = <?= $grid_id ?>_selected_suggest.transaksi_data.account.split('|');
		// 		if (account.length > 0) {
		// 			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'account', account[1]);
		// 			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccount', account[0]);
		// 		}
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'sisa', <?= $grid_id ?>_selected_suggest.transaksi_data.sisa);
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', <?= $grid_id ?>_selected_suggest.transaksi_data.sisa);
		// 		// var kurs = $('#kurs').val();
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'kurs', <?= $grid_id ?>_selected_suggest.transaksi_data.kurs);
		// 		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal_idr', <?= $grid_id ?>_selected_suggest.transaksi_data.sisa * kurs);
		// 	}
		// }
		
		if (cellname == 'account') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_account) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccount', <?= $grid_id ?>_selected_suggest.master_account.nomor);
			}
		}
		<?= $grid_id ?>_selected_suggest = false;
	}

	function grid_complete_<?= $grid_id ?>() {
		var total_records = jQuery(<?=$grid_id?>_element).jqGrid('getGridParam','reccount');
		var griddata = jQuery(<?=$grid_id?>_element).jqGrid('getRowData');
		var ids = jQuery(<?=$grid_id?>_element).getDataIDs();

		for (i = 0; i < total_records; i++){
			if(griddata[i].jenis == 'UMS'){
				jQuery(<?=$grid_id?>_element).jqGrid('setCell',ids[i],'bayar','','not-editable-cell');
			}
		}
	}

	function sum_subtotal_<?= $grid_id ?>() {
		var total_idr = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal_idr', false, 'sum');
		var total = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
		$('#total_idr').val(total_idr);
		$('#total').val(total);
		hitungBayar();
	}

	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
		var jenis = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jenis');

		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'tipe', '0');
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'multiplier', '1');

		if (cellname == "bayar") {
			var bayarx = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'bayar'));
			var sisax = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'sisa'));
			var jenisx = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jenis');

			if ((jenisx == "NDS" || jenisx == "UMS-P") && (bayarx > 0 || bayarx < sisax)) {
				alert("Rencana bayar tidak boleh melebihi total transaksi!");
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'bayar', sisax);
			}
			if (jenisx != "NDS" && jenisx != "UMS-P" && (bayarx < 0 || bayarx > sisax)) {
				alert("Rencana bayar tidak boleh melebihi total transaksi!");
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'bayar', sisax);
			}
		}

		if (cellname == 'jenis') {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksitabel', null, '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksinomor', null, '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksikode', null, '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccount', null, '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'account', null, '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'sisa', '', '');
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', '', '');


			var colname = '';
			if (jenis == 'LAIN_LAIN' || jenis == 'TRANSFER_KAS') {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'transaksikode', null, 'not-editable-cell');
				colname = 'account';
			} else {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'account', null, 'not-editable-cell');
				colname = 'transaksikode';
			}
			var colModel = jQuery(<?= $grid_id ?>_element).jqGrid('getGridParam', 'colModel');
			var colpos = null;
			$(colModel).each(function(i) {
				if (this.name == colname) {
					colpos = i;
					return false;
				}
			});
			jQuery('#' + rowid + ' td:eq(' + colpos + ')').removeClass('not-editable-cell');
		}
		var kurs = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'kurs');
		kurs = take_number(kurs);

		var sisa = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'sisa');
		sisa = take_number(sisa);

		var dpp = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'dpp'));
		var ppn = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'ppn'));
		var pph = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'pph'));
		var bayar = take_number(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'bayar'));
		var bayar_idr = bayar *kurs;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'bayar_idr', bayar_idr);

		// var total_pph = (pph/100) * dpp;
		// var total_pph = (pph/100) * bayar;
		var pembagi = 0;
		var persen_ppn = 0;
		if (ppn > 0) {
			// pembagi = 1.1;
			persen_ppn = (ppn/dpp) * 100;
			pembagi = persen_ppn / 100;

		}
		// var subtotal = (bayar / pembagi) - ((bayar / pembagi) * (pph / 100)) + ((ppn / dpp) * 1);
		// var subtotal = ((bayar / pembagi) - ((bayar / pembagi) * (pph / 100))) +;
		// var subtotal = (bayar / pembagi) - ((bayar / pembagi) * (pph / 100)) + ((bayar / pembagi) * (ppn / 100));
		// var subtotal = (bayar / pembagi) - ((bayar / pembagi) * (pph / 100)) + ((bayar / pembagi) * (ppn / 100));
		var subtotal = bayar-((bayar/(1+pembagi))*pph/100);
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

		var multiplier = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'multiplier');
		multiplier = take_number(multiplier);

		var jenis = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jenis');
		subtotal = subtotal * 1;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

		var subtotal_idr = subtotal * kurs * multiplier;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal_idr', subtotal_idr);

		sum_subtotal_<?= $grid_id ?>();
	}

	function after_delete_<?= $grid_id ?>() {
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		var cells = ['nomormhaccount|ID Account'];
		var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);
		if (check_failed != '')
			return check_failed;
		else
			return true;
	}
</script>
