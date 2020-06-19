<html>
<head>
<?php
	session_start();
	include 'conn.php';
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

	<?php
		if(isset($_POST['accept_button']))
		{	
			if($_SESSION['numrow']>0)
			{
				$order_received=1;
				$con_id=$_SESSION['con_id'];
				$sql="UPDATE confirmation SET order_received='$order_received' WHERE id='$con_id'";
				mysqli_query($conn,$sql);
				header("location: feedback.php");
			}
		}
	
	
	?>

<div class="container text-center">    
<h2>Order Confirmation</h2>
  <div class="row">
      <div class="col-lg-12">
<!--<a class="navbar-brand">-->
	<table id="customers">
		<tr>
			<th>Carrier ID</th>
			<th>Carrier Name</th>
			<th>Date of flight</th>
			<th>Source</th>
			<th>Destinaion</th>
		</tr>
		<?php
		
		$currentuser_id=$_SESSION['id'];
		$order_received=0;
		$query = mysqli_query($conn,"select con.id,con.carrier_id,su.fname,con.flight_date,con.source,con.destination,con.payment,con.declined from signup su,confirmation con where con.carrier_id=su.id AND buyerid='$currentuser_id' AND order_received='$order_received'");
		$numrows = mysqli_num_rows($query);
		#$check_declined=$numrows['declined'];
		$_SESSION['numrow']=$numrows;
		if($numrows>0)
		{
			while($row=mysqli_fetch_array($query))
			{
				$_SESSION['payment']=$row['payment'];
				if($row['declined']==0)
				{
					echo "<tr>";
						$_SESSION['con_id']=$row['id'];
						echo "<td>".$row['carrier_id']."</td>";
						echo "<td>".$row['fname']."</td>";
						echo "<td>".$row['flight_date']."</td>";
						echo "<td>".$row['source']."</td>";
						echo "<td>".$row['destination']."</td>";
						//echo '<td><form name="check" method="POST" action=""><input type="text" name="item_link" required /></td>';
						//echo "<td><input class='btn' type='submit' data-toggle='modal' data-target='#myModal' name='accept_button' value='Accept' /></form></td>";
					 echo "</tr>";
				}
				else
				{
					echo "<h1>No Confirmations Pending</h1>";
					break;
				}
			}
		}
		else
		{
			echo "<h1>No Confirmations Pending</h1>";
		}
		?>
	</table>
	<!--</a>-->
<br><?php
	if($_SESSION['payment']==1)
	{
		?><form action="" method="POST"><input class='btn' type='submit' data-toggle='modal' data-target='#myModal' name='accept_button' value='Order Received' /></form>
	<?php
	}
	else
	{
		?><h4>Payment is due</h4>
	<?php
	}
	?>
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