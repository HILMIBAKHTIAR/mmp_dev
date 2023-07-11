<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
    
    function autocomplete_satuan_qty(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_satuan_qty_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_satuan_purchasing', 'master_satuan_purchasing', '', '');
    }


    function autocomplete_barang(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_barang_pembelian_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_pembelian', 'master_barang_pembelian', '', '');
    }
    

    function autocomplete_department(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_department_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_department', 'master_department', '', '');
    }
    

    function autocomplete_supplier(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_supplier_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_supplier', 'master_supplier', '', '');
    }
    


    function after_complete_<?= $grid_id ?>(rowid, cellname) {

        if (cellname == 'department') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_department) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhdepartemen', <?= $grid_id ?>_selected_suggest.master_department.nomor);
            }    
        }

        if (cellname == 'satuan_qty') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_satuan_purchasing) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqty', <?= $grid_id ?>_selected_suggest.master_satuan_purchasing.nomor);
            }    
        }

        if (cellname == 'supplier') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_supplier) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhrelasi', <?= $grid_id ?>_selected_suggest.master_supplier.nomor);
            }    
        }


        if (cellname == 'barang') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang_pembelian) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarang', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.nomor);

                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'barang', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.barang);

                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_qty', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.satuan);

                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'berat_jenis', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.berat_jenis);

                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanqty', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.nomormhsatuanqtypurchasing);

                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanberat', <?= $grid_id ?>_selected_suggest.master_barang_pembelian.nomormhsatuanberatpurchasing);
            }       
        }

	

        <?= $grid_id ?>_selected_suggest = false;
    }

    function grid_complete_<?= $grid_id ?>() {}

    function sum_subtotal_<?= $grid_id ?>() {}

    function after_save_cell_<?= $grid_id ?>(rowid, cellname) {

        //untuk pengecekan qty 
		var jumlah_unit = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_unit'));
		// var jumlah_konversi = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_konversi'));
		var jumlah = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah'));
        var jumlah_berat = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_berat'));
        var berat_jenis = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'berat_jenis'));

        var jumlah_konversi = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'berat_jenis')); 

		var total_jumlah_terkonversi = jumlah_unit * jumlah_konversi;
    


		if (total_jumlah_terkonversi) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_berat', total_jumlah_terkonversi);
            jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah_unit);
		} else {
            jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_berat', jumlah_unit);
            jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah_unit);
			
		}

        var jumlah_pesanan = parseFloat(jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_pesanan'));

        if (jumlah_pesanan == '') {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_pesanan', 0);
		} else {
            jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_pesanan', jumlah_pesanan);
			
		}



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