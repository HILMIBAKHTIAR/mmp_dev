<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_proses(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_proses_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_proses_bom', 'master_proses_bom', '', '');
    }


        
    function autocomplete_downtime(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_downtime_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_downtime', 'master_downtime', '', '');
    }
    

    function autocomplete_pegawai(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_pegawai_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_pegawai', 'master_pegawai', '', '');
    }


    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'process') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_proses_bom) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhproses', <?= $grid_id ?>_selected_suggest.master_proses_bom.nomor);
            }
            
        }


        
        if (cellname == 'downtime') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_downtime) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhdowntime', <?= $grid_id ?>_selected_suggest.master_downtime.nomor);
            }
            
        }


        if (cellname == 'supervisor') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorsupervisor', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'operator1') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomoroperator1', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'operator2') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomoroperator2', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }


        
        if (cellname == 'colormixer1') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorcolormixer1', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'colormixer2') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorcolormixer2', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'helper1') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorhelper1', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'helper2') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorhelper2', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
            }
            
        }

        if (cellname == 'qc') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_pegawai) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorqc', <?= $grid_id ?>_selected_suggest.master_pegawai.nomor);
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