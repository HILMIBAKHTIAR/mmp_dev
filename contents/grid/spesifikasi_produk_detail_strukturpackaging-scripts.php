<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_satuan_qty(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_qty_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_qty', 'master_satuan_qty', '', '');
    }


	function autocomplete_satuan_berat(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_berat_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_berat', 'master_satuan_berat', '', '');
    }
    

    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'satuan_qty') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_qty) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqty', <?= $grid_id ?>_selected_suggest.master_satuan_qty.nomor);
            }
            
        }

		if (cellname == 'satuan_berat') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_berat) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanberat', <?= $grid_id ?>_selected_suggest.master_satuan_berat.nomor);
            }
            
        }

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {
        insert_strukturpackaging()
    }

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
        insert_strukturpackaging()
    }

    function after_delete_<?= $grid_id ?>() {
        insert_strukturpackaging()
    }

    function insert_strukturpackaging() {
        var struktur_column_all_row = [];
        var struktur_column_all_row = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'struktur_packaging', false);
        console.log({
            struktur_column_all_row
        })

        // array to string struktur_column_all_row separate by ' / '
        struktur_column_all_row = struktur_column_all_row.join(' / ');
        console.log({
            struktur_column_all_row
        })
        $('#struktur_packaging').val(struktur_column_all_row)
        return struktur_column_all_row;
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