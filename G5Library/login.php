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
    
        <div class="mainlogin">
			<section>
				<h2>Log In</h2>
				<form action="includes/logininc.php" method="post">
					<input type="text" name="uname" placeholder="Username"><br>
					<input type="password" name="pwd" placeholder="Password"><br><br>
					<button type="submit" name="submit">Log In</button>
				</form>
				<?php
					if(isset($_GET["error"]))
					{
						if($_GET["error"] == "emptyinput")
						{
							echo "<p>Fill in all fields!</p>";
						}
						else if($_GET["error"] == "wronglogin")
						{
							echo "<p>Wrong login credentials!</p>";
						}
					}
				?>
			</section>

        </div>
		
    </body>
</html>