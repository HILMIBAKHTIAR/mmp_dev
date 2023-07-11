<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_proses(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_proses_varian_reloadopen();
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
        // sum_subtotal_<?= $grid_id ?>();
    }

    function sum_subtotal_<?= $grid_id ?>() {
        var sum_mikron = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'mikron', false, 'sum');
        var sum_mikron_1 = parseFloat($('#sum_mikron_1').val())

        if (isNaN(sum_mikron)) sum_mikron = 0;
        if (isNaN(sum_mikron_1)) sum_mikron_1 = 0;

        console.log({
            sum_mikron
        })
        $('#sum_mikron_2').val(sum_mikron)


        $('#total_thickness').val(sum_mikron + sum_mikron_1)
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

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        sum_subtotal_<?= $grid_id ?>();
        insert_proses()
    }

    function after_delete_<?= $grid_id ?>() {
        sum_subtotal_<?= $grid_id ?>();
        insert_proses()
    }

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