<?php
require_once('connect.php');

// LOGIN USER
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $password = mysqli_real_escape_string($db, $_POST['password1']);
  
    if (empty($name)) {
        array_push($errors, "ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users2 WHERE name='$name' AND password1='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['name'] = $name;
          $_SESSION['success'] = "You are now logged in";
          header("location:home.php");
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
 
?>


<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="login.css">
           
 </head>
        <title>
            Login Page
        </title>
    </head>
    <body>
        <header>
		<div class="navigation">
            <nav class="header-con" >
			    <div id="header-logo">
					<img src="zeuslogo.png" alt="zeus">
                </div>
				<div class="one">
					<h4 id="logo1">NET</h4><h4 id="logo2">WORTH</h4>
					
				</div>
                
                
            </nav>
		</div>
        </header>
		
        <section>
		        <div id="sign">
					<h2 id="head">Sign In</h2>
					<h4 id="line">Welcome back</h4>
				</div>
		
			<div align="center">
					
				<div id="register">
                <?php include('error.php'); ?>
                <form action="index.php" method="post">
						<div class="details">
						<input type="text" name="name" id="email" placeholder="Username" required><br>
						<input type="password" name="password1"  placeholder="password" required><br>
						</div>
						<button id="submit" name="submit" >Sign In</button>
					</form>
					
				  		
						<br>
						<h5>Don't have an account?<a href= "signup.php" align= "center" class="register-btn" type="button">Sign up</a></h5>
				</div> 
			</div>
		
       
    </section>
	
	<script src="script.js"></script>
	
    </body>
    
</html>
