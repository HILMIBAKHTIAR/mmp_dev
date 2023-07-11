<?php ob_start(); ?>
<script type="text/javascript">
function autoResize_<?php echo $grid_id?>(obj)
{
	// Resize Jqgrid
	var $this 		= $(obj), iCol, iRow, rows, row, cm, colWidth,
        $cells 		= $this.find(">tbody>tr>td"),
        $colHeaders = $(obj.grid.hDiv).find(">.ui-jqgrid-hbox>.ui-jqgrid-htable>thead>.ui-jqgrid-labels>.ui-th-column>div"),
        colModel 	= $this.jqGrid("getGridParam", "colModel"),
        n 			= $.isArray(colModel) ? colModel.length : 0,
        idColHeadPrexif = "jqgh_" + obj.id + "_";

    $cells.wrapInner("<span class='wrapper-width' style='white-space: nowrap'></span>");
    $colHeaders.wrapInner("<span class='wrapper-width'></span>");

    maxColWidth 	= [];
    headerWidth 	= [];
    sumCellWidth 	= 0;
    countColWidth 	= 0;

    for (iCol = 0; iCol < n; iCol++) {
    	cm 			= colModel[iCol];
        colWidth 	= parseInt($("#" + idColHeadPrexif + $.jgrid.jqID(cm.name) + ">.wrapper-width").outerWidth()) + 10;
        headerWidth[iCol] = colWidth;
        maxColWidth[iCol] = colWidth;
    	for (iRow = 0, rows = obj.rows; iRow < rows.length; iRow++) 
    	{
    		row 		= rows[iRow];
	    	cellWidth 	= parseInt($(row.cells[iCol]).find(".wrapper-width").outerWidth());
	    	if ($(row).hasClass("jqgrow") && !cm.hidden) 
	    	{
	    		if(cm.name == "cb")
            		cellWidth = 25;
            	else
            		cellWidth += 15;

            	if(typeof cm.maxwidth !== 'undefined' && cellWidth > cm.maxwidth)
            		cellWidth = cm.maxwidth;
            	if(typeof cm.minwidth !== 'undefined' && cellWidth < cm.minwidth)
            		cellWidth = cm.minwidth;
	    		maxColWidth[iCol] = Math.max(maxColWidth[iCol], cellWidth);
	    	}
    	}
    	if(!cm.hidden && cm.name != "cb" && cm.name != "rn")
    	{
    		// if(colWidth >= maxColWidth[iCol]){
	    		countColWidth 	+= 1;
	    		sumCellWidth 	+= maxColWidth[iCol];
    		// }
		    // else
		    // 	sumCellWidth += maxColWidth[iCol];
    	}
    }
    
    tableWidth 	= 1050;
    addWidth 	= 0;
    <?php if(isset($_SESSION["setting"]["grid_width"]) && !empty($_SESSION["setting"]["grid_width"])) {?>
    	tableWidth = <?php echo $_SESSION["setting"]["grid_width"] ?>;
    <?php }?>
	addWidth = (tableWidth - sumCellWidth );
   	if(addWidth > 0)
   		addWidth /= countColWidth;
   	else
   		addWidth = 0;
    
    for (iCol = 0; iCol < n; iCol++) 
    {
    	cm = colModel[iCol];
        if(!cm.hidden && cm.name != "rn" && cm.name != "cb")
        	maxColWidth[iCol] = maxColWidth[iCol] + addWidth; 
        else if(cm.name == "cb" || cm.name == "rn")
        	maxColWidth[iCol] = 25;
        $this.jqGrid("setColWidth", iCol, maxColWidth[iCol]);
    }
   	
	<?php if (array_key_exists('colHeader', $grid)) { ?>
		$this.jqGrid("destroyGroupHeader");
		var groupHeaders = <?php echo $group_header_var ?>;
		for (var iRow = 0; iRow < groupHeaders.length; iRow++) {
			$this.jqGrid("setGroupHeaders", groupHeaders[iRow]);
		}
	<?php } ?>
    $('.wrapper-width').contents().unwrap();
}

function actGridComplete_<?php echo $grid_id?>(obj = '')
{
	if(<?php echo $grid_id?>_load == 0)
	{
		var records = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','records');
		/*
		for(var i = 1; i <= records; i++)
		{
			var exist = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',i,1);
			if(exist != '')<?php echo $grid_id?>_unique[i] = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',i,<?php echo $grid_id?>_column_unique);
		}
		*/<?php echo $grid_id?>_new_record = (records*1) + 1;<?php echo $grid_id?>_load++;
	}
	grid_complete_<?php echo $grid_id?>();
	if(obj != '')
		autoResize_<?php echo $grid_id?>(obj);
	vgrid_comp['<?php echo $grid_id?>'] = 'completed'; // new sync
}

function actLoadComplete_<?php echo $grid_id?>() // new sync
{
	autoResize_<?php echo $grid_id?>(this);
	vgrid_load['<?php echo $grid_id?>'] = 'done';
}
function actFormatCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{
//	return value;
}
function actBeforeEditCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{
	if(<?php echo $grid_id?>_before_edit_cell == 1)
		before_edit_cell_<?php echo $grid_id?>(rowid,cellname);
	if(/*rowid ==<?php echo $grid_id?>_new_record-1 && */cellname == "add")
		actAddFunc_<?php echo $grid_id?>();
	else
	{<?php echo $grid_id?>_allow_delete = 0;<?php echo $grid_id?>_editing_rowid = rowid;<?php echo $grid_id?>_editing_cellname = cellname;<?php echo $grid_id?>_editing_value = value;<?php echo $grid_id?>_editing_iRow = iRow;<?php echo $grid_id?>_editing_iCol = iCol;
	}
}
function actAfterEditCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{
//	alert('rowid='+rowid+' cellname='+cellname+' value='+value+' iRow='+iRow+' iCol='+iCol);
/*	var cellDOM = this.rows[iRow].cells[iCol],oldKeydown,
		$cellInput = $('input,select,textarea',cellDOM),
		events = $._data($cellInput[0],'events'),
		$this = $(this);
	if(events && events.keydown && events.keydown.length)
	{
		oldKeydown = events.keydown[0].handler;
		$cellInput.unbind('keydown',oldKeydown);
		$cellInput.bind('keydown',function(e)
		{
			oldKeydown.call(this,e);
		}).bind('focusout',function(e){
			$this.jqGrid('saveCell',iRow,iCol,true);
		});
	}*/
}
function actBeforeSaveCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{
//	alert('rowid='+rowid+' cellname='+cellname+' value='+value+' iRow='+iRow+' iCol='+iCol);
	after_complete_<?php echo $grid_id?>(rowid,cellname);
}
function actAfterSaveCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{
	<?php echo $grid_id?>_allow_delete = 1;
	<?php if($edit["uppercase"] == 1) { ?>
		colModel = jQuery(<?php echo $grid_id?>_element).jqGrid("getGridParam", "colModel");
		if (colModel[iCol].edittype != 'select')
		{
		// if(!colModel[iCol].hasOwnProperty("editoptions")) 
		// {
			var data = jQuery(<?php echo $grid_id?>_element).jqGrid("getCell", rowid, cellname);
			jQuery(<?php echo $grid_id?>_element).jqGrid("setCell", rowid, cellname, data.toUpperCase());
		// }
		}
    <?php } ?>
	if(rowid >= 0 && value != '')
	{
		if(<?php echo $grid_id?>_selected_suggest)
			after_complete_<?php echo $grid_id?>(rowid,cellname);
		
		after_save_cell_<?php echo $grid_id?>(rowid,cellname);
		/*<?php echo $grid_id?>_unique[rowid] = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',rowid,<?php echo $grid_id?>_column_unique);
		update_form_<?php echo $grid_id?>();
		if(<?php echo $grid_id?>_duplicate > 0)
			alert('<?php echo get_message(105)?>');
		*/
	}
	autoResize_<?php echo $grid_id?>(this);
}
function actAfterRestoreCell_<?php echo $grid_id?>(rowid,cellname,value,iRow,iCol)
{<?php echo $grid_id?>_allow_delete = 1;<?php echo $grid_id?>_editing_rowid = 0;<?php echo $grid_id?>_editing_cellname = '';<?php echo $grid_id?>_editing_value = 0;<?php echo $grid_id?>_editing_iRow = 0;<?php echo $grid_id?>_editing_iCol = 0;
	autoResize_<?php echo $grid_id?>(this);
}
function actAddFunc_<?php echo $grid_id?>()
{
	var checked_header = checkHeader();
	var checked_grid_<?php echo $grid_id?>= checkGrid_<?php echo $grid_id?>();
	var checked_unique_<?php echo $grid_id?>= checkUnique_<?php echo $grid_id?>();
	if(checked_header == true && checked_grid_<?php echo $grid_id?>== true && checked_unique_<?php echo $grid_id?>== true &&<?php echo $grid_id?>_navgrid_active == 1)
	{
		var selrow = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','selrow');
		if(selrow && (<?php echo $grid_id?>_add_row_data_pos == 'after' ||<?php echo $grid_id?>_add_row_data_pos == 'before'))
		{
			jQuery(<?php echo $grid_id?>_element).jqGrid('addRowData',<?php echo $grid_id?>_new_record,<?php echo $grid_id?>_default_data,<?php echo $grid_id?>_add_row_data_pos,selrow);
		}
		else if(<?php echo $grid_id?>_add_row_data_pos == 'first')
		{
			jQuery(<?php echo $grid_id?>_element).jqGrid('addRowData',<?php echo $grid_id?>_new_record,<?php echo $grid_id?>_default_data,<?php echo $grid_id?>_add_row_data_pos);
		}
		else
		{
			jQuery(<?php echo $grid_id?>_element).jqGrid('addRowData',<?php echo $grid_id?>_new_record,<?php echo $grid_id?>_default_data,'last');
			var records = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','records');
			jQuery(<?php echo $grid_id?>_element).jqGrid('editCell',records,<?php echo $grid_id?>_column_focus+1,true);
		}<?php echo $grid_id?>_new_record++;
	}
	else if(checked_header == false) { // untuk mengakomodir cara lama 
		$.alert({
          title: 'ALERT',
          content: '<?php echo get_message(712)?>',
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
	else if(checked_header != true && checked_header != false && checked_header != '') { // cara baru sudah spesifik
		$.alert({
          title: 'ALERT',
          content: '<?php echo get_message(801)?><br>'+checked_header+'<?php echo get_message(805)?>',
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
	else if(checked_grid_<?php echo $grid_id?>== false) { // untuk mengakomodir cara lama
		$.alert({
          title: 'ALERT',
          content: '<?php echo get_message(716)?>',
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
	else if(checked_grid_<?php echo $grid_id?>!= true && checked_grid_<?php echo $grid_id?>!= false && checked_grid_<?php echo $grid_id?>!= '') { // cara baru sudah spesifik
		$.alert({
          title: 'ALERT',
          content: checked_grid_<?php echo $grid_id?>,
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}	  
	else if(checked_unique_<?php echo $grid_id?>== false) {// untuk mengakomodir cara lama
		$.alert({
          title: 'ALERT',
          content: '<?php echo get_message(105)?>',
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
	else if(checked_unique_<?php echo $grid_id?>!= true && checked_unique_<?php echo $grid_id?>!= false && checked_unique_<?php echo $grid_id?>!= '') { // cara baru sudah spesifik
		$.alert({
          title: 'ALERT',
          content: checked_unique_<?php echo $grid_id?>,
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
}
function actDelFunc_<?php echo $grid_id?>()
{
	if(<?php echo $grid_id?>_allow_delete != 1)
	{
		closeActiveCell_<?php echo $grid_id?>()
	}
	if(<?php echo $grid_id?>_allow_delete == 1)
	{
	//	var selrow = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','selrow');
		var selarrrow = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','selarrrow');
		jQuery(<?php echo $grid_id?>_element).jqGrid('delGridRow',selarrrow,
		{
			afterComplete:function()
			{
				after_delete_<?php echo $grid_id?>();
				autoResize_<?php echo $grid_id?>(this);
			},
			reloadAfterSubmit:false
		});
	}
	else 
	{
		$.alert({
          title: 'ALERT',
          content: '<?php echo get_message(710)?>',
          icon: 'fa fa-warning',
          theme: 'modern',
          type: 'red'		                      
      	});
	}
}

//	------------
//	------------


function closeActiveCell_<?php echo $grid_id?>()
{
	if(<?php echo $grid_id?>_editing_iRow > 0 &&<?php echo $grid_id?>_editing_iCol > 0)
	{
		jQuery(<?php echo $grid_id?>_element).jqGrid('saveCell',<?php echo $grid_id?>_editing_iRow,<?php echo $grid_id?>_editing_iCol,true);
	//<?php echo $grid_id?>_allow_delete = 1;
	}
}
/*
function checkHeader()
{
	return check_header();
}
*/
function checkValueCells_<?php echo $grid_id?>(rowid,cells)
{
	var failed = '';
	var length_cells = cells.length;
	for(var i = 0; i < length_cells; i++)
	{
		var cell = cells[i].split('|');
		var get_cell = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',rowid,cell[0]);
		if(get_cell == '')
		{
			if(failed != '')
				failed += ", ";
			failed += cell[1];
		}
	}
	if(failed != '')
		failed += '<?php echo get_message(804)?>';
	return failed;
}
function checkGrid_<?php echo $grid_id?>(mode = 0)
{
	var valid_grid = true;
	var valid_grid_msg = '';
	if(<?php echo $grid_id?>_new_record > 1)
	{
		for(var i =<?php echo $grid_id?>_new_record-1; i > 0; i--)
		{
			var exist = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',i,1);
			if(exist != '')
			{
				var valid_row = row_validation_<?php echo $grid_id?>(i);
				if(valid_row != true && (valid_row == false || valid_row != ''))
				{
					valid_grid = false;
					var iRow = $('#'+$.jgrid.jqID(i))[0].rowIndex;
					if(valid_row != true && valid_row != false && valid_row != '')
						valid_grid_msg += '<br><b>'+'<?php echo get_message(803)?>'+iRow+'</b><br>'+valid_row+'<?php echo get_message(805)?>';
				}
			}
		}
	}
	else
		valid_grid = true;
	if(<?php echo $grid_id?>_allow_delete != 1)
	{
		if(mode > 0){
			valid_grid = false;
			valid_grid_msg = 'Pastikan semua kolom di dalam grid <b><?php echo $grid_caption?></b> sudah tertutup agar proses save dapat dilanjutkan.<?php echo get_message(805)?>';
		}else{
			closeActiveCell_<?php echo $grid_id?>();
		}
	}
	if(valid_grid == false && valid_grid_msg != '')
		valid_grid = '<?php echo get_message(802,$grid_caption)?>'+valid_grid_msg;
	return valid_grid;
}
function checkUnique_<?php echo $grid_id?>()
{
	if(<?php echo $grid_id?>_column_unique != '')
	{
		for(var i = 0; i <<?php echo $grid_id?>_column_unique.length; i++)
		{
			var column =<?php echo $grid_id?>_column_unique[i].split('|');
			if(column.length <= 1)
			{
				for(var j = 0; j < column.length; j++)
				{
					var arr = jQuery(<?php echo $grid_id?>_element).jqGrid('getCol',column[j]);
					arr.sort();
					var last = arr[0];
					for(var k = 1; k < arr.length; k++)
					{
						if(arr[k] != '' && arr[k] != null)
						{
							if(arr[k] == last)
							{
							//	alert(arr[k]+' = '+last);
							//	return false;
								var arr_ori = jQuery(<?php echo $grid_id?>_element).jqGrid('getCol',column[j]);
								var row_duplicate = arr_ori.indexOf(arr[k]) + 1;
							//	console.log('arr_ori:'+arr_ori);
							//	console.log('arr:'+arr);
								var iRow = $('#'+$.jgrid.jqID(row_duplicate))[0].rowIndex;
								valid_unique_msg = '<br><?php echo get_message(802,$grid_caption)?>'+'<?php echo get_message(105)?><br>'+'<?php echo get_message(803)?>'+iRow+'<?php echo get_message(805)?>';
								return valid_unique_msg;
							}
							last = arr[k];
						}
					}
				}
			}
			else if(column.length > 1)
			{
				var arr = [];
				var arr_ori = [];
				for(var j =<?php echo $grid_id?>_new_record-1; j > 0; j--)
				{
					var row_exist = jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',j,1);
					if(row_exist != '')
					{
						arr[j] = '';
						arr_ori[j] = '';
						for(var k = 0; k < column.length; k++)
						{
							arr[j] += '~|~' + jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',j,column[k]);
							arr_ori[j] += '~|~' + jQuery(<?php echo $grid_id?>_element).jqGrid('getCell',j,column[k]);
						}
					}
				}
				arr.sort();
				var last = arr[0];
				for(var k = 1; k < arr.length; k++)
				{
					if(arr[k] != '' && arr[k] != null)
					{
						if(arr[k] == last)
						{
						//	alert(arr[k]+' = '+last);
						//	return false;
							var row_duplicate = arr_ori.indexOf(arr[k]);
						//	console.log('arr_ori:'+arr_ori);
						//	console.log('arr:'+arr);
							var iRow = $('#'+$.jgrid.jqID(row_duplicate))[0].rowIndex;
							valid_unique_msg = '<?php echo get_message(802,$grid_caption)?><br>'+'<?php echo get_message(105)?><br> baris ke-'+iRow+'<?php echo get_message(805)?>';
							return valid_unique_msg;
						}
						last = arr[k];
					}
				}
			}
		}
	}
	return true;
}
/*
function sumSubtotal(column)
{
	return jQuery(<?php echo $grid_id?>_element).jqGrid('getCol',column,false,'sum');
}
*/
function generateRealGrid_<?php echo $grid_id?>()// new sync
{
	var html_realgrid = '';
	var last_j = -1;
	var totalrow = 0;
	var colModel = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','colModel');
	$(colModel).each(function(i)
	{
		if(this.name != 'rn' && this.name != 'cb' && this.name != 'add')
		{
			var colName = this.name;
			var colIndex = this.index;
			var getCol = jQuery(<?php echo $grid_id?>_element).jqGrid('getCol',colName);
			$(getCol).each(function(j)
			{
				html_realgrid += '<input name="<?php echo $grid_id?>_detail_'+j+'_'+colIndex+'" type="text" value="'+getCol[j]+'"><br />';
				if(j > last_j)
					last_j = j;
			});
		}
	});
	totalrow = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','records');
	html_realgrid += '<input name="<?php echo $grid_id?>_detail_totalrow" type="text" value="'+totalrow+'"><br />';
	
//	alert('totalrow = '+totalrow+' & last_j = '+last_j);
	var lastrow = last_j+1;
	if(totalrow != lastrow)
	{
		var realgrid_caption = jQuery(<?php echo $grid_id?>_element).jqGrid('getGridParam','caption');
		var realgrid_confirm = confirm(' Sistem tidak dapat mengkonfirmasi jumlah data pada grid <b>'+realgrid_caption+'</b> cocok dengan jumlah data yang akan disimpan ke dalam database. <br> Proses Save yang melibatkan data dengan jumlah yang tidak cocok dapat mengakibatkan data tersebut corupt setelah disimpan. <br> Harap meminta bantuan Administrator untuk memeriksa halaman ini. <br><br> Atau Anda tetap ingin melanjutkan proses Save dan mengabaikan kemungkinan data corupt?');
		if(realgrid_confirm == true)
			var realgrid_answer = 'yes';
		else
			var realgrid_answer = 'no';
	}
	else
		var realgrid_answer = 'yes';
	
	vgrid_real['<?php echo $grid_id?>'] = realgrid_answer;
	vgrid_last['<?php echo $grid_id?>'] = lastrow;
	
	$('#<?php echo $grid_id?>_realgrid').html(html_realgrid);
}</script><?php $grid_functions_html=ob_get_contents();ob_end_clean(); ?>
<?php /*created_by:glennferio@inspiraworld.com;release_date:2020-05-09;*/ ?>