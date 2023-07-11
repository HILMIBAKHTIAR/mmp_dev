<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_provinsi2(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_provinsi', 'master_provinsi', '', '');
    }

    function autocomplete_kabupaten2(element) {
        var provinsi = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhprovinsi');
        $("#nomormhprovinsidetail").val(provinsi);
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_kabupaten', 'master_kabupaten', 'nomormhprovinsi|nomormhprovinsidetail', '');
        // return autocomplete_grid_<?= $grid_id ?>(element,0,'master_barang_sparepart','master_barang_sparepart_pemakaian','nomormhgudang|browse_master_gudang_hidden,tanggal|tanggal','');
    }

    function autocomplete_kecamatan2(element) {
        var kabupaten = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhkabupaten');
        $("#nomormhkabupatendetail").val(kabupaten);
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_kecamatan', 'master_kecamatan', 'nomormhkabupaten|nomormhkabupatendetail', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'provinsi') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_provinsi) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhprovinsi', <?= $grid_id ?>_selected_suggest.master_provinsi.nomor);
                // jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'keterangan', <?= $grid_id ?>_selected_suggest.master_satuan.keterangan);
            }
        }
        if (cellname == 'kabupaten') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_kabupaten) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhkabupaten', <?= $grid_id ?>_selected_suggest.master_kabupaten.nomor);
            }
        }
        if (cellname == 'kecamatan') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_kecamatan) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhkecamatan', <?= $grid_id ?>_selected_suggest.master_kecamatan.nomor);
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
            "alamat|alamat"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>