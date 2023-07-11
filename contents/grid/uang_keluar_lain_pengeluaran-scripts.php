<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html;?>
<script language="javascript" type="text/javascript">
function autocomplete_pengeluaran(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_pengeluaran_uang_detail_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_pengeluaran_data','master_account_jenis_pengeluaran','','');
}
function autocomplete_cabang(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_cabang_uang_detail_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang','master_cabang','','');
}
function after_complete_<?=$grid_id?>(rowid,cellname)
{
	if(cellname == 'pengeluaran')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_pengeluaran_data)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'transaksi_nomor',<?=$grid_id?>_selected_suggest.master_pengeluaran_data.transaksi_nomor);
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'transaksi_tabel',<?=$grid_id?>_selected_suggest.master_pengeluaran_data.transaksi_tabel);
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'jenis',<?=$grid_id?>_selected_suggest.master_pengeluaran_data.jenis);
		}
	}
	if(cellname == 'cabang')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_cabang)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhcabang',<?=$grid_id?>_selected_suggest.master_cabang.nomor);
		}
	}
	<?=$grid_id?>_selected_suggest = false;
}
function grid_complete_<?=$grid_id?>()
{	
	sum_subtotal_<?=$grid_id?>();
}
function sum_subtotal_<?=$grid_id?>()
{
	sum_subtotal = jQuery(<?=$grid_id?>_element).jqGrid('getCol','subtotal',false,'sum');
    jQuery(<?=$grid_id?>_element).jqGrid('footerData','set',{
		account:'Total:',
		subtotal:sum_subtotal
	});
	
	calculate_all();
}
function after_save_cell_<?=$grid_id?>(rowid,cellname)
{
	// var nomormhaccount_header = $('#browse_master_account_kasbank_hidden').val();
	// var nomormhaccount_detail = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'nomormhaccount');
	// if(nomormhaccount_header == nomormhaccount_detail)
	// {
	// 	var message = 'Account Header Dengan Account Detail Tidak Boleh Sama <span style= "color:#e74c3c">&#10008;</span>';
	// 	$.alert({title: 'ALERT',content: message,icon: 'fa fa-warning',theme: 'modern',type: 'red'});
	// }
	sum_subtotal_<?=$grid_id?>();
}
function after_delete_<?=$grid_id?>()
{
	sum_subtotal_<?=$grid_id?>();
}
function row_validation_<?=$grid_id?>(rowid)
{
	// var nomormhaccount_header = $('#browse_master_account_kasbank_hidden').val();
	// var nomormhaccount_detail = jQuery(<?=$grid_id?>_element).jqGrid('getCell',rowid,'nomormhaccount');
	
	// jQuery(<?=$grid_id?>_element).saveRow(rowid, false);
	// var cells = ['account|Account','nomormhaccount|ID Account'];
	// var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
	// if(check_failed != '')
	// 	return check_failed;
	// if(nomormhaccount_header == nomormhaccount_detail)
	// 	return check_failed;
	// else
		return true;
}
</script>