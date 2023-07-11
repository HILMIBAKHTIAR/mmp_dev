<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_jenis_packaging(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_jenis_packaging_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_jenis_packaging', 'master_jenis_packaging', '', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {
        console.log({
            cellname,
            <?= $grid_id ?>_selected_suggest
        })
        if (cellname == 'jenis_packaging') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_jenis_packaging) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhjenispackaging', <?= $grid_id ?>_selected_suggest.master_jenis_packaging.nomor);
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
            "produk|Produk",
            "nomormhjenispackaging|ID Jenis Packaging",
            // "nomor|ID",
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>