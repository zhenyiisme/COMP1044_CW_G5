<?php


    $conn = new mysqli("localhost","root","","library");
    
    
    $book_title = $_POST['book_title'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $book_copies = $_POST['book_copies'];
    $book_pub = $_POST['book_pub'];
    $isbn = $_POST['isbn'];
    $copyright_year = $_POST['copyright_year'];
    $date_added = $_POST['date_added'];
    $status = $_POST['status'];

    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];
    $ban_status = $_POST['ban_status'];
  
    //start for add book function
    
    if(isset($_POST['AddBookSubmit'])){ 

       if(!empty($_POST['book_title'])){

            $addbooksql = 
            "INSERT INTO book 
            ( book_title, category, author,book_copies,book_pub,isbn,copyright_year,date_added,status) 
            VALUES
            ( '$book_title','$category','$author','$book_copies','$book_pub','$isbn','$copyright_year','$date_added','$status')";
    
    
        if ($conn->query($addbooksql) === TRUE) { 
    
        echo '<script>alert("Form submitted successfully!");history.go(-1);</script>';
    
        }
        else{
       
        echo '<script>alert("Form not submitted!");history.go(-1);</script>';  
        }


            }else{

            echo '<script>alert("Form not submitted! Book title field required!");history.go(-1);</script>';

            }

    }
 
                    //end for add book function

    
                    //start for add member function

    else if(isset($_POST['AddMemberSubmit'])){ 

         if(!empty($_POST['firstname']) && !empty($_POST['lastname'])){

                 $addmembersql = 
                "INSERT INTO member 
                ( firstname, lastname, gender,address,contact,type,year_level,ban_status) 
                VALUES
                ( '$firstname','$lastname','$gender','$address','$contact','$type',NULLIF('$year_level',''),'$ban_status')";
   
        if ($conn->query($addmembersql) === TRUE) { 
    
        echo '<script>alert("Form submitted successfully!");history.go(-1);</script>';

        }
        else{
   
        echo '<script>alert("Form not submitted!");history.go(-1);</script>';  
        }


                }else{

                echo '<script>alert("Form not submitted! Name field required!");history.go(-1);</script>';


                }

    }           //end for add member function


    //start for search for book function

      $con = new PDO("mysql:host=localhost;dbname=library",'root','');

        if (isset($_POST[">>"])) {
	    
        
            $str = $_POST["searchBook"];

            if(!empty($_POST['searchBook'])){
	        
            $sth = $con->prepare("SELECT * FROM book WHERE book_title LIKE '$str' OR book_pub LIKE '$str' OR author LIKE '$str'
            OR isbn LIKE '$str'") ;

	            $sth->setFetchMode(PDO:: FETCH_OBJ);
	            $sth -> execute();

	                while($row = $sth->fetch()) {


        ?>
		        <br><br><br>  
                
                <style>   
                table, th, td {
                border: 1px solid;
                }
                </style>  
		            <table>
            
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

			        </tr>

		            </table>
            <?php 
	    
    }
		
		
		
    }              else{  

                echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                        }

    
    } //end for search book function


    //start for search member function

    if (isset($_POST[">>>"])) {
	    
        
        $strmember = $_POST["searchMember"];

        if(!empty($_POST['searchMember'])){
        
        $surprise = $con->prepare("SELECT * FROM member 
        WHERE firstname LIKE '$strmember' 
        OR lastname LIKE '$strmember' 
        OR contact LIKE '$strmember'
        OR ban_status LIKE '$strmember'
        OR type LIKE '$strmember'");

            $surprise->setFetchMode(PDO:: FETCH_OBJ);
            $surprise -> execute();

            
                while($row = $surprise->fetch()) {


    ?>
            <br><br><br>  
            
            <style>   
            table, th, td {
            border: 1px solid;
            }
            </style>  
                <table>
        
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
                

                </tr>

                </table>
        <?php 
    
}
    
    
    

}              else{  

            echo '<script>alert("Please Search Something!");history.go(-1);</script>';
                    }


} //end for search member 


    



    

   


    $conn->close();


    

    
        
    

 ?>