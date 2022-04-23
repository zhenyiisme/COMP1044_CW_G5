<?php
include_once 'dbhinc.php';

	$temp = $_GET['id'];
	$sql = "DELETE FROM book WHERE book_id='$temp'";

	if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Record deleted successfully");window.location.href = "../SearchBook.html";</script>';
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
