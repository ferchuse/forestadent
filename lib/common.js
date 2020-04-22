$(document).ready(function(){
	
	$("input[type=text]").blur(function(e){
		 $(this).val($(this).val().toUpperCase());
	});
	
	$("form").submit(function(e){
		$("input[type=text]").each(function(index, val){
			 $(this).val($(this).val().toUpperCase());
		});
	});
	
	
	
});

