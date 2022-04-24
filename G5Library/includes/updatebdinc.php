<?php

if(isset($_POST["submit"]))
{
	$borrowdetailsid = $_POST["borrow_details_id"];//from name tag of username
	$bookid = $_POST["book_id"];//get from global var
	$borrowid = $_POST["borrow_id"];
	$borrowstatus = $_POST["borrow_status"];
	$datereturn = $_POST["date_return"];

	//error handling
	require_once 'dbhinc.php';
	require_once 'functionsinc.php';
	
	if(emptyUp($bookid,$borrowid,$borrowstatus) !== false)//empty input
	{
		header("location: ../update-process(borrowdetails).php?id=$borrowdetailsid&error=emptyinput");
		exit();
	}
	
	if(invldbookid($conn, $bookid) == false)//bookid does not exist
	{
		header("location: ../update-process(borrowdetails).php?id=$borrowdetailsid&error=invldbookid");
		exit();
	}
	
	if(invldborrowid($conn, $borrowid) == false)//borrowid does not exist
	{
		header("location: ../update-process(borrowdetails).php?id=$borrowdetailsid&error=invldborrowid");
		exit();
	}
	
	Updatebd($conn, $borrowdetailsid, $bookid, $borrowid, $borrowstatus, $datereturn);
}
