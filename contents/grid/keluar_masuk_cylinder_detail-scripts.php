<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_status_warna(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_status_warna_spare_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'status_warna_spare', 'status_warna_spare', '', '');
    }

    

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'status_silinder') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.status_warna_spare) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorstatus_warna_spare', <?= $grid_id ?>_selected_suggest.status_warna_spare.nomor);
            }
            
        }


        <?= $grid_id ?>_selected_suggest = false;
    }

    function count_grid_row() {
        let jumlah_baris = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getGridParam', 'records'));
        if (isNaN(jumlah_baris)) jumlah_baris = 0;

        $('#jumlah_cylinder').val(jumlah_baris);
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
         
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>