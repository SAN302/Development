<html>
<head>
<?php
session_start();
include 'conn.php';
	if(isset($_POST['register_button']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$phoneno=$_POST['phoneno'];
		$cnic=$_POST['cnic'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$isbuyer=$_POST['isbuyer'];
		if($isbuyer!="1")
		{
			$isbuyer="0";
		}
		
		if($password==$password2)
		{
			$sql="INSERT INTO signup(fname,lname,email,phoneno,cnic,password,password2,isbuyer) VALUES('$fname','$lname','$email','$phoneno','$cnic','$password','$password2','$isbuyer')";
			mysqli_query($conn,$sql);
			$_SESSION['isbuyer']=$row['isbuyer'];
			$_SESSION['id']=$row['id'];
			$_SESSION['fname']=$fname;
			header("location: se.php");
		}
		else
		{
			$_SESSION['message']="The two password doesnot match!!";
		}
	}
	if(isset($_POST['login_button']))
	{
		if( isset($_POST['l_email']) and isset($_POST['l_password']) )
		{
			$l_email=$_POST['l_email'];
			$l_password=$_POST['l_password'];
			$query = mysqli_query($conn,"SELECT fname,isbuyer,id FROM signup WHERE email='$l_email' AND password='$l_password'");
			$numrows = mysqli_num_rows($query);
			$row=mysqli_fetch_array($query);
			if($numrows>0)
			{
				$_SESSION['fname']=$row['fname'];
				$_SESSION['isbuyer']=$row['isbuyer'];
				$_SESSION['id']=$row['id'];
				header("location: se.php");
			}
			else
			{
				echo "<script>alert('email or password incorrect!')</script>";
				echo "<script>location.href='login.php'</script>";
			}
		}
	}
	
?>

  <title>Stack'n'Heap</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet/less" type="text/css" href="less/log.css" />	<script src="vendor/less.min.js" ></script>


</head>
<body>
<div class="container text-center">
	<h1 class="glow"><a href="se.php">Stack'n'Heap</a></h1>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign up</button>
</div>
<div id="id01" class="modal">
  
  <form method="post" class="modal-content animate" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/o.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="l_email"><b>Email</b></label>
      <input type="text" placeholder="Enter Username" name="l_email" required>

      <label for="l_password"><b>Password</b></label>
	  <input type="password" placeholder="Enter Password" name="l_password" required>
        

     	
<!--<a href="se.php">-->
		<input type="submit" name="login_button" value="Login"></a>
	 
	 
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> 
    </div>

	



	
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id02" class="modal">
  
  <form method="post" class="modal-content animate" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/o.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>

      <label for="lname"><b>Last Name</b></label>
	  <input type="text" placeholder="Enter Last Name" name="lname" required>
	       		   
	  <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
	       
	  <label for="phoneno"><b>Phone No.</b></label>
      <input type="text" placeholder="Enter Phone No" name="phoneno" required>
        
	  <label for="cnic"><b>Cnic</b></label>
      <input type="text" placeholder="Enter Cnic" name="cnic" required>
	  
	  <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
	  
	  <label for="psw"><b>Re-enter Password</b></label>
      <input type="password" placeholder="Re-Enter Password" name="password2" required>
	  
     	
	  <br>
	 <label for="isbuyer">
        <input type="checkbox"  name="isbuyer" value="1"> As Buyer
      </label> 
	  <br>
	  <label>
        <input type="checkbox"  name="carrier"> As Carrier
      </label> 
	  
<!--<a href="se.php">-->
		<br>
	<input type="submit" name="register_button" value="Sign up"></a>
	 
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
