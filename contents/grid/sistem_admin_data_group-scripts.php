<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">
function autocomplete_cabang_pt_3(element)
{
	$(element).on('keyup',function(e)
	{
		if(e.which === 113)
			browse_grid_master_cabang_pt_reloadopen();
	});
	return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang_pt','master_cabang_pt','','');
}
function autocomplete_cabang_3(element)
{
	var nomormhusaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'nomormhusaha');
	var usaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'usaha');
	if(nomormhusaha != '' && usaha != '')
	{
		$('#grid_aktif_nomormhusaha').val(nomormhusaha);
		$(element).on('keyup',function(e)
		{
			if(e.which === 113)
				browse_grid_master_cabang_reloadopen();
		});
		return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang','master_cabang','nomormhusaha|grid_aktif_nomormhusaha','');
	}
	else
		return false;
}
function autocomplete_group(element)
{
	// var nomormhcabang = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'nomormhcabang');
	// var cabang = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'cabang');
	var nomormhusaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'nomormhusaha');
	var usaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'usaha');
	if(nomormhusaha != '' && usaha != '')
	{
		$('#grid_aktif_nomormhusaha').val(nomormhusaha);
		// $('#grid_aktif_nomormhcabang').val(nomormhcabang);
		$(element).on('keyup',function(e)
		{
			if(e.which === 113)
				browse_grid_master_gudang_reloadopen();
		});
		return autocomplete_grid_<?=$grid_id?>(element,0,'master_group','master_group','nomormhusaha|grid_aktif_nomormhusaha','');
	}
	else
		return false;
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
	// if(cellname == 'cabang')
	// {
	// 	if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_cabang)
	// 	{
	// 		jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhcabang',<?=$grid_id?>_selected_suggest.master_cabang.nomor);
	// 	}
	// }
	if(cellname == 'admin_group')
	{
		if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_group)
		{
			jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'relasi_nomor',<?=$grid_id?>_selected_suggest.master_group.nomor);
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
	var cells = ["admin_group|Group","usaha|Perusahaan ID"];
	var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
</script>