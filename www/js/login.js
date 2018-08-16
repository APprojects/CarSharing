$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


function registration(){
		var username = $('#usernameR').val();
		var email = $('#emailR').val();
		var password =$('#passwordR').val();
		
		alert("Dati: " + username + " " + email + " " + password);
		var url = "http://localhost:8080/testMatteo/webservices/registration.php";
		
		$.post(url,
		{
			username: username,
			email: email,
			password: password
		},
		function(data, status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	}