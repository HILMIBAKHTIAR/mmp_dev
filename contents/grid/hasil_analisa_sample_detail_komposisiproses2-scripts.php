<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_bahanbakufilm2(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_proses_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_bahanbaku_film', 'master_bahanbaku_film', '', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'komposisi') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_bahanbaku_film) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarang', <?= $grid_id ?>_selected_suggest.master_bahanbaku_film.nomor);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'mikron', parseFloat(<?= $grid_id ?>_selected_suggest.master_bahanbaku_film.ketebalan));
            }

        }

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {
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

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        sum_subtotal_<?= $grid_id ?>();
    }

    function after_delete_<?= $grid_id ?>() {
        sum_subtotal_<?= $grid_id ?>();
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