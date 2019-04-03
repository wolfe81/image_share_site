<?php
if(isset($_POST['submit']))
{
  include_once 'dbh.inc.php';
  $first = mysqli_real_escape_string($conn,$_POST['first']);
  $last = mysqli_real_escape_string($conn,$_POST['last']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $uid = mysqli_real_escape_string($conn,$_POST['uid']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
  if(empty($first) || empty($last) || empty($email) ||empty($uid) || empty($pwd))
  {
    header("Location: ../index.php?signup=error");
    exit();
  }
  else
  {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../index.php?signup=invalidemail");
		exit();
	}
	else
	{
		  if(!preg_match("/^[a-zA-z]*$/", $first) || !preg_match("/^[a-zA-z]*$/", $last))
		{
			header("Location: ../index.php?signup=char");
			exit();
		}
		 else
		{
      $sql = "SELECT * FROM users WHERE user_uid ='uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck > 0)
      {
          	header("Location: ../index.php?signup=usertaken");
            exit();
      }
      else {
          $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd)
    			VALUES (?, ?, ?, ?, ?);";

    			$stmt= mysqli_stmt_init($conn);
    			if(!mysqli_stmt_prepare($stmt, $sql))
    			{
    				echo "SQL Error";
    			}
    			else
    			{
    				mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $email, $uid, $hashedpwd);
    				mysqli_stmt_execute($stmt);
    			}
          header("Location: ../index.php?signup = sucess");
          exit();
      }
		}
	}
  }
}
else
{
  header("Location: ../index.php?signup=error");
}
