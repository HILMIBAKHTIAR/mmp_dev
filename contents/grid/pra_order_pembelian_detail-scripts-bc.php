<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_permintaan_barang(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_grid_permintaan_pembelian_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'grid_permintaan_pembelian', 'grid_permintaan_pembelian', '', '');
    }


    function autocomplete_master_relasi(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_grid_master_relasi_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_relasi', 'master_relasi', '', '');
    }
    


    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'kode_permintaan') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomortdbelipermintaan', <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian.nomor);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'kode_barang', <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian.kode_barang);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nama_barang', <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian.nama_barang);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'qty', <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian.qty);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_permintaan', <?= $grid_id ?>_selected_suggest.grid_permintaan_pembelian.satuan_permintaan);
            }    
        }

        if (cellname == 'supplier') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_relasi) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_relasi.nomor);
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