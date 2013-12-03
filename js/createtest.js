$(document).ready(function(){
	var createTest = $('#createTest'),
		form1 = $('#form1'),
		name = $('#name');




	createTest.on('submit', function(e){
		e.preventDefault();

		
		$.post("functions/createHero.php", form1.serialize(), function(response){
			console.log(response.msg);
		}, "json");
		
   	})



});