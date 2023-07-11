<script type="text/javascript">
	function loadAllEventGrid(new_gridname, gridname){

		<?php if(isset($grid_0)){ ?>
			<?php $namegrid = $grid_0; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
					// after_delete_<?=$namegrid?>();
					// row_validation_<?=$namegrid?>(rowid);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_1)){ ?>
			<?php $namegrid = $grid_1; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_2)){ ?>
			<?php $namegrid = $grid_2; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_3)){ ?>
			<?php $namegrid = $grid_3; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_4)){ ?>
			<?php $namegrid = $grid_4; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_5)){ ?>
			<?php $namegrid = $grid_5; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_6)){ ?>
			<?php $namegrid = $grid_6; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
		
		<?php if(isset($grid_7)){ ?>
			<?php $namegrid = $grid_7; ?>
			if(new_gridname == "<?=$namegrid?>"){

				var records = $(gridname).jqGrid('getGridParam','records');
				<?=$namegrid?>_new_record++;

				$(gridname).setGridParam({afterSaveCell: function(rowid,cellname,value,iRow,iCol){
					after_save_cell_<?=$namegrid?>(rowid,cellname);
					after_complete_<?=$namegrid?>(rowid,cellname);
					actDelFunc_<?=$grid_id?>
				}});	
				generateRealGrid_<?=$namegrid?>();

			}
		<?php } ?>
	}

</script>