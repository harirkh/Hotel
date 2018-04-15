
$(document).ready(function(){
	
	$('form#register').submit(function(e){
		e.preventDefault();
		var data = $('form').serializeArray();
		$.post('register.php', data, function(data, status){
			if(typeof(data)=='object'){
				var guestId = data['guestId'];
				if(guestId>0){
					$('div#messageNotRegistered').hide();
					$('div#messageRegistered').show();
					$('input#submit').attr('disabled',true);
					$('button#signin').removeAttr('disabled');	
					$('input#key').val(data['key']);
				}else{
					showError();
				}				
			}else{
				showError();
			}
		});		
	});	
	
	$('button#signin').click(function(e){
		e.preventDefault();
		var key = $('input#key').val();
		location.replace('hotels.php?key='+key);
	});
});

function showError(){
	$('div#messageNotRegistered').show();
	$('div#messageRegistered').hide();
}