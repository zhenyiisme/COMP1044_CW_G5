<?php


    $conn = new mysqli("localhost","root","","library");
    
    
    
    $member_id = $_POST['member_id'];
    $date_borrow = $_POST['date_borrow'];
    $due_date = $_POST['due_date'];
    
    
    
    
  
    //start for rent book function
    
    

    
  
    //start for search book function
    
    if(isset($_POST['rentNext'])){ 
        
       if(!empty($_POST['member_id']) ){

            $rentsql = 
            "INSERT INTO borrow 
            ( member_id, date_borrow, due_date) 
            VALUES
            ( '$member_id','$date_borrow','$due_date')";
    
    
        if ($conn->query($rentsql) === TRUE) { 
    
        echo header("Location: rentone.html");
    
        }
        else{
       
        echo '<script>alert("Form not submitted!");history.go(-1);</script>';  
        }


            }else{

                echo '<script>alert("Form not submitted! try again!");history.go(-1);</script>';
        
                }

    }   
 






//start for search book function

else if(isset($_POST['rentSubmit'])){ 
        $book_id = $_POST['book_id'];
        $borrow_id = $_POST['borrow_id'];
        $borrow_status = $_POST['borrow_status'];
   if(!empty($_POST['book_id'])){
        
        $borrowsql = 
        "INSERT INTO borrowdetails 
        ( book_id,borrow_id,borrow_status) 
        VALUES
        ( '$book_id','$borrow_id','$borrow_status')";


    if ($conn->query($borrowsql) === TRUE) { 

    echo '<script>alert("Form submitted successfully!");window.location.href = "rent.html";</script>';

    }
    else{
   
    echo '<script>alert("Form not submitted!");history.go(-1);</script>';  
    }


        }else{

        echo '<script>alert("Form not submitted!try again!");history.go(-1);</script>';

        }

}
$conn->close();

?>


    


    



    

   


    



