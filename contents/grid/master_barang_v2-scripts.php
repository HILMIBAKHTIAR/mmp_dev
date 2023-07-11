<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    // function autocomplete_satuan_qty(element) {
    //     $(element).on('keyup', function(e) {
    //         if (e.which === 113)
    //             browse_master_satuan_qty_varian_reloadopen();
    //     });
    //     return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_qty', 'master_satuan_qty', '', '');
    // }


    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'satuan_qty') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_qty) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqty', <?= $grid_id ?>_selected_suggest.master_satuan_qty.nomor);
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