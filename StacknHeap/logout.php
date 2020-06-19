<?php
	session_start();
	if(isset($_SESSION['fname']))
	{
		session_destroy();
		echo "<script>location.href='login.php'</script>";
	}
?>