$(document).ready(function(){  

	var instagramFeed = $("#instagramFeed"),
  		pics = 6,
  		tag = "voresliv";


	(function instaSearch() {
	    	      
	    $.ajax({  
	        type: 'POST',  
	        url: 'functions/instasearch.php',  
	        data: "q=" + tag,
	        
	        success: function(data){   
	              
	            $.each(data, function(i, item) { 
	            	if(i < pics) { 
	            		var instagram = ("<a href='" + data[i].url + "' target='_blank'><img src='" + data[i].src + "'></a>");
	                	$(instagramFeed).append(instagram);
	                }
	            });  
	        },  

	        error: function(xhr, type, exception) {  
	            $(instagramFeed).html("Error: " + type);   
	        }  
	    }); 

	})(); 


});