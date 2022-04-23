<?php
$con = new PDO("mysql:host=localhost;dbname=library",'root','');

/* $book_title = $_POST['book_title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $book_copies = $_POST['book_copies'];
    $book_pub = $_POST['book_pub'];
    $isbn = $_POST['isbn'];
    $copyright_year = $_POST['copyright_year'];
    $date_added = $_POST['date_added'];
    $status = $_POST['status'];
 */
if (isset($_POST[">>"])) {


    $str = $_POST["searchBook"];

    if(!empty($_POST['searchBook'])){
    
    $sth = $con->prepare("SELECT * FROM book WHERE book_title LIKE '%$str%' OR book_pub LIKE '%$str%' OR author LIKE '%$str%'
    OR isbn LIKE '%$str%'") ;

        $sth->setFetchMode(PDO:: FETCH_OBJ);
        $sth -> execute();

            while($row = $sth->fetch()) {


?>
        <!DOCTYPE html>
<html>
    <head>
        <title>Book Search Result</title>
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
            <table class="center">
    
            <tr>
            
            <th>book_id</th>
            <th>book_title</th>
            <th>category</th>
            <th>author</th>
            <th>book_copies</th>
            <th>book_pub</th>
            <th>isbn</th>
            <th>copyright_year</th>
            <th>date_added</th>
            <th>status</th>
        
            </tr>
            
            <tr>
            
            <td><?php echo $row-> book_id; ?></td>
            <td><?php echo $row-> book_title; ?></td>
            <td><?php echo $row-> category; ?></td>
            <td><?php echo $row-> author; ?></td>
            <td><?php echo $row-> book_copies; ?></td>
            <td><?php echo $row-> book_pub; ?></td>
            <td><?php echo $row-> isbn; ?></td>
            <td><?php echo $row-> copyright_year; ?></td>
            <td><?php echo $row-> date_added; ?></td>
            <td><?php echo $row-> status; ?></td>
			
			<td><a href="includes/delete-process.php?id=<?php echo $row-> book_id; ?>">Delete</a></td>
            </tr>

            </table>
            </form>
        </div>
        
    </body>

    <footer>
			<button class="button circle" onclick="myFunction()">&nbsp;?&nbsp;</button>
			<div class="hide" id="help">
				Click delete button on the right side of the table to delete book details
			</div>
			<script src="helpbutton.js"></script>
	</footer>
</html>
            
    <?php 

}



}              else{  

        echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                }


} //end for search book function





?>