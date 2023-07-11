<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_customer(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_customer', 'master_customer', '', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'nama_customer') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_customer) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'alamat_customer', <?= $grid_id ?>_selected_suggest.master_customer.alamat_customer);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_customer.nomor);
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
            "pic|pic", "telepon|telepon"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>