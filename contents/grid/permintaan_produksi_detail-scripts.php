<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_satuan_purchasing(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_grid_master_satuan_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan', 'master_satuan', '', '');
	}


	function autocomplete_satuan_berat(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_berat_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_berat', 'master_satuan_berat', '', '');
    }
    

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'satuan_barang') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan) {
				const nomormhsatuan_purchasing = <?= $grid_id ?>_selected_suggest.master_satuan.nomor
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan', nomormhsatuan_purchasing);
				// jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_barang', <?= $grid_id ?>_selected_suggest.master_satuan.nama);
			}
		}

		if (cellname == 'satuan_berat') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_berat) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanberat', <?= $grid_id ?>_selected_suggest.master_satuan_berat.nomor);
            }
            
        }

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {}

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {

    }

    function after_delete_<?= $grid_id ?>() {}

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
         
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>