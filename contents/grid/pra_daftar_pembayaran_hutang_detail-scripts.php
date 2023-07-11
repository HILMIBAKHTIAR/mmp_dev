<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
function autocomplete_account_pph(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_master_barang_divisi_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_account_pph','master_account_pph','','');
}
function grid_complete_<?=$grid_id?>()
{
	sum_subtotal_<?=$grid_id?>();
}
function sum_subtotal_<?=$grid_id?>()
{
	// sum_sisa = jQuery(<?=$grid_id?>_element).jqGrid('getCol','sisa',false,'sum');
	// sum_bayar = jQuery(<?=$grid_id?>_element).jqGrid('getCol','bayar',false,'sum');
	// sum_pph23 = jQuery(<?=$grid_id?>_element).jqGrid('getCol','pph23',false,'sum');
	sum_subtotal = jQuery(<?=$grid_id?>_element).jqGrid('getCol','subtotal',false,'sum');
	jQuery(<?=$grid_id?>_element).jqGrid('footerData','set',{
		valuta :'Total:',
		// sisa          :sum_sisa,
		// bayar         :sum_bayar,
		// pph23         :sum_pph23,
		subtotal      :sum_subtotal
	});
	
	calculate_all();
}
function after_complete_<?=$grid_id?>(rowid,cellname)
{
	if(cellname == 'account_pph')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_account_pph)
		{
		//	jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'account',<?=$grid_id?>_selected_suggest.account_data.kode+' - '+<?=$grid_id?>_selected_suggest.account_data.nama);
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhaccountpph',<?=$grid_id?>_selected_suggest.master_account_pph.nomor);
			
		}
	}
	<?=$grid_id?>_selected_suggest = false;
}
function after_save_cell_<?=$grid_id?>(rowid,cellname)
{
	var sisa = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'sisa');
	sisa = sisa*1;
	var bayar = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'bayar');
	bayar = bayar*1;
	if(bayar > sisa)
	{
		bayar = sisa;
		jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'bayar',bayar);
		alert('Pembayaran Transaksi tidak boleh melebihi Total Transaksi.');
	}
	

	// var total_bayar = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'total_bayar');
	// var total = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'total');

	// if(total != 0)
	// {
	// 	jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'total_bayar', total);
	// }


	

		var total_bayar = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'total_bayar');
		var total = jQuery(<?= $grid_id ?>_element).jqGrid('getCell', rowid, 'total');

		if (total == NULL) {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'total', total_bayar);
		} else {
			jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'total', total);
		}


	var pph23 = parseFloat(jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'pph23'))/100;
	pph23 = pph23*1;

	var ppn=parseFloat(jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'ppn'))/100;	
	var pph23_nominal=bayar*pph23/(1+ppn);

	var multiplier = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'multiplier');
	var kurs= jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'kurs');
	var jenis=jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'jenis');

	if(jenis=='BELI_NOTA_PIB'){
		var subtotal = (bayar) * multiplier*kurs;
	}
	else{
		var subtotal = (bayar-pph23_nominal) * multiplier*kurs;	
	}
	jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'subtotal',subtotal);
	
	sum_subtotal_<?=$grid_id?>();
}
function after_delete_<?=$grid_id?>()
{
	sum_subtotal_<?=$grid_id?>();
}
function row_validation_<?=$grid_id?>(rowid)
{
	var cells = [ ];
	var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
</script>