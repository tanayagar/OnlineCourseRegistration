<?php
  session_start();
  $db=mysqli_connect('localhost','root','','courseReg') or die('Connection failed');
  if ($_SESSION["logged"]!=1)
    header("location: login.php?err=1");
  $_SESSION["CODE"]='';
?>
<!DOCTYPE html>
<html>
  <body>
  <style>
    *{
      margin:4px;
    }
    body{
      font-family:sans-serif;
      background-color: #faebd7;
    }
    table{
      border-collapse: collapse;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);

    }
    tr,td,th{
      border-style:solid;
      border-width: thin;
    }
    #heading{
      font-weight: bolder;
      font-size: 27px;
    }
    input, button{
      background: #2196F3;
      border: none;
      left: 0;
      color: #fff;
      bottom: 0;
      border: 0px solid rgba(0, 0, 0, 0.1);
      border-radius:5px;
      transform: rotateZ(0deg);
      transition: all 0.1s ease-out;
    }
    fieldset{
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
      margin:10px;
    }
    #det{
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
      margin:0px;
      float: right;
    }
    td{
      padding: 5px;
    }
  </style>
  <span id="heading">Registration</span>
  <?php
    $cred="select credits from student where regno='".$_SESSION["REG"]."';";
    $creds=mysqli_query($db,$cred);
    $result1=mysqli_fetch_array($creds);
    echo "<table id='det'>";
    echo "<tr> <td> <b>registration no:</b> ".$_SESSION["REG"]."</td></tr>";
    echo "<tr> <td> <b>credits:</b> ".$result1['credits']."</td></tr>";
    echo "</table>";
  ?>
    <form method='get'action='reg.php'>
      <table>
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Faculty</th>
          <th>Theory Slots</th>
          <th>Lab Slots</th>
        </tr>
      <?php
      $cno=$_GET['CourseName'];
      $query="SELECT * from classes,courses WHERE classes.code='$cno' AND classes.code=courses.code;";
      $result=mysqli_query($db,$query);
      while($row=mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row['code'].'</td>';
        echo '<td>'.$row['course_name'].'</td>';
        echo '<td>'.$row['faculty'].'</td>';
        echo '<td>'.$row['Tslot'].'</td>';
        echo '<td>'.$row['Lslot'].'</td>';
        echo '<td> <button type=submit name="ClassNo" value='.$row['classno'].'>Register</button></td>';
        echo '</tr>';
        $_SESSION["CODE"]=$row['code'];
      }
      echo "</table>";
    ?>
    </form>

    <form action="courses.php">
      <button type="submit" name="button">Go Back</button>
    </form>
  <?php
    mysqli_close($db);
   ?>
  </body>
</html>
