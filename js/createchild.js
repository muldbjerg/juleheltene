$(document).ready(function(){
	var createChild = $('#createChild'),
		wishes = $('.wishes'),
		oneMoreChild = $('#oneMoreChild'),
		childField = $('.childField'),
		buttonDiv = $('.buttonDiv'),
		i = 0,
		n = 1;


	oneMoreChild.on('click', function(e){
		e.preventDefault();
		i++;
		n++;

		// console.log(i);
		$('.field' + i).after("<hr/><div class='childField field" + n + " col-md-12'><div class='col-md-6'><input name='childname[]' placeholder='Skriv navn'> <input name='childage[]' placeholder='Skriv alder'></div><div class='theend'></div></div>");

	})


	createChild.on('submit', function(e){
		e.preventDefault();

		console.log("sendt");
		
		$.post("functions/createchildfunction.php", $(this).serialize(), function(response){
			// console.log(response.msg);
			if(response.msg.match(/Succes.*/)){
				var user_id_split = response.msg.split("+"),
					user_id = user_id_split['1'];

				$('<form action="createwishes.php" method="POST">' + '<input type="hidden" name="user_id" value="' + user_id + '">' +'</form>').submit();
			}
			if(response.msg == "Failure"){
				buttonDiv.before("<p id='error_creatingfamily'>Der opstod en fejl - prøv igen senere</p>");
				$('#error_creatingfamily').delay(3000).fadeOut();
			}
		}, "json");
		
   	})


});



// Her blev forsøgt at lave en løsning, sådan man kunne tilføje flere ønsker - det kunne vi godt tænke os at arbejde videre med.
/*
buttonDiv.on('click', function(e){
	e.preventDefault();	

	console.log("button clicked");
})

plusButton.on('click', function(e){
	e.preventDefault();	
	var element = $(e.target);

	console.log(element.attr('class'));	

	var nr_array = wishes.last('input').attr('name'),
		nr = nr_array.split('+');

	wishes.last('input').after("<input class='wishes' type='text' name='" + nr['0'] + "+wish[]' placeholder='Skriv ønske'>");
})
*/

