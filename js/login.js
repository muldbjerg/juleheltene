$(document).ready(function(){

	var login = $('#loginForm'),
		logUd = $('.logout'),
		loginBox = $('#loginBox'),
		logoutBox = $('#logoutBox'),
		u = $('.u');
	
	login.on("submit", function(e){
		event.preventDefault()
		$.post("functions/loginfunction.php", $(this).serialize(), function(response){
			var array = response.msg.split('+');
			if(array['0'] == "succes"){
				// Sætter sessionen til logget ind
				sessionStorage.setItem("login", "true");
				sessionStorage.setItem("user_id", array['3'] + "|" + "e" + "|" + array['2'] + array['1'] + "|" + "12" + "defe");

				// Sådan logind/logud er rigtig
				loginBox.hide();
				logoutBox.show();

				// Fjerner logind feltet
				login.fadeOut(1000);
				logUd.delay(1000).fadeIn(3000);
			}
			if(array['0'] == "failure"){
				$('#buttonDiv').before("<div id='respons'>Der er desværre sket en fejl - prøv igen.</div>");
				$('#respons').hide(4000);
			}

		}, "json");
	});

	if(sessionStorage.getItem("login") == "true"){
		login.hide();
		logUd.show();
	}

	logUd.on('click', function(e){
		sessionStorage.setItem("login", "false");
		sessionStorage.removeItem("user_id");
		window.location.replace("index.php");
	})
	
		

	

});
