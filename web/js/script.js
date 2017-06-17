$(document).ready(function(event){
	$('.submitBtn').click(function(event){
		var error = false;
		$('.form-control').each(function(){
			console.log($(this));
			if (!$(this).val()) {
				$(this).addClass('error');
				error = true;
			}
			else{
				$(this).removeClass('error');
			}
		});
		if (error) {
			event.preventDefault();
		}
	});
});