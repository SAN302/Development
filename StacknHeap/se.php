<html lang="en">
<head>
<?php
session_start();
include 'conn.php';
?>

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
#customers tr:nth-child(odd){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color:#777;
  color: white;
}
      
    </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Stack'n'Heap</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	  <ul class="nav navbar-nav navbar-left">
		<li><a>
		<?php 
	   if(isset($_SESSION['fname']))
		{
			echo "<li>Welcome ".$_SESSION['fname']."<li>";
		
		}
		if(isset($_SESSION['fname']) && $_SESSION['isbuyer']==1)
		{
			echo "<li><a href='carrier_request_confirmation.php'>Carrier Confirmation</a></li>";
			echo "<li><a href='order_confirmation.php'>Order Confirmation</a></li>";
		}
		?></a></li>
		
	  </ul>
      <ul class="nav navbar-nav navbar-right">
	
	  
	   
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#band">MISSION</a></li>
        <li><a href="#tour">ARRIVALS</a></li>
        <li><a href="#contact">CONTACT</a></li>
		<?php
		if(isset($_SESSION['fname']) && $_SESSION['isbuyer']==0)
		{
			echo "<li><a href='flight.php'>FLIGHTS</a></li>";
			echo "<li><a href='logout.php'>Logout</a></li>";
		}
		elseif(isset($_SESSION['fname']))
		{
			//echo "<a href='logout.php'><input type=button value=logout name=logout_button></a>";
			echo "<li><a href='logout.php'>Logout</a></li>";
		}
		?>
		
		<?php
		if(!isset($_SESSION['fname']))
		{
			echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">JOIN<span class="caret"></span></a><ul class="dropdown-menu">  <li><a href="login.php">Login</a></li><li><a href="login.php">Sign up</a></li> </ul></li>';
		}
		?>
        <!--<li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>-->
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/se2.png" width="10px" height="10px" alt="New York" >
        <div class="carousel-caption">
		
          <h3>Better Together</h3>
        
        </div>      
      </div>

      <div class="item">
        <img src="img/se1.png" width="10px" height="10px" alt="Chicago" >
        <div class="carousel-caption">
          <h3>Satisfying Shipping Needs</h3>
         
        </div>      
      </div>
    
      <div class="item">
        <img src="img/se3.png" width="10px" height="10px" alt="Los Angeles" >
        <div class="carousel-caption">
          <h3>Economical</h3>
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3>MISSION</h3>
  <p><em>We love facilitating!</em></p>
  <p>Becoming an industry leader in creating enduring value by taking responsibility for the future through the choices we make today.This means clear and consistent leadership whilst engaging our employees.Transparency and improving our economic, environment and social contribution.Developing our human potential and collaborating with those who share our vision locally and globally.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Chief Executive Officer</strong></p><br>
      <div class="well">
        <img src="img/joh.png" class="img-circle" height="255" width="255" alt="Avatar">
      </div>
      <div id="demo">
        <p>I am thrilled to be here, and I’m excited about many of the things we’ll be working on in the near future.</p>
        <p>We have a great team here at Stack'n'Heap and I am excited to build upon that team as we continue to develop</p>
    
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Chief Financial Officer</strong></p><br>
     <div class="well">
        <img src="img/alim.png" class="img-circle" height="255" width="255" alt="Avatar">
      </div>
      <div id="demo2">
	  
        <p>This is now my fifth venture capital backed startup and I consider myself very fortunate to have been part of some amazing teams which have led to some great outcomes.</p>
        
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Customer Care Officer </strong></p><br>
      <div class="well">
        <img src="img/huzi.png" class="img-circle" height="255" width="255" alt="Avatar">
      </div>
      <div id="demo3">
        <p>For us, each customer is a person with diverse needs and requirements, and is treated as a partner – efficiently, reliably and honestly. Most of our skilled employees have been with us from the start, and they have extensive knowledge in all areas.</p>
        
        
      </div>
    </div>
  </div>
</div> 


	<?php
		if(isset($_POST['accept_button']))
		{
			$user_id=$_SESSION['id'];
			$flightuser_id=$_SESSION['flightuser_id'];
			$item_link=$_POST['item_link'];

			$accepted=-1;
			$rejected=-1;
			$sql="INSERT INTO carrier_request(cr_user_id,cr_flightuser_id,item_link,accepted,rejected) VALUES('$user_id','$flightuser_id','$item_link','$accepted','$rejected')";
			mysqli_query($conn,$sql);
		}
	?>


<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1" name="tour">
  <div class="container">
    <h3 class="text-center">ARRIVAL DATES</h3>
    <p class="text-center">Many of our employees are returning from cities all around the world.<br> Make it count!Get your stuff shipped!</p><br>
	<?php
	if(isset($_SESSION['fname']) && $_SESSION['isbuyer']==1)
	{
	?>
		<form action="se.php" method="POST">
			Destination: <input type="text" name="destination">
			Weight(max weight): <input type="number" name="weight" step="0.1" min="0" max="8"><br>
			<br><a href="se.php#tour"><input type="submit" name="searchbutton" value="Submit"></a><br>
		</form><br>
	<?php
	}
	?>
	
	
	
	
		<?php
	if(isset($_POST['destination']))
	{
		
		//mysqli_query($conn,$sql);
		//header("location: request.php");
		?><table id="customers">
		<tr>
			<th>Flight ID</th>
			<th>Source</th>
			<th>Destinaion</th>
			<th>Date of flight</th>
			<th>Weight</th>
			<th>Link</th>
			<th>Request</th>
		</tr><?php
		$u=0;
		$destination=$_POST['destination'];
		$query = mysqli_query($conn,"select user_id,source,destination,flight_date,weight from flight where status='$u' and destination='$destination'");
		$numrows = mysqli_num_rows($query);
		if($numrows>0)
		{
			while($row=mysqli_fetch_array($query))
			{
				echo "<tr>";
					$_SESSION['flightuser_id']=$row['user_id'];
					echo "<td>".$_SESSION['flightuser_id']."</td>";
					echo "<td>".$row['source']."</td>";
					echo "<td>".$row['destination']."</td>";
					echo "<td>".$row['flight_date']."</td>";
					echo "<td>".$row['weight']."</td>";
					echo '<td><form name="check" method="POST" action=""><input type="text" name="item_link" required /></td>';
					echo "<td><input class='btn' type='submit' data-toggle='modal' data-target='#myModal' name='accept_button' value='Accept' /></form></td>";
				 echo "</tr>";
			}
		}
		else if(isset($_POST['weight']))
		{
			
			$u=0;
			$weight=$_POST['weight'];
			$query = mysqli_query($conn,"select user_id,source,destination,flight_date,weight from flight where status='$u' and weight<='$weight'");
			$numrows = mysqli_num_rows($query);
			if($numrows>0)
			{
				while($row=mysqli_fetch_array($query))
				{
					echo "<tr>";
						$_SESSION['flightuser_id']=$row['user_id'];
						echo "<td>".$_SESSION['flightuser_id']."</td>";
						echo "<td>".$row['source']."</td>";
						echo "<td>".$row['destination']."</td>";
						echo "<td>".$row['flight_date']."</td>";
						echo "<td>".$row['weight']."</td>";
						echo '<td><form name="check" method="POST" action=""><input type="text" name="item_link" required /></td>';
						echo "<td><input class='btn' type='submit' data-toggle='modal' data-target='#myModal' name='accept_button' value='Accept' /></form></td>";
					 echo "</tr>";
				}
			}
		}
		else
		{
			echo "<h1>No Flights</h1>";
		}
		
	?>
		</table>
		<!--</div>
		 </div>
		 </div>--><br>``
		<?php
		
	}
		?>

	
    <ul class="list-group">
      <li class="list-group-item">September <span class="label label-danger">Sold Out!</span></li>
      <li class="list-group-item">October <span class="label label-danger">150 arrivals!</span></li> 
      <li class="list-group-item">November <span class="label label-danger">200 arrivals!</span></li> 
    </ul>
    
    <div class="row text-center">
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/paris.png" alt="Paris" width="400" height="300">
          <p><strong>Paris</strong></p>
          <p>Friday 27 November 2015</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Ship-Req</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/new.png" alt="New York" width="400" height="300">
          <p><strong>New York</strong></p>
          <p>Saturday 28 September 2015</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Ship-Req</button>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="img/san.png" alt="San Francisco" width="400" height="300">
          <p><strong>San Francisco</strong></p>
          <p>Sunday 29 October 2015</p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Ship-Req</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span>Link is Required</h4>
        </div>
       <!-- <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $10 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Request 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>-->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our Users!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Want to suggest something? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Islamabad, Pak</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +92 34353424256</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: Stack'n'Heap-team@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">From The Blog</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Hassan</a></li>
    <li><a data-toggle="tab" href="#menu1">Aleem</a></li>
    <li><a data-toggle="tab" href="#menu2">Lodhi</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Mr Hassan, Manager</h2>
      <p>Man, we've been on the road for some time now. Looking forward to continue this journey.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Mr Aleem, Financial Manager</h2>
      <p>Always a pleasure to be a part of this team! Hope you are entertained very well. Could anyone BE.. any more pleased?</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Mr Lodhi, Customer Care</h2>
      <p>The work of looking after customers and ensuring their satisfaction with one's business and its goods or services is our top priority</p>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="img/aero.png" class="img-responsive" style="width:100%">

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