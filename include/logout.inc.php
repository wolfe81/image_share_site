<?php

if(isset($_POST['sumbit']))
{
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.php?logout=success");
  exit();
}
