<?php /* script ini hanya formalitas, kolom harga saja yang editable */ ?>
<?php include $dir . "codes/autocomplete_grid.php";
echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
	function autocomplete_barang(element) {
		$(element).on('keyup', function(e) {
			if (e.which === 113)
				browse_beli_order_detail_reloadopen();
		});
		return autocomplete_grid_<?= $grid_id ?>(element, 0, 'beli_order_detail', 'beli_order_detail_barang', 'nomorthbeliorder|browse_beli_order_hidden', '');
	}

	function autocomplete_satuan_unit(element) {
		var nomormhbarang = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'nomormhbarang');
		var barang = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', <?= $grid_id ?>_editing_rowid, 'barang');
		if (nomormhbarang != '' && barang != '') {
			$('#grid_aktif_nomormhbarang').val(nomormhbarang);
			$(element).on('keyup', function(e) {
				if (e.which === 113)
					browse_master_barang_satuan_reloadopen();
			});
			return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_barang_satuan', 'master_barang_satuan', 'nomormhbarang|grid_aktif_nomormhbarang', '');
		} else
			return false;
	}

	function after_complete_<?= $grid_id ?>(rowid, cellname) {
		if (cellname == 'barang') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.beli_order_detail) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'keterangan', <?= $grid_id ?>_selected_suggest.beli_order_detail.keterangan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'cabang_toko', <?= $grid_id ?>_selected_suggest.beli_order_detail.cabang_toko);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'beli_order_toko', <?= $grid_id ?>_selected_suggest.beli_order_detail.beli_order_toko);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_unit', <?= $grid_id ?>_selected_suggest.beli_order_detail.jumlah_unit);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'satuan_unit', <?= $grid_id ?>_selected_suggest.beli_order_detail.satuan_unit);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'harga_ppn', <?= $grid_id ?>_selected_suggest.beli_order_detail.harga_ppn);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'harga', <?= $grid_id ?>_selected_suggest.beli_order_detail.harga);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1', <?= $grid_id ?>_selected_suggest.beli_order_detail.diskon_1);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_nominal_1', <?= $grid_id ?>_selected_suggest.beli_order_detail.diskon_nominal_1);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_2', <?= $grid_id ?>_selected_suggest.beli_order_detail.diskon_2);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_3', <?= $grid_id ?>_selected_suggest.beli_order_detail.diskon_3);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'netto', <?= $grid_id ?>_selected_suggest.beli_order_detail.netto);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', <?= $grid_id ?>_selected_suggest.beli_order_detail.subtotal);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomortdbeliorder', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomor);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhcabangtoko', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomormhcabangtoko);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomorthbeliordertoko', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomorthbeliordertoko);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomortdbeliordertoko', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomortdbeliordertoko);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhbarang', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomormhbarang);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuan', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomormhsatuan);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanunit', <?= $grid_id ?>_selected_suggest.beli_order_detail.nomormhsatuanunit);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', <?= $grid_id ?>_selected_suggest.beli_order_detail.jumlah);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_konversi', <?= $grid_id ?>_selected_suggest.beli_order_detail.jumlah_konversi);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'sn', <?= $grid_id ?>_selected_suggest.beli_order_detail.sn);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'batch', <?= $grid_id ?>_selected_suggest.beli_order_detail.batch);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'expdate', <?= $grid_id ?>_selected_suggest.beli_order_detail.expdate);
			}
		}
		if (cellname == 'satuan_unit') {
			if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_barang_satuan) {
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhsatuanunit', <?= $grid_id ?>_selected_suggest.master_barang_satuan.nomor);
				jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah_konversi', <?= $grid_id ?>_selected_suggest.master_barang_satuan.jumlah);
			}
		}
		<?= $grid_id ?>_selected_suggest = false;

		sum_subtotal_<?= $grid_id ?>();
	}

	function grid_complete_<?= $grid_id ?>() {
		sum_subtotal_<?= $grid_id ?>();
	}

	function sum_subtotal_<?= $grid_id ?>() {
		sum_jumlah_unit = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'jumlah_unit', false, 'sum');
		sum_harga_ppn = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'harga_ppn', false, 'sum');
		sum_harga = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'harga', false, 'sum');
		sum_diskon_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'diskon_1', false, 'sum');
		sum_diskon_nominal_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'diskon_nominal_1', false, 'sum');
		sum_diskon_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'diskon_2', false, 'sum');
		sum_diskon_nominal_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'diskon_nominal_2', false, 'sum');
		sum_netto = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'netto', false, 'sum');
		sum_subtotal = jQuery(<?= $grid_id ?>_element).jqGrid('getCol', 'subtotal', false, 'sum');
		jQuery(<?= $grid_id ?>_element).jqGrid('footerData', 'set', {
			barang: 'Total:',
			jumlah_unit: sum_jumlah_unit,
			harga_ppn: sum_harga_ppn,
			harga: sum_harga,
			diskon_1: sum_diskon_1,
			diskon_nominal_1: sum_diskon_nominal_1,
			diskon_2: sum_diskon_2,
			diskon_nominal_2: sum_diskon_nominal_2,
			netto: sum_netto,
			subtotal: sum_subtotal
		});

		calculate_all();
	}
	/*
	function before_edit_cell_<?= $grid_id ?>(rowid,cellname)
	{
		var sn = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'sn');
		var batch = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch');
		var expdate = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'expdate');
	//	alert('SN = '+sn+' & Batch='+batch+' & ExpDate='+expdate);
		
		if(batch == 0)
		{
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_number',null,'not-editable-cell');
		}
		else
		{
			var colModel = jQuery(<?= $grid_id ?>_element).jqGrid('getGridParam','colModel');
			var colpos = null;
			$(colModel).each(function(i)
			{
				if(this.name == 'batch_number')
				{
					colpos = i;
					return false;
				}
			});
			jQuery('#'+rowid+' td:eq('+colpos+')').removeClass('not-editable-cell');
		}
		
		if(expdate == '0')
		{
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_expired',null,'not-editable-cell');
		}
		else
		{
			var colModel = jQuery(<?= $grid_id ?>_element).jqGrid('getGridParam','colModel');
			var colpos = null;
			$(colModel).each(function(i)
			{
				if(this.name == 'batch_expired')
				{
					colpos = i;
					return false;
				}
			});
			jQuery('#'+rowid+' td:eq('+colpos+')').removeClass('not-editable-cell');
		}
	}*/
	function after_save_cell_<?= $grid_id ?>(rowid, cellname) {
		/*	if(cellname == 'batch_number')
			{
				var batch_number = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch_number');
				var batch = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch');
				var sn = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'sn');
				
				if(batch == '0' && sn == '0' && batch_number != '')
				{
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_number',null);
					alert('Produk ini tidak seharusnya memiliki Batch');
				}
			}
			
			if(cellname == 'batch_expired')
			{
				var batch_expired = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch_expired');
				var expdate = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'expdate');
				
				if(expdate == '0' && batch_expired != '')
				{
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_expired',null);
					alert('Produk ini tidak seharusnya memiliki Exp Date');
				}
			}
		*/
		var jumlah_unit = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_unit');
		var jumlah_konversi = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'jumlah_konversi');
		var jumlah = jumlah_unit * jumlah_konversi;
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'jumlah', jumlah);

		var harga = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'harga');
		harga = round_number(harga, decimal_money);

		if (cellname == 'diskon_nominal_1') {
			var diskon_nominal_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_nominal_1');
			var diskon_1 = diskon_nominal_1 * 100 / harga;
			diskon_1 = round_number(diskon_1, decimal_money);
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_1', diskon_1);
		} else {
			var diskon_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_1');
			var diskon_nominal_1 = harga * diskon_1 / 100;
			diskon_nominal_1 = round_number(diskon_nominal_1, 3);
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_nominal_1', diskon_nominal_1);
		}
		/*
			else
			{
				var diskon_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'diskon_1');
				var diskon_nominal_1 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'diskon_nominal_1');
			}*/

		var netto = (harga * 1) - (diskon_nominal_1 * 1);
		netto = round_number(netto, 3);

		if (cellname == 'diskon_nominal_2') {
			var diskon_nominal_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_nominal_2');
			var diskon_2 = diskon_nominal_2 * 100 / netto;
			diskon_2 = round_number(diskon_2, decimal_money);
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_2', diskon_2);
		} else {
			var diskon_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'diskon_2');
			var diskon_nominal_2 = netto * diskon_2 / 100;
			diskon_nominal_2 = round_number(diskon_nominal_2, 3);
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'diskon_nominal_2', diskon_nominal_2);
		}
		/*
			else
			{
				var diskon_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'diskon_2');
				var diskon_nominal_2 = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'diskon_nominal_2');
			}*/

		netto = (netto * 1) - (diskon_nominal_2 * 1);
		netto = round_number(netto, 3);
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'netto', netto);

		var subtotal = netto * jumlah_unit;
		subtotal = round_number(subtotal, decimal_money);
		jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'subtotal', subtotal);

		sum_subtotal_<?= $grid_id ?>();
	}

	function after_delete_<?= $grid_id ?>() {
		sum_subtotal_<?= $grid_id ?>();
	}

	function row_validation_<?= $grid_id ?>(rowid) {
		jQuery(<?= $grid_id ?>_element).saveRow(rowid, false);
		var cells = [
			'barang|Barang', 'jumlah_unit|Jumlah', 'satuan_unit|Satuan', 'harga_ppn|Harga+PPN',
			'master_nomor|Barang ID', 'nomormhsatuanunit|Satuan ID'
		];
		var check_failed = checkValueCells_<?= $grid_id ?>(rowid, cells);
		if (check_failed != '')
			return check_failed;
		else {
			/*	var batch_number = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch_number');
				var batch = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch');
				var sn = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'sn');
				if(batch == '0' && sn == '0' && batch_number != '')
				{
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_number',null);
					return 'Produk pada baris '+rowid+' ini tidak seharusnya memiliki Batch';
				}
			//	else if((batch == '1' || sn == '1') && batch_number == '')
			//	{
			//		return 'Produk pada baris '+rowid+' ini seharusnya memiliki Batch';
			//	}
				
				var batch_expired = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'batch_expired');
				var expdate = jQuery(<?= $grid_id ?>_element).jqGrid('getCell',rowid,'expdate');
				if(expdate == '0' && batch_expired != '')
				{
					jQuery(<?= $grid_id ?>_element).jqGrid('setCell',rowid,'batch_expired',null);
					return 'Produk pada baris '+rowid+' ini tidak seharusnya memiliki Exp Date';
				}
				else if(expdate == '1' && batch_expired == '')
				{
					return 'Produk pada baris '+rowid+' ini seharusnya memiliki Exp Date';
				}
			*/
			return true;
		}
	}
</script>