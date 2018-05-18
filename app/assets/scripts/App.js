$(document).ready(function() {
	function getById (id) {return document.getElementById(id)};

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
						       url: '../include/login-validation.php',
						       data: {
						       	reqType: "login",
						       	email: userLogin.email,
	  							password: userLogin.pw 
						       },
						       success: function(response)
						       {
						          if (response==="success") {
						          	//redirect user to posting feed
						          	window.location.href = "/the-commenter/app/";
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
				var userReg = {};
				userReg.email = form_e.elements["email"].value;
				userReg.username = form_e.elements["username"].value;
				userReg.pw = form_e.elements["password"].value;
				if(validateEmail(userReg.email) === true){
					if(userReg.pw != ""){
						$.ajax({
					       type: "POST",
					       url: '../include/register-process.php',
					       data: {
					       	email: userReg.email,
					       	username: userReg.username,
							password: userReg.pw
					       },
					       success: function(response)
					       {
					          if (response==="success") {
					          	//redirect user to posting feed
					          	console.log("user created");
					          }
					          else if(response==="email exists"){
					          	console.log("email already in use.");
					          }
					          else{
					          	console.log("username already in use.");
					          }
					          
					       }
					   });
					}
				}
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

	$('textarea').keypress( function(e){
		if($(this)[0].scrollHeight > 100){
			$(this).val($(this).val().replace(/[\r\n\v]$/g, ''));
			return false;
		}
	});

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

	if(getById('register-form') !== null) {
		var register = getById('register-form');
		$('#register-form').submit(function(e) {
		    e.preventDefault(); // to stop the form from submitting
		    if(validateForm("register-form", register) !== false){
		    	this.submit();
		    }
		    else{

		    }
		});
	}

	$('#logout').click(function(e) {
	    e.preventDefault();
	    $.ajax({
	       type: "POST",
	       url: 'include/logout-process.php',
	       success: function(response)
	       {
	          window.location.href = "/the-commenter/app/login/"
	       }
	   });	
	    return false;
	});
				
});