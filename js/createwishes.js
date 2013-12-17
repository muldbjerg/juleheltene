$(document).ready(function(){
	var createWishes = $('#createWishes'),
		createWishesDiv = $('.createWishesDiv'),
		moreWishes = $('#moreWishes');


	moreWishes.on('click', function(e){
		e.stopImmediatePropagation();
		console.log("hej");
		// createWishesDiv.after().load('inc/wishesFields.php');
	})


	createWishes.on('submit', function(e){
		e.preventDefault();

		console.log("sendt");
		
		$.post("functions/createwishfunction.php", $(this).serialize(), function(response){
			console.log(response.msg);
			// if(response.msg.match(/Succes.*/)){
				
			// }
			// if(response.msg == "Failure"){
			// 	// buttonDiv.before("<p id='error_creatingfamily'>Der opstod en fejl - prøv igen senere</p>");
			// 	// $('#error_creatingfamily').delay(3000).fadeOut();
			// }
		}, "json");
		
   	})


});

