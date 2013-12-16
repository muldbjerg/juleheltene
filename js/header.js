$(document).ready(function(){
	var loginStatus = sessionStorage.login,
		loginBox = $('#loginBox'),
		logoutBox = $('#logoutBox');


	if(loginStatus == "true"){
		loginBox.hide();
		logoutBox.show();
	}



});