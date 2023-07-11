<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html;?>
<script language="javascript" type="text/javascript">
function autocomplete_proyek(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_account_uang_detail_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_proyek','master_proyek','','');
}

function autocomplete_pekerjaan_proyek(element)
{
	console.log($('#proyek_terpilih').val())
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_account_uang_detail_reloadopen();
	});
	
	return autocomplete_grid_<?=$grid_id?>(element,0,'pekerjaan_proyek','pekerjaan_proyek','nomor|proyek_terpilih','');
}


function autocomplete_account(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_account_uang_detail_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_account_data','master_account_lain','','');
}
function after_complete_<?=$grid_id?>(rowid,cellname)
{
	if(cellname == 'account')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_account_data)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhaccount',<?=$grid_id?>_selected_suggest.master_account_data.nomor);
		}
	}
	if(cellname == 'proyek')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_proyek)
		{

			$('#proyek_terpilih').val(<?=$grid_id?>_selected_suggest.master_proyek.nomor);
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhproyek',<?=$grid_id?>_selected_suggest.master_proyek.nomor);
			console.log($('#proyek_terpilih').val())
		}
	}
	if(cellname == 'pekerjaan')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_pekerjaan_proyek)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhpekerjaan',<?=$grid_id?>_selected_suggest.master_pekerjaan_proyek.nomor);
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
	sum_subtotal_<?=$grid_id?>();
}
function after_delete_<?=$grid_id?>()
{
	sum_subtotal_<?=$grid_id?>();
}
function row_validation_<?=$grid_id?>(rowid)
{
	var cells = ['account|Account','nomormhaccount|ID Account'];
	var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
</script>