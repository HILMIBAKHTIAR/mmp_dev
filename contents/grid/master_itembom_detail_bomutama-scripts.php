<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    // function autocomplete_satuanbom(element) {
    //     $(element).on('keyup', function(e) {
    //         if (e.which === 113)
    //             browse_master_barang_varian_reloadopen();
    //     });
    //     return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_bom', 'master_satuan_bom', '', '');
    // }

    // function autocomplete_warna(element) {
    //     $(element).on('keyup', function(e) {
    //         if (e.which === 113)
    //             browse_master_barang_varian_reloadopen();
    //     });
    //     return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_warna', 'master_warna', '', '');
    // }

    function autocomplete_prosesbom(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_proses_bom', 'master_proses_bom', '', '');
    }

    function autocomplete_groupbahanbaku(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_groupbahanbaku', 'master_groupbahanbaku', '', '');
    }

    function autocomplete_barangbom(element) {
        var barangkategori = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhbarangkategori');
        $("#nomormhbarangkategoridetail").val(barangkategori);
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_bom', 'master_barang_bom', 'nomormhbarangkategori|nomormhbarangkategoridetail', '');
    }

    function after_complete_<?= $grid_id ?>(rowid, cellname) {
        if (cellname == 'proses') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_proses_bom) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhproses', <?= $grid_id ?>_selected_suggest.master_proses_bom.nomor);
                // jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_customer.nomor);
                set_process_field_from_process_column()
            }
        }
        if (cellname == 'group_tinta') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_groupbahanbaku) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarangkategori', <?= $grid_id ?>_selected_suggest.master_groupbahanbaku.nomor);
                set_process_field_from_process_column()
            }
        }
        if (cellname == 'nama_bahan_baku') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang_bom) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarang', <?= $grid_id ?>_selected_suggest.master_barang_bom.nomor);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'kode_barang', <?= $grid_id ?>_selected_suggest.master_barang_bom.kode_barang);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'lebar', <?= $grid_id ?>_selected_suggest.master_barang_bom.lebar);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'meter', <?= $grid_id ?>_selected_suggest.master_barang_bom.meter);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'micron', <?= $grid_id ?>_selected_suggest.master_barang_bom.micron);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'density', <?= $grid_id ?>_selected_suggest.master_barang_bom.density);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'categori', <?= $grid_id ?>_selected_suggest.master_barang_bom.categori);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'stok', <?= $grid_id ?>_selected_suggest.master_barang_bom.stok);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuanrnd', <?= $grid_id ?>_selected_suggest.master_barang_bom.satuanrnd);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqtyrnd', <?= $grid_id ?>_selected_suggest.master_barang_bom.nomormhsatuanqtyrnd);
                // jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_customer.nomor);
            }
        }
        <?= $grid_id ?>_selected_suggest = false;
    }

    function set_process_field_from_process_column() {
        let processList = []

        var rowids = jQuery(<?= $grid_id ?>_element).jqGrid('getDataIDs');
        for (var i = 0; i < rowids.length; i++) {
            var proses = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowids[i], 'proses');
            console.log({
                proses
            })
            processList.push(proses)
        }

        processList = processList.filter((v, i, a) => a.indexOf(v) === i);
        console.log({
            processList
        })
        processList = processList.join(' / ');
        console.log({
            processList
        })

        $('#proses').val(processList);

    }

    function grid_complete_<?= $grid_id ?>() {
        // set_process_field_from_process_column()
    }

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        set_process_field_from_process_column()
    }

    function after_delete_<?= $grid_id ?>() {
        set_process_field_from_process_column()
    }

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
            "proses|proses",
            "nama_bahan_baku|nama_bahan_baku"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>