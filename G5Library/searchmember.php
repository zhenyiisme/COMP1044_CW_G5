<?php
$con = new PDO("mysql:host=localhost;dbname=library",'root','');

/* $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];
    $ban_status = $_POST['ban_status'];

    */


if (isset($_POST[">>>"])) {
	    
        
    $strmember = $_POST["searchMember"];

    if(!empty($_POST['searchMember'])){
    
    $surprise = $con->prepare("SELECT * FROM member 
    WHERE firstname LIKE '%$strmember%' 
    OR lastname LIKE '%$strmember%' 
    OR contact LIKE '%$strmember%'
    OR ban_status LIKE '%$strmember%'
    OR type LIKE '%$strmember%'");

        $surprise->setFetchMode(PDO:: FETCH_OBJ);
        $surprise -> execute();

        
            while($row = $surprise->fetch()) {


?>
        <!DOCTYPE html>
<html>
    <head>
        <title>Member Search Result</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="DatabaseCW.css" />
        <title>G5Library</title>
        <link rel="icon" href="images/Icon.jpg" width="3" height="auto" />
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
        </style>  

            <table class="center">
    
            <tr>
            
            <th>member_id</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>gender</th>
            <th>address</th>
            <th>contact</th>
            <th>type</th>
            <th>year_level</th>
            <th>ban_status</th>
            
        
            </tr>
            
            <tr>
            
            <td><?php echo $row-> member_id; ?></td>
            <td><?php echo $row-> firstname; ?></td>
            <td><?php echo $row-> lastname; ?></td>
            <td><?php echo $row-> gender; ?></td>
            <td><?php echo $row-> address; ?></td>
            <td><?php echo $row-> contact; ?></td>
            <td><?php echo $row-> type; ?></td>
            <td><?php echo $row-> year_level; ?></td>
            <td><?php echo $row-> ban_status; ?></td>
			
			<td><a href="includes/delete-process2.php?id=<?php echo $row-> member_id; ?>">Delete</a></td>
	
            </tr>

            </table>
		</div>
		
        <footer>
			<button class="button circle" onclick="myFunction()">&nbsp;?&nbsp;</button>
			<div class="hide" id="help">
				Click delete button on the right side of the table to delete member details
			</div>
			<script src="helpbutton.js"></script>
	    </footer>

        </body>
    </html>
    <?php 

}




}              else{  

        echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                }


} //end for search member 


?>