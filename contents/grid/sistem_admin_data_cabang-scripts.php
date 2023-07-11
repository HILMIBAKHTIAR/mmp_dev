<?php include $dir."codes/autocomplete_grid.php"; echo $autogrid_html; ?>
<script language="javascript" type="text/javascript">


// function autocomplete_cabang_pt(element)
// {
// 	$(element).on('keyup',function(e)
// 	{
// 		if(e.which === 113)
// 			browse_grid_master_cabang_pt_reloadopen();
// 	});
// 	return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang_pt','master_cabang_pt','','');
// }
// function autocomplete_cabang_1(element)
// {
// 	var nomormhusaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'nomormhusaha');
// 	var usaha = jQuery(<?=$grid_id?>_element).jqGrid('getCell',<?=$grid_id?>_editing_rowid,'usaha');
// 	if(nomormhusaha != '' && usaha != '')
// 	{
// 		$('#grid_aktif_nomormhusaha').val(nomormhusaha);
// 		$(element).on('keyup',function(e)
// 		{
// 			if(e.which === 113)
// 				browse_grid_master_cabang_reloadopen();
// 		});
// 		return autocomplete_grid_<?=$grid_id?>(element,0,'master_cabang','master_cabang','nomormhusaha|grid_aktif_nomormhusaha','');
// 	}
// 	else
// 		return false;
// }


function autocomplete_cabang(element) {
        $(element).on('keyup', function(e) {
            if (e.which === 113)
                browse_master_cabang_varian_reloadopen();
        });
        return autocomplete_grid_<?= $grid_id ?>(element, 0, 'master_cabang', 'master_cabang', '', '');
    }






function after_complete_<?=$grid_id?>(rowid,cellname)
{
	// if(cellname == 'usaha')
	// {
	// 	if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_cabang_pt)
	// 	{
	// 		jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'nomormhusaha',<?=$grid_id?>_selected_suggest.master_cabang_pt.nomor);
	// 	}
	// }

	// if(cellname == 'cabang')
	// {
	// 	if(<?=$grid_id?>_selected_suggest && <?=$grid_id?>_selected_suggest.master_cabang)
	// 	{
	// 		jQuery(<?=$grid_id?>_element).jqGrid('setCell',rowid,'relasi_nomor',<?=$grid_id?>_selected_suggest.master_cabang.nomor);
	// 	}
	// }

	if (cellname == 'cabang') {
            if (<?= $grid_id ?>_selected_suggest && <?= $grid_id ?>_selected_suggest.master_cabang) {
                // SETTING OTHER FIELD
                jQuery(<?= $grid_id ?>_element).jqGrid('setCell', rowid, 'nomormhcabang', <?= $grid_id ?>_selected_suggest.master_cabang.nomor);
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
// function row_validation_<?=$grid_id?>(rowid)
// {
// 	// var cells = ["cabang|Cabang","relasi_nomor|Cabang ID"];
// 	var cells = ["cabang|Cabang","relasi_nomor|Cabang ID"];
// 	var check_failed = checkValueCells_<?=$grid_id?>(rowid,cells);
// 	if(check_failed != '')
// 		return check_failed;
// 	else
// 		return true;
// }

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