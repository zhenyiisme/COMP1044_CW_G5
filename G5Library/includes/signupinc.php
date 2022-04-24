<?php

if(isset($_POST["submit"]))//did they go thru signup form?
{
	$username = $_POST["uname"];//from name tag of username
	$passwd = $_POST["pwd"];//get from global var
	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];

	//error handling
	require_once 'dbhinc.php';
	require_once 'functionsinc.php';
	
	if(emptyinSU($username,$passwd,$firstname,$lastname) !== false)//empty input
	{
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	
	if(invldUname($conn, $username) !== false)//username exist ald
	{
		header("location: ../signup.php?error=invldUname");
		exit();
	}
	
	createUser($conn, $username, $passwd, $firstname, $lastname);//register new user

	
}
else//return user to sign up page
{
	header("location: ../signup.php");
	exit();
}