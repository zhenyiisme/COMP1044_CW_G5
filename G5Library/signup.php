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
                <h1>G5 Library Logs</h1>
                <nav>
                    <ul>
                        <li><a href="DatabaseCW.html"class="nav">Home</a></li>
                    </ul>
                </nav>			
            </div>
        </div>
        
        <div class="mainsignup">
		<section>
			<h2>Sign Up</h2>
			<form action="includes/signupinc.php" method="post">
				<input type="text" name="uname" placeholder="Username"><br>
				<input type="password" name="pwd" placeholder="Password"><br>
				<input type="text" name="fname" placeholder="Firstname"><br>
				<input type="text" name="lname" placeholder="Lastname"><br><br>
				<button type="submit" name="submit">Sign Up</button>
			</form>
			<?php
				if(isset($_GET["error"]))
				{
					if($_GET["error"] == "emptyinput")
					{
						echo "<p>Fill in all fields!</p>";
					}
					else if($_GET["error"] == "invldUname")
					{
						echo "<p>Username taken!</p>";
					}
					else if($_GET["error"] == "none")
					{
						echo "<p>You have signed up!</p>";
					}
				}
			?>
		</section>
        </div>

    </body>
</html>