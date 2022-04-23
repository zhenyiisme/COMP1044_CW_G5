<?php
include_once 'includes/dbhinc.php';

$temp=$_GET['id']; 
$result = mysqli_query($conn,"SELECT * FROM borrowdetails WHERE borrow_details_id='$temp'");
$row= mysqli_fetch_array($result);
?>
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

        <div class="mainsignup">
            <form name="frmUser" method="post" action="includes/updatebdinc.php">
                <div><?php if(isset($message)) { echo $message; } ?>
                </div>
                <div style="padding-bottom:5px;">
                <a href="retrieve(borrowdetails).php">Updated Form</a>
                </div>
                Borrow Details Id: <br>

                <input type="int" name="borrow_details_id"  value="<?php echo $row['borrow_details_id']; ?>"readonly>
                <br>
                Book Id: <br>
                <input type="int" name="book_id" class="txtField" value="<?php echo $row['book_id']; ?>">
                <br>
                Borrow Id :<br>
                <input type="int" name="borrow_id" class="txtField" value="<?php echo $row['borrow_id']; ?>">
                <br>
                Borrow Status:<br>
                <input type="varchar" name="borrow_status" class="txtField" value="<?php echo $row['borrow_status']; ?>">
                <br>
                Date Return:<br>
                <input type="datetime" name="date_return" class="txtField" value="<?php echo $row['date_return']; ?>">
                <br><br>
                <input type="submit" name="submit" value="Submit" class="buttom">

            </form>
        </div>

        <footer>
        <button class="button circle" onclick="myFunction()">&nbsp;?&nbsp;</button>
        <div class="hide" id="help">
          Enter new borrowing detail/s and submit. Then press the Updated Form button to view newly updated borrowing details
        </div>
        <script src="helpbutton.js"></script>
      </footer>
    </body>
</html>