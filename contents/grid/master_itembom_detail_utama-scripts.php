<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_proses(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_outlet', 'master_barang_outlet', '', '');
    }

    function autocomplete_kodebarang(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_outlet', 'master_barang_outlet', '', '');
    }

    function autocomplete_satuan(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_bom', 'master_satuan_bom', '', '');
    }
    function autocomplete_groupbahanbaku(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_group_bahanbaku', 'master_group_bahanbaku', '', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'satuan') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_bom) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan', <?= $grid_id ?>_selected_suggest.master_satuan_bom.nomor);
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