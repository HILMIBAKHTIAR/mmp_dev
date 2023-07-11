<?php include "loadAllEventGrid.php"; ?>
<style>
	.notification_time{
		color:#2a5788;
		font-weight: 700;
	}
</style>
<script type="text/javascript">
	//================================================DATE & TIME====================================================//
	$('.date_1_custom').datepicker({
		dateFormat:'<?=$_SESSION["setting"]["date_1"]?>',
		changeMonth: true,
		changeYear: true,
		yearRange: '-99:+99',
		minDate: '<?=$_SESSION["setting"]["start_date"]?>'
	});

	var coltemplate_time_2 = { width:100, sortable:false, editable:true, editoptions:{
		size: 18, maxlengh: 8, dataInit: function(element) {
			// $(element).bootstrapMaterialDatePicker({ date: false });
			$(element).clockpicker({ 
				autoclose: true,
				align: 'left',
				placement:'bottom',
			 });
		}
	}, formatoptions:{ newformat: 'H:i:s' } };

	function addDays(date, days) {
	  var result = new Date(date);
	  result.setDate(result.getDate() + days);
	  return result;
	}

	Date.isLeapYear = function (year) { 
	    return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0)); 
	};

	Date.getDaysInMonth = function (year, month) {
	    return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
	};

	Date.prototype.isLeapYear = function () { 
	    return Date.isLeapYear(this.getFullYear()); 
	};

	Date.prototype.getDaysInMonth = function () { 
	    return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
	};

	Date.prototype.addMonths = function (value) {
	    var n = this.getDate();
	    this.setDate(1);
	    this.setMonth(this.getMonth() + value);
	    this.setDate(Math.min(n, this.getDaysInMonth()));
	    return this;
	};

	function formatDate(date) {
	    var d = new Date(date),
	        month = '' + (d.getMonth() + 1),
	        day = '' + d.getDate(),
	        year = d.getFullYear();

	    if (month.length < 2) month = '0' + month;
	    if (day.length < 2) day = '0' + day;

	    return [year, month, day].join('-');
	}
	//================================================DATE & TIME====================================================//

	//================================+=================RESIZE======================================================//
	var box_body = $(".box-body").width();
	$( document ).ready(function() {
	    doResize();
		$(window).on("resize", doResize);
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		   doResize();
		});
	});

	function doResize(){
		<?php 
			if(isset($grid_str)){
				foreach ($grid_elm as $key => $value) { ?>
					$(<?=$value?>).setGridWidth(box_body);
		  <?php }
			}
		?>
		<?php if(isset($grid_0_elm)){ ?> $(<?=$grid_0_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_1_elm)){ ?> $(<?=$grid_1_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_2_elm)){ ?> $(<?=$grid_2_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_3_elm)){ ?> $(<?=$grid_3_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_4_elm)){ ?> $(<?=$grid_4_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_5_elm)){ ?> $(<?=$grid_5_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_6_elm)){ ?> $(<?=$grid_6_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_7_elm)){ ?> $(<?=$grid_7_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_8_elm)){ ?> $(<?=$grid_8_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_9_elm)){ ?> $(<?=$grid_9_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_10_elm)){ ?> $(<?=$grid_10_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_11_elm)){ ?> $(<?=$grid_11_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_12_elm)){ ?> $(<?=$grid_12_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_13_elm)){ ?> $(<?=$grid_13_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_14_elm)){ ?> $(<?=$grid_14_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_15_elm)){ ?> $(<?=$grid_15_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_16_elm)){ ?> $(<?=$grid_16_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_17_elm)){ ?> $(<?=$grid_17_elm?>).setGridWidth(box_body); <?php } ?>
		<?php if(isset($grid_18_elm)){ ?> $(<?=$grid_18_elm?>).setGridWidth(box_body); <?php } ?>

		<?php if(isset($grid_0_width)){ ?> $(<?=$grid_0_elm?>).setGridWidth(<?=$grid_0_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_1_width)){ ?> $(<?=$grid_1_elm?>).setGridWidth(<?=$grid_1_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_2_width)){ ?> $(<?=$grid_2_elm?>).setGridWidth(<?=$grid_2_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_3_width)){ ?> $(<?=$grid_3_elm?>).setGridWidth(<?=$grid_3_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_4_width)){ ?> $(<?=$grid_4_elm?>).setGridWidth(<?=$grid_4_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_5_width)){ ?> $(<?=$grid_5_elm?>).setGridWidth(<?=$grid_5_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_6_width)){ ?> $(<?=$grid_6_elm?>).setGridWidth(<?=$grid_6_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_7_width)){ ?> $(<?=$grid_7_elm?>).setGridWidth(<?=$grid_7_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_8_width)){ ?> $(<?=$grid_8_elm?>).setGridWidth(<?=$grid_8_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_9_width)){ ?> $(<?=$grid_9_elm?>).setGridWidth(<?=$grid_9_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_10_width)){ ?> $(<?=$grid_10_elm?>).setGridWidth(<?=$grid_10_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_11_width)){ ?> $(<?=$grid_11_elm?>).setGridWidth(<?=$grid_11_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_12_width)){ ?> $(<?=$grid_12_elm?>).setGridWidth(<?=$grid_12_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_13_width)){ ?> $(<?=$grid_13_elm?>).setGridWidth(<?=$grid_13_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_14_width)){ ?> $(<?=$grid_14_elm?>).setGridWidth(<?=$grid_14_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_15_width)){ ?> $(<?=$grid_15_elm?>).setGridWidth(<?=$grid_15_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_16_width)){ ?> $(<?=$grid_16_elm?>).setGridWidth(<?=$grid_16_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_17_width)){ ?> $(<?=$grid_17_elm?>).setGridWidth(<?=$grid_17_width / 12?> * box_body); <?php } ?>
		<?php if(isset($grid_18_width)){ ?> $(<?=$grid_18_elm?>).setGridWidth(<?=$grid_18_width / 12?> * box_body); <?php } ?>
	}
	//================================+=================RESIZE======================================================//

	//================================+===============LINK & URL====================================================//
	<?php 
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$pieces_link = explode("dashboard.php", $actual_link);
	?>
    var url = "<?=$pieces_link[0];?>";
    //================================================LINK & URL====================================================//

    //===========================================LOAD GRID FROM AJAX===============================================//
	function convertJSON(data){
		var jsonString = data.slice(1, -1);
	  	return JSON.parse("["+jsonString+"]");
	}

	function addRowToGridFromAjax(url, sp, data_field, gridname){
		var pieces = data_field.split(",");
		var counter = pieces.length;

		$.ajax({
			async: true,   // this will solve the problem
			type: "POST",
			url: url + "pages/ajax.php",
			data: { "tipe":"call_sp", "sp":sp },
			success: function (data) {
				var arrData = convertJSON(data);

				for(i=0;i<arrData.length;i++){
					var target = (arrData[i]);

					var newData = {};

					for(j=0;j<counter;j++){
						var data_pieces = pieces[j].split("|");
						if(data_pieces[1] == undefined){
							newData[data_pieces[0]] = target[data_pieces[0]];	
						}else{
							newData[data_pieces[0]] = target[data_pieces[1]];
						}
					}
				    var rowId = $(gridname).getGridParam("reccount") + 1;

				    $(gridname).jqGrid('addRowData', rowId, newData);
				}
				
				var new_gridname = gridname.replace(/\_grid/g, '');
					new_gridname = new_gridname.replace(/\#/g, '');

				loadAllEventGrid(new_gridname, gridname);

		    },
		    error: function(jqXHR, textStatus, errorThrown) {
				
		    }
		});
	}

	function addRowToGridFromURL(url, data_field, gridname){
		var pieces = data_field.split(",");
		var counter = pieces.length;

		$.ajax({
			async: true,   // this will solve the problem
			type: "GET",
  			dataType: 'json',
			url: url,
			success: function (data) {
				console.log(data);
				// var arrData = convertJSON(data);

				var arrData = data;

				for(i=0;i<arrData.length;i++){
					var target = (arrData[i]);

					var newData = {};

					for(j=0;j<counter;j++){
						var data_pieces = pieces[j].split("|");
						if(data_pieces[1] == undefined){
							newData[data_pieces[0]] = target[data_pieces[0]];	
						}else{
							newData[data_pieces[0]] = target[data_pieces[1]];
						}
					}

				    var rowId = $(gridname).getGridParam("reccount") + 1;

				    $(gridname).jqGrid('addRowData', rowId, newData);
				}
				
				var new_gridname = gridname.replace(/\_grid/g, '');
					new_gridname = new_gridname.replace(/\#/g, '');

				loadAllEventGrid(new_gridname, gridname);

				$("#btn_calculate").button('reset');

		    },
		    error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
				alert("Couldn't connect to SQL Server");
				$("#btn_calculate").button('reset');
		    }
		});

	}
	//===========================================LOAD GRID FROM AJAX===============================================//
</script>