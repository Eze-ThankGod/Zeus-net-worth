<?php
require_once('connect.php');
$_SESSION['message']='';

if($_SERVER['REQUEST_METHOD']=='POST'){

	//two passwords are equal to each other
	if($_POST['password1']==$_POST['confirmpass']){
	$name=$db->real_escape_string($_POST['name']);
	$email=$db->real_escape_string($_POST['email']);
	$phone= $db->real_escape_string($_POST['phone']);
	$password=$db->real_escape_string($_POST['password1']);

	$_SESSION['name']=$name;
	$sql = "INSERT INTO users2 (name,email,phone,password1,)". "VALUES ('$name','$email','$phone',$password')";
	//if the query is correct it will redirect to index.php
	if($db->query($sql)===true){
	$_SESSION['message']='Registration succesfully Added $official to the database';
	header("location:home.php");
	}
	else{
		$_SESSION['message']="User could not be added to the database";
	}
	}
	else{
		$_SESSION['message']="Two password do not match";
	}
	}
?>

<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text&display=swap" rel="stylesheet">
        <title>
            Register Page
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
					<h2 id="head">Sign Up</h2>
					<h4 id="line">Create an account and get started</h4>
				</div>
		
			<div align="center">
					
				<div id="register">
				<?php include('error.php'); ?>
                <form action="signup.php" method="post">
						<div class="details">
						<input type="text" name="name" id="name" placeholder="Full Name" required><br>
						<input type="email" name="email" id="email" placeholder="Email Address" required><br>
						<input  name="Phone" id="phone" placeholder="Phone Number" required><br>
						<input type="password" name="password1"  placeholder="Password" required><br>
						<input type="password" name="confirmpass"  placeholder="Confirm Password" required><br>
						</div>
						<button id="submit" name="reg_user">Sign Up</button>
					</form>
						
				  		
						<br>
						<h5>Already a member?<a href= "index.php" align= "center" class="register-btn" type="button">Sign in</a></h5>
				</div> 
			</div>
       
    </section>
	
	<script src="script.js"></script>
	
    </body>
    
</html>
