<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_proses(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_warna_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_proses', 'master_proses', '', '');
    }


    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'proses') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_proses) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhproses', <?= $grid_id ?>_selected_suggest.master_proses.nomor);
            }

        }

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {
        insert_proses()
    }

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        insert_proses()
    }

    function insert_proses() {
        var proses_column_all_row = [];
        var proses_column_all_row = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'proses', false);
        console.log({
            proses_column_all_row
        })

        // array to string proses_column_all_row separate by ' / '
        proses_column_all_row = proses_column_all_row.join(' / ');
        console.log({
            proses_column_all_row
        })
        $('#tahapan_proses').val(proses_column_all_row)
        return proses_column_all_row;
    }
    function after_delete_<?= $grid_id ?>() {}

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
            "nomormhproses|ID Proses"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>