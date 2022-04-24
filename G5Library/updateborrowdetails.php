<?php
include_once 'includes/dbhinc.php';
$result = mysqli_query($conn,"SELECT * FROM borrowdetails");
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="DatabaseCW.css">
        <title>G5Library</title>
        <link rel="icon" href="images/Icon.jpg" width="3" height="auto"/>
    </head>

    <body>
        <div class="header">
            <div class="navbar">
				<div class="home">
                <a href="Mainpage.html"><h1>G5 Library Logs</h1></a>
                </div>
                <nav>
                    <ul>
					    <li><a href="AddBook.html" class="nav">Add Book</a></li>
						<li><a href="AddMember.html" class="nav">Add Member</a></li>
						<li><a href="SearchBook.html" class="nav">Search Book</a></li>
						<li><a href="SearchMember.html" class="nav">Search Member</a></li>
						<li><a href="rent.html" class="nav">Borrow Book</a></li>
						<li><a href="updateborrowdetails.php" class="nav">Update Borrowing Details</a></li>
                        <li><a href="updatememberdetails.php" class="nav">Update Member Details</a></li>
                        <li><a href="includes/logoutinc.php" class="nav">Log Out</a></li>
                    </ul>
                </nav>			
            </div>
        </div>
		<div class="main">
		<?php
		if (mysqli_num_rows($result) > 0) {
		?>
		<table class="center">
			<tr>
				<td>borrow_details_id</td>
				<td>book_id</td>
				<td>borrow_id</td>
				<td>borrow_status</td>
				<td>date_return</td>
				
			</tr>
					<?php
					$i=0;
					while($row = mysqli_fetch_array($result)) {
					?>
			<tr>
				<td><?php echo $row["borrow_details_id"]; ?></td>
				<td><?php echo $row["book_id"]; ?></td>
				<td><?php echo $row["borrow_id"]; ?></td>
				<td><?php echo $row["borrow_status"]; ?></td>
				<td><?php echo $row["date_return"]; ?></td>
				
				<td><a href="update-process(borrowdetails).php?id=<?php echo $row["borrow_details_id"]; ?>">Update</a></td>
			</tr>
					<?php
					$i++;
					}
					?>
		</table>
		<?php
		}
		else
		{
			echo "No result found";
		}
		?>
		</div>

		<footer>
        <button class="button circle" onclick="myFunction()">&nbsp;?&nbsp;</button>
        <div class="hide" id="help">
          To update desired borrowing detail/s, click the update button on the right side of the table
        </div>
        <script src="helpbutton.js"></script>
      </footer>
 	</body>
</html>


