$(function()
{
	$('.period_4').datepicker(
	{
		dateFormat:'yy-mm',
		minDate: 0,
		maxDate: '+5Y',
		changeMonth: true,
		changeYear: true
	});
	$('.date_5').datepicker({
		dateFormat:'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		yearRange: '-99:+99'
	});
});