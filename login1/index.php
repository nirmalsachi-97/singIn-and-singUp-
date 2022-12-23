<!DOCTYPE html>
<?php
    session_start();
    if(isset($_SESSION["user_email"])){
        header("location: ./profile.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
    <h1 >Web Design & Development Course</h1>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="./Input/regester.php" method="post">
			<h1>Create Account</h1>
			
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" class="user" name="name" />
			<input type="email" placeholder="Email"  class="email_id"  name="email_id" />
			<input type="password" placeholder="Password" class="password" name="password" />
			<button class="register" name="register">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
  
		<form action="./Input/login.php" method="post" >
			<h1>Sign in</h1>
			
			<span>or use your account</span>
			<input type="email" placeholder="Email"  class="email_id"  name="email_id" />
			<input type="password" placeholder="Password" class="password" name="password" />
		
			<a href="#">Forgot your password?</a>
			<button  class="login" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
    
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Have you account?</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welcome to IPM</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp" >Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>

            <div class="col-md-6 text-center mb-2 mb-md-0" taxt-align="center">
                <p>2021 © Instritute of Programming School . All rights reserved.</p>
            </div>
          

    	
    		
</div>
</footer>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</div>
</body>
</html>