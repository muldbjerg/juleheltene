$(document).ready(function(){
	var createFamily = $('#createFamily'),
		password = $('#password'),
		password_again = $('#password_again'),
		buttonDiv = $('#buttonDiv');




	createFamily.on('submit', function(e){
		e.preventDefault();

		if(password.val() == password_again.val()){ // Indsætter kun - hvis password er ens
			$.post("functions/createfamilyfunction.php", $(this).serialize(), function(response){
				if(response.msg.match(/Succes.*/)){
					var user_id_split = response.msg.split("+"),
						user_id = user_id_split['1'];

					$('<form action="createchildren.php" method="POST">' + '<input type="hidden" name="user_id" value="' + user_id + '">' +'</form>').submit();
				}
				if(response.msg == "Failue"){
					buttonDiv.before("<p id='error_creatingfamily'>Der opstod en fejl - prøv igen senere</p>");
					$('#error_creatingfamily').delay(3000).fadeOut();
				}
				if(response.msg == "Usedmail"){
					buttonDiv.before("<p id='usedmail_creatingfamily'>Der er oprettet allerede en ønskeseddel med denne mail - prøv igen.</p>");
					$('#usedmail_creatingfamily').delay(3000).fadeOut();
				}
				
			}, "json");
		}
		else{
			buttonDiv.before("<p id='password_error_family'>Koderne er ikke ens - prøv igen</p>");
			$('#password_error_family').delay(3000).fadeOut();
		}
		
		
   	})

   	password_again.on('keyup', function(){
   		if(password.val() == password_again.val()){
   			password_again.css('background-color', '#BDCD46');
   		}
   		else{
   			password_again.css('background-color', '#890101');
   		}   		
   	})

});