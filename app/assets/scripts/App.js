$(document).ready(function() {
	function getById (id) {return document.getElementById(id)};

	function toggleError(){
		if($('.auth-form__message--visible').length == 0){
      		$('.auth-form__message').toggleClass('auth-form__message--visible');
      	}
      	if($('.auth-form__message--error').length == 0){
      		$('.auth-form__message').toggleClass('auth-form__message--error');
      	}
	}

	function displayError(error_type){
		switch(error_type){
			case 'l':
				$('.auth-form__message').text("Incorrect details");
				toggleError();
				break;
			case 'i':
				$('.auth-form__message').text("Please write a valid email.");
				toggleError();
				break;	
			case 'e':
				$('.auth-form__message').text("Email already exists.");
		      	toggleError();
		      	break;
	      	case 'u':
	      		$('.auth-form__message').text("Username already exists.");
		      	toggleError();
	      		break;
      		case 'p':
      			$('.auth-form__message').text("Password has to be atleast 5 characters.");
		      	toggleError();
		      	break;
		    default:
		    	$('.auth-form__message').text("An error occured.");
		      	toggleError();

		}
	}

	function toggleConfirmationScreen(){
		$('.auth-form__message').text("Registration succesful!");
		if($('.auth-form__message--visible').length == 0){
      		$('.auth-form__message').toggleClass('auth-form__message--visible');
      	}
      	if($('.auth-form__message--error').length > 0){
      		$('.auth-form__message').toggleClass('auth-form__message--error');
      	}
      	$('.auth-form__form').toggleClass('auth-form__form--hidden');
      	$('.auth-form__message').toggleClass('auth-form__message--success');
      	$('.auth-form__continue').toggleClass('auth-form__continue--visible');
	}

	function displayPost(post, postCounter){
		if(post !== undefined){
			$('.post__feed').append(function(){
				var user = '<h2 class="user user--post">' + post.user + '</h2>';
				var p_date = '<p class="post__date">' + post.p_date + '</p>';
				var p_text = '<p class="post__text">' + post.post + '</p>';

				return '<div class="post__row" data-post-id="'+ postCounter +'">' + user + p_text + p_date + '</div>';
			});
		}
	}

	function getPosts(){
		$.ajax({
	       type: "POST",
	       url: 'include/get-posts.php',
	       datatype: 'json',
	       data: {
	       	getposts: 'true'
	       },
	       success: function(response)
	       {
	       	  var allposts = JSON.parse(response);
	       	  var postCounter = 0;
	       	  $('.post__feed').html('');
	          for (var i = allposts.length; i >= 0; i--) {
	          	displayPost(allposts[i], postCounter);
	          	postCounter++;
	          }
	       }
	    });	
	}


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
						          	displayError('l');
						          }
						          
						       }
						    });	
						}					
					}
					else{
						displayError('i');
					}
				break;
			case "register-form":
				var userReg = {};
				userReg.email = form_e.elements["email"].value;
				userReg.username = form_e.elements["username"].value;
				userReg.pw = form_e.elements["password"].value;
				if(validateEmail(userReg.email) === true){
					if(validateInput(userReg.pw)){
						if(validateInput(userReg.username)){
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
						          	//show that registration was successful
						          	toggleConfirmationScreen();
						          	$('#continue-btn').click(function(e) {
									    e.preventDefault();
									    $.ajax({
									       type: "POST",
									       url: '../include/login-validation.php',
									       data: {
									       	reqType: "login",
									       	email: userReg.email,
												password: userReg.pw
									       },
									       success: function(response)
									       {
									          if (response==="success") {
									          	//redirect user to posting feed
									          	window.location.href = "/the-commenter/app/";
									          }

									          else{
									          	console.log("Something went wrong!");
									          }
									          
									       }
									   });	
									    return false;
									});
						          }
						          else if(response==="email exists"){
						          	displayError('e');
						          }
						          else if(response==="pw short"){
						          	displayError('p');
						          }
						          else{
						          	displayError('u');
						          }
						          
						       }
						   });
						}
						else{
							displayError('u');
						}
					}
					else{
						displayError('p');
					}
				}
				break;
			case "post-form":
				var post_input = form_e.elements["post"].value;
				if(validateInput(post_input)){
					$.ajax({
				       type: "POST",
				       url: 'include/create-post.php',
				       data: {
				       	post: post_input
				       },
				       success: function(response)
				       {
				          if (response==="success") {
				          	//post added to db
				          	console.log("post added to db");
				          	getPosts();
				          }			          
				       }
				   });	
				}
				else{
					console.log('post is too short.');
				}

				break;
			default:
				console.log("error");
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

	function validateInput(text){
		if(text.trim().length < 5){
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
		    	//do nothing
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
		    	//do nothing
		    }
		});
	}

	if(getById('post-form') !== null) {
		getPosts();
		var post = getById('post-form');
		$('#post-form').submit(function(e) {
		    e.preventDefault(); // to stop the form from submitting
		    if(validateForm("post-form", post) !== false){
		    	this.submit();
		    }
		    else{
		    	//do nothing
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