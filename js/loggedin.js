$(document).ready(function(){
	var loginBox = $('#loginBox'),
		logoutBox = $('#logoutBox'),
		loginStatus = sessionStorage.login,
		loginUser = sessionStorage.user_id,
		description = $('#description');


	if(loginStatus == "true"){
	var array = loginUser.split('|'),
		arraySingle = array['2'].split(''),
		i = 0,
		n = arraySingle.length - 32, // finder ud af hvor lang user_id'et er
		user_id_nr = arraySingle.splice(32,n), // sier user_id fra resten
		user_id = user_id_nr.join(""); // samler user_id
	}

	// Logind / Logud 
	if(loginStatus == "true"){
		loginBox.hide();
		logoutBox.show();
	}

	if(loginStatus == "true" && getUrlElement()["id"] == user_id){
		description.after("<div id='buttonDiv'><a href='wishlists.php'><button>Rediger</button></a></div>")
	}




});

function getUrlElement() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
