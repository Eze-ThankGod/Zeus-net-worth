<?php
session_start(); 


if (!isset($_SESSION['name'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: signin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NetWorth Homepage</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles2.css">
</head>
<body style="background-color: #E5E5E5">


    <div class="container" id="original" >
            <div class="navbar fixed-top navbar-light bg-light" >
                <div class="left"><p><a href="logout.php?logout='1'"><b style="color:red;"><i class="fa fa-power-off" aria-hidden="true" style="margin-right:8px;"></i>logout</b></a></b> <a href="https://rhizocarpous-suppre.000webhostapp.com" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script></p></div>
                <a class="navbar-brand" href="#" id="navtitle">Networth Calculator</a>
                <div class="right"><a href="splash.html"><img src="zeuslogo.png" width="75" height="45" alt=""></a></div>

            </div>

            <div class="after_nav" style="max-width:470px;margin-top:100px">
                <h2>Welcome
                <?php echo $_SESSION['name']; ?></h2>
                </div>
                
               
                <div class="calculate">Calculate Networth</div>

            </div>

                <form action="#" style="max-width:470px;margin:auto" id="main" onsubmit="myFunction()">


                    <br><br>

                    <div class="form-group">
                        <label class="input-label">Money In the Bank (&#8358;)</label>
                        <input type="text" class="form-control" id="money" required>
                    </div>

                    <div class="form-group">
                        <label class="input-label">Assets (&#8358;)</label>
                        <input type="text" id="asst" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="input-label">Cash (&#8358;)</label>
                        <input type="text" id="cash" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label  class="input-label">Liabilities (&#8358;)</label>
                        <input type="text" id="liab" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="input-label">Worth of Cars (&#8358;)</label>
                        <input type="text" class="form-control" id="worth" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="calc" onclick="myFunction()">CALCULATE</button>
                

                    <p id="net" style="margin-top: 20px;">Your networth is  </p>

                    <a href="#sign_in" class="total">&#8358;<span class="total" id="total"></span></a>

                </form>
            </div>
    <script>
        function myFunction(){
          var asst= parseInt(document.getElementById("asst").value);
          var money= parseInt(document.getElementById("money").value);
          var cash= parseInt(document.getElementById("cash").value);
          var liab= parseInt(document.getElementById("liab").value);
          var worth= parseInt(document.getElementById("worth").value);
          if(asst && money && cash && liab && worth){
              var networth= (asst + money + cash) - liab;
              document.getElementById("total").innerHTML=networth;
          }
        }
    </script>

</body>
</html>