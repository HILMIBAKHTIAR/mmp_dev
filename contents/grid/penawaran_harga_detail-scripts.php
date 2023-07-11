<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_barangspesifikasiproduk(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_barang_spesifikasi_produk_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'barang_spesifikasi_produk', 'barang_spesifikasi_produk', '', '');
    }



    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'nama') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorthspesifikasiproduk', <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk.nomor);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'warna', <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk.warna);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'komposisi', <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk.komposisi);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'moq', <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk.moq);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'harga', <?= $grid_id ?>_selected_suggest.barang_spesifikasi_produk.harga);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'size', 0);
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
            "nomorthspesifikasiproduk|Id Spefikasi Produk"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>