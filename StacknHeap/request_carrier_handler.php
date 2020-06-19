<?php
	session_start();
	include 'conn.php';
	
	$obj=$_POST;
	$currentuserid=$_SESSION['id'];
	echo "flight ID: ";
	print_r($obj['flightid']);
	echo "	item_link: ";
	print_r($obj['item_link']);
?>