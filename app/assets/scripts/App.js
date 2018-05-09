function getById (id) {return document.getElementById('login-form')};

function validateForm(form_type, form_e){
	switch(form_type){
		case "login-form":
				var userLogin = {};
				userLogin.email = form_e.elements["email"].value;
				userLogin.pw = form_e.elements["password"].value;
				if(validateEmail(userLogin.email) === true){

					if(userLogin.pw != ""){
						//check pw and email in db
						$.ajax({
					       type: "POST",
					       url: './include/login.php',
					       data: {
					       	reqType: "login",
					       	email: userLogin.email,
  							password: userLogin.pw 
					       },
					       success: function(response)
					       {
					          if (response==="success") {
					          	//redirect user to posting feed
					          	$('.auth-form__message').toggleClass('auth-form__message--visible');
					          	console.log("Login successful");
					          }
					          else{
					          	$('.auth-form__message').text("Incorrect details");
					          	if($('.auth-form__message--visible').length == 0){
					          		$('.auth-form__message').toggleClass('auth-form__message--visible');
					          	}
					          }
					          
					       }
					   });	

					}
					
				}
			break;
		case "register-form":

			break;
		case "post-form":

			break;
		default:
			"error";
	}
	return false;
}


function validateEmail(email) {
	if (!email.match(/[a-zA-Z0-9._-]+[@][a-zA-Z]+\.[a-zA-Z]+/g)){
		return false;
	}
	else{
		return true;
	}
}

if(getById('login-form') !== null) {
	var login = getById('login-form');
	$('#login-form').submit(function(e) {
	    e.preventDefault(); // to stop the form from submitting
	    if(validateForm("login-form", login) !== false){
	    	this.submit();
	    }
	    else{

	    }
	});
}






