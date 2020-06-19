<html>
<head>
<?php
	session_start();
	include 'conn.php';
	if(isset($_POST['formsubmit']))
	{
		$user_id=$_SESSION['id'];
		$order_no=$_SESSION['confirmation_id'];
		$q1=$_POST['q1'];
		$q2=$_POST['q2'];
		$q3=$_POST['q3'];
		$q4=$_POST['q4'];
		$q5=$_POST['q5'];
		$sql="INSERT INTO feedback(user_id,order_no,q1,q2,q3,q4,q5) VALUES('$user_id','$order_no','$q1','$q2','$q3','$q4','$q5')";
		mysqli_query($conn,$sql);
		header("location: se.php");
	}
?>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Stack'n'Heap</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  
    <link rel="stylesheet/less" type="text/css" href="less/style.css" />
<script src="vendor/less.min.js" ></script>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color:#777;
  color: white;
}




* {
  box-sizing: border-box;
}


.container {
  padding: 16px;
  background-color: white;
}


input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}


a {
  color: dodgerblue;
}


.signin {
  background-color: #f1f1f1;
  text-align: center;
}



</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" >

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="se.php">Stack'n'Heap</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="se.php">HOME</a></li>
		<li><a href="flight.php">FLIGHTS</a></li>
		
		
		
        <!--<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">JOIN
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <li><a href="login.html">Login</a></li>
            <li><a href="login.html">Sign up</a></li> 
          </ul>
        </li>-->
      </ul>
    </div>
  </div>
</nav>
<br>
<br><br>
<div class="container text-center">    
  <div class="row">
      <div class="col-lg-6">
<a class="navbar-brand">
	
	<h1>Feedback </h1>
<br/>
<div class="container">
  <form action="feedback.php" method="POST">
    <label for="q1">Were we able to satisfy your need?</label>
    <input type="text" name="q1" placeholder="Your Response..">

    <label for="q2">What would have made your experience with us better?</label>
    <input type="text" name="q2" placeholder="Your Response..">
	
	<label for="q3">Was it easy to use our service?</label>
    <input type="text" name="q3" placeholder="Your Response..">
	
	<label for="q4">How likely are you to repeat your business with us?</label>
    <input type="text" name="q4" placeholder="Your Response..">
	
	<label for="q5">Is there anything else you would like us to know about your experience?</label>
    <input type="text" name="q5" placeholder="Your Response..">
	
   
<br/>
    <input type="submit" value="Submit" name="formsubmit">
  </form>
</div>
	
	</a>
<br>

<!--<div id="id01" class="modal">
  
  <form action="/action_page.php">
  <div class="container">
    <h1>Add Flight</h1>
    <p>Please fill in this form to add a flight</p>
    <hr>

    <label for="email"><b>Source</b></label>
    <input type="text" placeholder="Enter Source" name="email" required>

    <label for="psw"><b>Destination</b></label>
    <input type="password" placeholder="Enter Destination" name="psw" required>

    <label for="psw-repeat"><b>Date of Flight</b></label>
    <input type="password" placeholder="Repeat Date of flight" name="psw-repeat" required>
	
	<label for="psw"><b>Weight</b></label>
    <input type="password" placeholder="Enter Weight" name="psw" required>
	
	<label for="psw"><b>Status</b></label>
    <input type="password" placeholder="Enter Status" name="psw" required>
    <hr>
    <p>Please recheck data you have entered <a href="#">Terms & Privacy</a>.</p>

   <a href="flight.php"><input type="button" name="button" value="Login"></a>
  </div>
  
  
</form>
</div>-->

 </div>
 </div>
 </div>
<br><br>

<!-- Footer -->
<footer class="text-center">
 <h2>Posted by: Stack'n'Heap</h2>
  <p>Contact information: <a href="mailto:someone@example.com">
  HelpTeam@example.com</a>.</p>
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>