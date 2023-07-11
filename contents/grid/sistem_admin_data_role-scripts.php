<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
function autocomplete_cabang_pt_4(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_cabang_pt_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang_pt','master_cabang_pt','','');
}
function autocomplete_role(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_role_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_role','master_role','','');
}
function after_complete_<?=$grid_id?>(rowid,cellname)
{
	if(cellname == 'usaha')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_cabang_pt)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhusaha',<?=$grid_id?>_selected_suggest.master_cabang_pt.nomor);
		}
	}
	if(cellname == 'role')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_role)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'relasi_nomor',<?=$grid_id?>_selected_suggest.master_role.nomor);
		}
	}
	<?=$grid_id?>_selected_suggest = false;
}
function grid_complete_<?=$grid_id?>()
{	}
function sum_subtotal_<?=$grid_id?>()
{	}
function after_save_cell_<?=$grid_id?>(rowid,cellname)
{	}
function after_delete_<?=$grid_id?>()
{	}
function row_validation_<?=$grid_id?>(rowid)
{
	var cells = ["relasi_nomor|Role","nomormhusaha|Perusahaan ID"];
	var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
</script>