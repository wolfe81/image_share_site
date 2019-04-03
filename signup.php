<?php
  include_once 'header.php'
 ?>

  <section class="main-container">
      <div class="main-wrapper">
        <h2>Sign Up</h2>
        <form class = "signup-form" action ="include/signup.inc.php" method="POST">
            <input type = 'text' name = 'first'> <br>
            <input type = 'text' name = 'last'> <br>
            <input type = 'text' name = 'email'> <br>
            <input type = 'text' name = 'uid'> <br>
            <input type = 'password' name = 'pwd'> <br>
            <button type = 'submit' name = 'submit'> Sign up!</button>
        </form>
      </div>
  </section>
<?php
  include_once 'footer.php'
 ?>
