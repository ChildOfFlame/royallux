$(document).ready(function(event){

	/*
	 * fadeIn/fadeOut preloader while pjax autorization
	 */

	 $("#load").on("pjax:beforeSend",function(){
	 	$("#preloader").fadeIn();
	 });
	 $("#load").on("pjax:end",function(){
	 	$("#preloader").fadeOut();
	 });
	/*
	 * pjax reload table after search
	 */
	$("#search").on("pjax:end",function(){
        $.pjax.reload({container: "#table"});
    });
});