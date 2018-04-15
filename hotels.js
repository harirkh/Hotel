$(document).ready(function(){
	$('button.book').click(function(){
		var hotlelsId = $(this).attr('data-hotels_id');
		var guestKey = $(this).attr('data-guest_key');
		var url = 'book.php?guestKey='+guestKey+'&hotelsId='+hotlelsId;
		location.replace(url);	
	});
});