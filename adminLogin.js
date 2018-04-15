$(document).ready(function(){
	
	$('input.checkBooking').click(function(){
		var ischecked = $(this).is(':checked');
		var id = $(this).attr('data-bookingsid');
		console.log('id = ' +id);
		$.post('toggleChecked.php', {'bookingsId':id, 'ischecked': ischecked}, function(data, status){			
			console.log(data);
		});
	});
});
