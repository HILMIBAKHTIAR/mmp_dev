<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_status_warna_1(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_status_warna_spare_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'status_warna_spare', 'status_warna_spare', '', '');
    }

    function autocomplete_warna(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_warna_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_warna', 'master_warna', '', '');
    }



    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'status_silinder') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.status_warna_spare) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorstatus_warna_spare', <?= $grid_id ?>_selected_suggest.status_warna_spare.nomor);
            }

        }

        if (cellname == 'warna') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_warna) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhwarna', <?= $grid_id ?>_selected_suggest.master_warna.nomor);
            }

        }



        <?= $grid_id ?>_selected_suggest = false;
    }

    function count_grid_row() {
        let jumlah_baris = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getGridParam', 'records'));
        if (isNaN(jumlah_baris)) jumlah_baris = 0;

        $('#jumlahcilinder').val(jumlah_baris);
    }

    function grid_complete_<?= $grid_id ?>() {
        count_grid_row()
    }

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        count_grid_row()
    }

    function after_delete_<?= $grid_id ?>() {
        count_grid_row()
    }

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
            "nomormhwarna|ID Warna"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>