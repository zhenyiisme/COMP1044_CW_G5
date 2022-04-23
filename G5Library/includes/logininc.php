<?php

if(isset($_POST["submit"]))//did they go thru login form?
{
	$username = $_POST["uname"];//from name tag
	$passwd = $_POST["pwd"];
	
	//error handling
	require_once 'dbhinc.php';
	require_once 'functionsinc.php';
	
	if(emptyinLI($username,$passwd) !== false)//empty input
	{
		header("location: ../login.php?error=emptyinput");
		exit();
	}
	
	loginUser($conn, $username, $passwd);
	
}
else
{
	header("location: ../login.php");
	exit();
}