
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Condition Tracker</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/Style.css"> <!-- custom styles -->

<script type="text/javascript">

        // Checks to see if the inputed data is valid to be submitted
        function validateForm() {
            var email = document.forms["professionalLogin"]["email"].value;
            var emailRE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var password = document.forms["professionalLogin"]["password"].value;
            var passwordRE = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/

            if(emailRE.test(String(email).toLowerCase()) == false || passwordRE.test(String(password)) == false) {
                var error = "Please enter a valid email address and password";
                document.getElementsByClassName("error")[0].innerHTML = "Please enter a valid email address and password";
                return false;
            } else {
                document.getElementsByClassName("error")[0].innerHTML = "";
                return true;
            };  


        }
        <?php session_start() ?>

        //on load of page, check to see if their login was rejected, or if already logged in.
        function onLoad() {

            <?php 

                if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == 'Denied') {
            ?> 
                    document.getElementsByClassName("error")[0].innerHTML = "Email or password aren't recognised."; 
            <?php
                    unset($_SESSION['login_user']);
                
                } else if(isset($_SESSION['login_user'])) {
                    header("Location: ../Views/App/patients.php");
                }
            ?>
        }

    </script>


</head>
<body onload="onLoad()">
<div class="container">

	<h1>Condition Tracker</h1>
      <h2>An easier way to track health conditions</h2>

    <nav class="navigation">
	  	
	  	<ul class="Nav-bar">
	   		<li><a href="Index.html">About us</a></li>
	   		<li><a href="ContactUs.html">Contact us</a></li>
	   		<li><a href="UserLogin.php">User Login</a></li>
	   		<li><a class="active" href="ProfessionalLogin.php">Clinician Login</a></li>
	   	</ul>
	</nav>  
</div>
<div class="content">

	<p>Please enter your NHS Email and Password. </p>
	<p class="error"></br></p> 

	<div class="titles">
		NHS Email: <br>
		Password: <br>
	</div>

	<form class="inputForm" name="professionalLogin" onsubmit="return validateForm()" method="POST" action="../resources/login.php">
			<input class="input" type="text" name="email"><br>
			<input class="input" type="password" name="password"><br>
			<input class="input" type="submit" name="ProfessionalLogin" value="Login">
            <a class="text" href="createProfessional.php"> Create Account </a>
	</form>
</div>
</body>

