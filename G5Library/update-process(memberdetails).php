<?php
include_once 'includes/dbhinc.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE member set member_id='" . $_POST['member_id'] . "', firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', gender='" . $_POST['gender'] . "' ,address='" . $_POST['address'] . "', contact='" . $_POST['contact'] . "', type='" . $_POST['type'] . "', year_level='" . $_POST['year_level'] . "', ban_status='" . $_POST['ban_status'] . "' WHERE member_id='" . $_POST['member_id'] . "'");
echo '<script>alert("Form submitted successfully!");window.location.href = "updatememberdetails.php";</script>';
}
$temp=$_GET['id']; 
$result = mysqli_query($conn,"SELECT * FROM member WHERE member_id='$temp'");
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

        <div class="mainAddBook">
            <form name="frmUser" method="post" action="">
                <div><?php if(isset($message)) { echo $message; } ?>
                </div>
                <div style="padding-bottom:5px;">
                <a href="retrieve(memberdetails).php">Updated Form</a>
                </div>
                Member Id : <br>

                <input type="int" name="member_id"  value="<?php echo $row['member_id']; ?>"readonly>
                <br>
                First Name : <br>
                <input type="varchar" name="firstname" class="txtField" value="<?php echo $row['firstname']; ?>">
                <br>
                Last Name :<br>
                <input type="varchar" name="lastname" class="txtField" value="<?php echo $row['lastname']; ?>">
                <br>
                Gender :<br>
                <input type="varchar" name="gender" class="txtField" value="<?php echo $row['gender']; ?>">
                <br>
                Address :<br>
                <input type="varchar" name="address" class="txtField" value="<?php echo $row['address']; ?>">
                <br>
                Contact :<br>
                <input type="int" name="contact" class="txtField" value="<?php echo $row['contact']; ?>">
                <br>
                Type :<br>
                <input type="varchar" name="type" class="txtField" value="<?php echo $row['type']; ?>">
                <br>
                Year Level :<br>
                <input type="varchar" name="year_level" class="txtField" value="<?php echo $row['year_level']; ?>">
                <br>
                Ban Status :<br>
                <input type="varchar" name="ban_status" class="txtField" value="<?php echo $row['ban_status']; ?>">
                <br><br>
                <input type="submit" name="submit" value="Submit" class="buttom">

            </form>

            <footer>
            <button class="button circle" onclick="myFunction()">&nbsp;?&nbsp;</button>
            <div class="hide" id="help">
            Enter new member detail/s and submit. Then press the Updated Form button to view newly updated member details
            </div>
            <script src="helpbutton.js"></script>
            </footer>
    </body>
</html>