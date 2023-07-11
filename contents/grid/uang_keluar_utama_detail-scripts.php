<script language="javascript" type="text/javascript">

function grid_complete_<?=$grid_id?>()
{	
	sum_subtotal_<?=$grid_id?>();
}
function sum_subtotal_<?=$grid_id?>()
{
	sum_subtotal = jQuery(<?=$grid_id?>_element).jqGrid('getCol','subtotal',false,'sum');
    jQuery(<?=$grid_id?>_element).jqGrid('footerData','set',{
		transaksikode :'Total:',
		subtotal      :sum_subtotal
	});
	
	calculate_all();
}
function after_save_cell_<?=$grid_id?>(rowid,cellname)
{
//	sum_subtotal_<?=$grid_id?>();
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