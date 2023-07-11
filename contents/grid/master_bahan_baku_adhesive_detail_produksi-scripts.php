<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_satuan_qty_prod(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_qty_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_qty', 'master_satuan_qty', '', '');
    }


    function autocomplete_satuan_panjang_prod(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_panjang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_panjang', 'master_satuan_panjang', '', '');
    }
    


	function autocomplete_satuan_berat_prod(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_berat_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_berat', 'master_satuan_berat', '', '');
    }
    

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'satuan_qty') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_qty) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqty', <?= $grid_id ?>_selected_suggest.master_satuan_qty.nomor);
            }    
        }

        if (cellname == 'satuan_panjang') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_panjang) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanpanjang', <?= $grid_id ?>_selected_suggest.master_satuan_panjang.nomor);
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