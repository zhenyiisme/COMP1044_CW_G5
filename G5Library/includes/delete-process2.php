<?php
include_once 'dbhinc.php';

	$temp = $_GET['id'];
	$sql = "DELETE FROM member WHERE member_id='$temp'";

	if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Record deleted successfully");window.location.href = "../SearchMember.html";</script>';
	} 
	else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
