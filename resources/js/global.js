$(document).ready(function() {
	
	if( $('.has-datetimepicker').length ) 
	{
		$('.has-datetimepicker').datetimepicker({format: 'DD/MM/YYYY HH:mm:ss'});
	}
	
	if( $('.has-datepicker').length )
	{
		$('.has-datepicker').datetimepicker({format: 'DD/MM/YYYY'});
	} 

});