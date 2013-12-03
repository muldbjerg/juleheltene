$(document).ready(function(){
	var createHero = $('#createHero'),
		password = $('#password'),
		password_again = $('#password_again');




	createHero.on('submit', function(e){
		e.preventDefault();

		if(password.val() == password_again.val()){ // Indsætter kun - hvis password er ens
			$.post("functions/createHero.php", $(this).serialize(), function(response){
				console.log(response.msg);
			}, "json");
		}
		else{
			submit.before("<p id='password_error_hero'>Koderne er ikke ens</p>");
			$('#password_error_hero').delay(3000).fadeOut();
		}
		


		
   	})



});