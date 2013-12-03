$(document).ready(function(){
	var createFamily = $('#createFamily'),
		password = $('#password'),
		password_again = $('#password_again'),
		submit = $('#submit');




	createFamily.on('submit', function(e){
		e.preventDefault();

		if(password.val() == password_again.val()){ // Indsætter kun - hvis password er ens
			$.post("functions/createfamily.php", $(this).serialize(), function(response){
				console.log(response.msg);
			}, "json");
		}
		else{
			submit.before("<p id='password_error_family'>Koderne er ikke ens</p>");
			$('#password_error_family').delay(3000).fadeOut();
		}
		


		
   	})



});