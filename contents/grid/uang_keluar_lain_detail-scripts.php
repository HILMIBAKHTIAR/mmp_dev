<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
	function autocomplete_account(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_grid_master_account_uang_detail_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_account_data', 'master_account_lain', '', '');
	}

	function autocomplete_accountdetail(element) {

		var nomormhaccount = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhaccount');

		if (nomormhaccount !== '') {
			$('#account_terpilih').val(nomormhaccount)
			$(element).on('keyup', function(e) {
				if (e.which === 113)
					browse_grid_master_account_uang_detail_reloadopen();
			});

			return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_account_detail', 'master_account_detail', 'nomor|account_terpilih', '');
		} else {
			return false
		}
	}

	function after_complete_<?= $grid_id ?>(rowid, cellname) {
		if (cellname == 'account') {
			console.log({
				<?= $grid_id ?>_selected_suggest
			})
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_account_data) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccount', <?= $grid_id ?>_selected_suggest.master_account_data.nomor);

				const is_punya_detail = parseInt(<?= $grid_id ?>_selected_suggest.master_account_data.is_punya_detail);

				if (!is_punya_detail) {
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'accountdetail', '', {
						editable: false
					});
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccountdetail', '', {
						editable: false
					});
				} else {
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'accountdetail', '', {
						editable: true
					});
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccountdetail', '', {
						editable: false
					});

					alert('Kolom sub account wajib diisi!')
				}
			}
		}

		if (cellname === "accountdetail") {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_account_detail) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhaccountdetail', <?= $grid_id ?>_selected_suggest.master_account_detail.nomor);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'accountdetail', <?= $grid_id ?>_selected_suggest.master_account_detail.nama);
			}
		}

		<?= $grid_id ?>_selected_suggest = false;
	}

	function grid_complete_<?= $grid_id ?>() {
		sum_subtotal_<?= $grid_id ?>();
	}

	function sum_subtotal_<?= $grid_id ?>() {
		sum_subtotal = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
		jQuery(<?= $grid_id ?>_element).jqGrid('footerData', 'set', {
			account: 'Total:',
			subtotal: sum_subtotal
		});

		calculate_all();
	}
 
	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
		sum_subtotal_<?= $grid_id ?>();
	}

	function after_delete_<?= $grid_id ?>() {
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		var cells = [
			"nomormhaccount|ID Account",
			"subtotal|Subtotal",
			"tipe|Tipe",
			"jenis|Jenis",
		];

		var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);
		if (check_failed != '')
			return check_failed;
		else
			return true;
	}
</script>