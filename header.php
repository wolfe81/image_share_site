<?php
		session_start();
 ?>
<!DOCTYPE html>
<html>

<head>
		<title>Home</title>
    <link rel = "stylesheet" type="text/css" href = "style.css">
</head>

<body>
  <header>
      <nav>
          <div class="main-wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                </ul>
								<div class="nav-login">

								<?php
								if(isset($_SESSION['u_id']))
								{
									echo'<form action="include/logout.inc.php" method="POST">
														<button type="submit" name="submit">Log Out</button>
											</form>';
								}
								else
								{
									echo '<form action="include/login.inc.php" method="POST">
									       		<input type="text" name="uid" placeholder="Username or Email">
									       		<input type="password" name="pwd" placeholder="Password">
									       		<button type="submit" name="submit">Log In</button>
									 			</form>
									<a href="signup.php"> Sign Up </a>';
								}
								?>
							</div>
          </div>

      </nav>
  </header>
