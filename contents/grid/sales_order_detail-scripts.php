<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    function autocomplete_barang_customer(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_barang_customer_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_customer_sales_order', 'master_barang_customer_sales_order', 'nomor|browse_master_customer_po_hidden', '');
    }



    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'produk') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang_customer_sales_order) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorthbarang', <?= $grid_id ?>_selected_suggest.master_barang_customer_sales_order.nomor);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'price', <?= $grid_id ?>_selected_suggest.master_barang_customer_sales_order.harga);
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'po_customer', <?= $grid_id ?>_selected_suggest.master_barang_customer_sales_order.po_customer);
            }
        }

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {
        // sum_subtotal_<?= $grid_id ?>();
    }

    function sum_subtotal_<?= $grid_id ?>() {
        var subtotal = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
        var uang_muka = 0;

        var diskon_nominal = parseFloat($('#diskon_prosentase').val()) / 100 * subtotal;
        $('#diskon_nominal').val(diskon_nominal);

        var ppn_prosentase = parseFloat($('#ppn_prosentase').val());
        $('#subtotal').val(subtotal);

        var status_ppn = $('#status_ppn').val();

        if (status_ppn == 'Non PPN' || status_ppn == 'Exclude') {
            $('#dpp').val(subtotal - diskon_nominal - uang_muka);
            var dpp = parseFloat($('#dpp').val());

            $('#ppn_nominal').val(dpp * ppn_prosentase / 100)
            var ppn_nominal = parseFloat($('#ppn_nominal').val());

            var total = dpp + ppn_nominal;
            $('#total').val(total);
            $('#total_include').val(total);
        } else {
            var total = parseFloat(subtotal) - parseFloat(diskon_nominal) - parseFloat(uang_muka);

            $('#total').val(total);
            $('#total_include').val(total);

            var ppn = parseFloat($('#ppn').val());
            var ppn_nominal = ppn_prosentase / 100 * (total / (1 + ppn_prosentase / 100));
            $('#ppn_nominal').val(ppn_nominal);

            var dpp = parseFloat(total) - parseFloat(ppn_nominal);
            $('#dpp').val(dpp);
        }
    }

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {

        var qty = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'quantity');
        var harga = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'price');
        var amount = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'amount');
        var subtotal = parseFloat(qty) * parseFloat(harga)
        console.log(qty, harga, amount, subtotal)
        jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

        sum_subtotal_<?= $grid_id ?>();
    }

    function after_delete_<?= $grid_id ?>() {
        sum_subtotal_<?= $grid_id ?>();
    }

    function row_validation_<?= $grid_id ?>(rowid) {

        var cells = [
            "nomorthbarang|ID Barang"
        ];

        var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);

        if (check_failed != '')
            return check_failed;
        else
            return true;
    }
</script>