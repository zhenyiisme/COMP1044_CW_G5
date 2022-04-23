<?php

function emptyinSU($username,$passwd,$firstname,$lastname)
{
	$result;
	if(empty($username)|| empty($passwd)|| empty($firstname)|| empty($lastname))
	{
		$result = true; //if any field is empty
	}
	else
	{
		$result = false;
	}
	return $result;
}
	
function invldUname($conn, $username)
{
	$sql = "SELECT * FROM user WHERE username = ?;";
	$statement = mysqli_stmt_init($conn);//stop users from messing up our code by inputting code in sign up form
	if(!mysqli_stmt_prepare($statement,$sql))//check for error
	{
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($statement,"s",$username);
	mysqli_stmt_execute($statement);
	
	$resultdata = mysqli_stmt_get_result($statement);//got this user ald in table?
	
	if($row = mysqli_fetch_assoc($resultdata))
	{
		return $row;
	}
	else
	{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($statement);
}

function createUser($conn, $username, $passwd, $firstname, $lastname)
{
	$sql = "INSERT INTO user(username, password, firstname,lastname) VALUES (?,?,?,?);";
	$statement = mysqli_stmt_init($conn);//stop users from messing up our code by inputting code in sign up form
	if(!mysqli_stmt_prepare($statement,$sql))//check for error
	{
		header("location: ../signup.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($statement,"ssss", $username, $passwd, $firstname, $lastname);
	mysqli_stmt_execute($statement);
	mysqli_stmt_close($statement);
	header("location: ../signup.php?error=none");
	exit();
	
}

function emptyinLI($username,$passwd)
{
	$result;
	if(empty($username)|| empty($passwd))
	{
		$result = true; 
	}
	else
	{
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $passwd)
{
	$usernameExists = invldUname($conn, $username);
	
	//error handling
	if($usernameExists == false)
	{
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	
	$pass = $usernameExists["password"];
	$loginstats = mysqli_query($conn,"SELECT * FROM user WHERE password = '$passwd'");
	
	if(mysqli_num_rows($loginstats)<=0)
	{
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else
	{
		session_start();
		$_SESSION["uid"] = $usernameExists["user_id"];
		$_SESSION["usern"] = $usernameExists["username"];
		header("location: ../Mainpage.html");
		exit();
	}
}

function emptyUp($bookid,$borrowid,$borrowstatus)
{
	$result;
	if(empty($bookid)|| empty($borrowid)|| empty($borrowstatus))
	{
		$result = true; //if any field is empty
	}
	else
	{
		$result = false;
	}
	return $result;
}

function invldbookid($conn, $bookid)
{
	$sql = "SELECT * FROM book WHERE book_id = ?";
	$statement = mysqli_stmt_init($conn);//stop users from messing up our code by inputting code in sign up form
	if(!mysqli_stmt_prepare($statement,$sql))//check for error
	{
		header("location: ../update-process(borrowdetails).php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($statement,"i",$bookid);
	mysqli_stmt_execute($statement);
	
	$resultdata = mysqli_stmt_get_result($statement);//got this book_id in table?
	
	if($row = mysqli_fetch_assoc($resultdata))
	{
		return $row;
	}
	else
	{
		$result = false;
		return $result;
		
	}
	
	mysqli_stmt_close($statement);
}

function invldborrowid($conn, $borrowid)
{
	$sql = "SELECT * FROM borrow WHERE borrow_id = ?";
	$statement = mysqli_stmt_init($conn);//stop users from messing up our code by inputting code in sign up form
	if(!mysqli_stmt_prepare($statement,$sql))//check for error
	{
		header("location: ../update-process(borrowdetails).php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($statement,"i",$borrowid);
	mysqli_stmt_execute($statement);
	
	$resultdata = mysqli_stmt_get_result($statement);//got this borrow_id in table?
	
	if($row = mysqli_fetch_assoc($resultdata))
	{
		return $row;
	}
	else
	{
		$result = false;
		return $result;
		
	}
	
	mysqli_stmt_close($statement);
}

function Updatebd($conn, $borrowdetailsid, $bookid, $borrowid, $borrowstatus, $datereturn)
{
	
mysqli_query($conn,"UPDATE borrowdetails SET borrow_details_id='" . $_POST['borrow_details_id'] . "', book_id='" . $_POST['book_id'] . "', borrow_id='" . $_POST['borrow_id'] . "', borrow_status='" . $_POST['borrow_status'] . "' ,date_return='" . $_POST['date_return'] . "' WHERE borrow_details_id='" . $_POST['borrow_details_id'] . "'");

echo '<script>alert("Form submitted successfully!");window.location.href = "../updateborrowdetails.php";</script>';

}