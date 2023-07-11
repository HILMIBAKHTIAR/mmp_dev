<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_barangcustomer(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_proses_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_customer', 'master_barang_customer', '', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'nama_barang') {
            console.log({
                <?= $grid_id ?>_selected_suggest
            })
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang_customer) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorthbarang', <?= $grid_id ?>_selected_suggest.master_barang_customer.nomor);
                // jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'mikron', parseFloat(<?= $grid_id ?>_selected_suggest.master_bahanbaku_film.ketebalan));
            }

        }

        <?= $grid_id ?>_selected_suggest = false;
    }


    function grid_complete_<?= $grid_id ?>() {
    }

    function get_komposisi_column_all_row1() {
    }

    function calculate_thickness() {
    }

    function sum_subtotal_<?= $grid_id ?>() {
    }

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
    }

    function after_delete_<?= $grid_id ?>() {
    }

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
            // "nomorthbarang|ID Barang"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>