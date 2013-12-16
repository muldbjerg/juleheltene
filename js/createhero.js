$(document).ready(function(){
	var createHero = $('#createHero'),
		password = $('#password'),
		password_again = $('#password_again'),
		loginBox = $('#loginBox'),
		logoutBox = $('#logoutBox');




	createHero.on('submit', function(e){
		e.preventDefault();

		if(password.val() == password_again.val()){ // Indsætter kun - hvis password er ens
			$.post("functions/createherofunction.php", $(this).serialize(), function(response){
				var array = response.msg.split('+');
				if(array['0'] == "succes"){
					// Sætter sessionen til logget ind
					sessionStorage.setItem("login", "true");
					sessionStorage.setItem("user_id", array['3'] + "|" + "e" + "|" + array['2'] + array['1'] + "|" + "12" + "defe");

					// Sådan logind/logud er rigtig
					loginBox.hide();
					logoutBox.show();
				}
				if(array['0'] == "failure"){
					$('#buttonDiv').before("<div id='respons'>Der er desværre sket en fejl - prøv igen.</div>");
					$('#respons').hide(4000);
				}
			}, "json");
		}
		else{
			submit.before("<p id='password_error_hero'>Koderne er ikke ens</p>");
			$('#password_error_hero').delay(3000).fadeOut();
		}
		


		
   	})



});