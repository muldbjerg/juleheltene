$(document).ready(function(){
	var createChild = $('#createChild'),
		plus = $('#plusButton'),
		wishes = $('.wishes'),
		addChild = $('#addChild');


	// addChild.on('click', function(){
	// 	var inputN = createChild.children().length, // Antal input elementer
	// 		actN = (inputN - 1) / 2 + 1, // Det aktuelle tal, som det næste input felt skal hedde
	// 		inputs = $('input');

	// 	createChild.find(inputs).last().before('<input name="childname[]" placeholder="Skriv navn"><input name="childage[]" placeholder="Skriv alder"><select name="childgender[]"><option value="man">Dreng</option><option value="woman">Pige</option></select>');
	// 	console.log(inputN);
	// })

	plus.on('click', function(e){
		e.preventDefault();
		wishes.last('input').after("<input type='text' name='wish[]' placeholder='Skriv ønske'>");
	})

	// createChild.on('submit', function(e){
	// 	e.preventDefault();
		
	// 	$.post("functions/createChild.php", $(this).serialize(), function(response){
	// 		console.log(response.msg);
	// 		if(response.msg == "Succes"){
	// 			window.location.reload(true);
	// 		}
	// 	}, "json");
		
 //   	})

});