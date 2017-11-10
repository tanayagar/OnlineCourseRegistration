<!DOCTYPE html>
<?php
  session_start();
  $_SESSION["logged"]=0;
  $_SESSION["REG"]="";
  $db=mysqli_connect('localhost','root','','courseReg');
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel=stylesheet type="text/css" href=style.css>
  </head>
  <body>
    <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $reg=$_POST['regno'];
        $pass=$_POST['passwd'];
        $query="select regno from student where regno='$reg' and pass='$pass';";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count!=1)
        {
          $error="wrong registration number \n or password";
        }
        else
        {
          $_SESSION["logged"]=1;
          $_SESSION["REG"]=$reg;
          header("location: courses.php");
        }
      }
     ?>
    <center>
    <form id="login" method="post" action="">
      <?php
        if (isset($_GET["err"])&&$_GET["err"]==1)
          echo "<p class='title'>Please Login</p>";
        else {
          echo "<p class='title'>Log in</p>";
        }
       ?>
      <input type="text" placeholder="Registration number" id='regno' name='regno' autofocus requried/>
      <input type="password" placeholder="Password" id='passwd' name='passwd' required/>
      <?php
        if(isset($error) && !empty($error))
        {
          echo "<p id='error'> $error </p>";
        }
        mysqli_close($db);
       ?>
      <button type="submit">
        Log In
      </button>
    </form>
  </center>

  </body>
</html>
