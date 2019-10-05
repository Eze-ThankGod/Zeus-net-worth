
<!DOCTYPE html>
<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="login.css">
            <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text&display=swap" rel="stylesheet">
             <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1028737615812-769nqo848adqso8pukeap3d9o8ck4e9h.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
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
				    <!-- Display Google sign-in button -->
<div id="gSignIn"></div>

<!-- Show the user profile details -->
<div class="userContent" style="display: none;"></div>
               
<script>
// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            // Display the user details
            var profileHTML = '<h3>Welcome '+resp.given_name+'! <a style="color:red;" href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b></b> <a style="color:blue;"  href="calculator.html">Proceed to calculator</a></p>';
            document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            
            document.getElementById("gSignIn").style.display = "none";
            document.getElementsByClassName("userContent")[0].style.display = "block";
        });
    });
}

// Sign-in failure callback
function onFailure(error) {
    alert(error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });
    
    auth2.disconnect();
}
</script>
	
	<script src="script.js"></script>
	
    </body>
    
</html>
