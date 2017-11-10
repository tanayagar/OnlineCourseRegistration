<?php
  session_start();
  $db=mysqli_connect('localhost','root','','courseReg') or die("Connection failed");
  if ($_SESSION["logged"]!=1)
    header("location: login.php?err=1");
?>
<html>
  <head>
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
      a{
        color:#fff;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <span id="heading">Courses</span>
    <?php
      $cred="select credits from student where regno='".$_SESSION["REG"]."';";
      $creds=mysqli_query($db,$cred);
      $result1=mysqli_fetch_array($creds);
      echo "<table id='det'>";
      echo "<tr> <td> <b>registration no:</b> ".$_SESSION["REG"]."</td></tr>";
      echo "<tr> <td> <b>credits:</b> ".$result1['credits']."</td></tr>";
      echo "</table>";
    ?>
    <fieldset>
    <form method="post" action="courses.php">
      <select name='filter'>
        <option  value="ALL">ALL</option>
        <option  value="SCSE">SCSE</option>
        <option  value="SAS">SAS</option>
        <option  value="SELECT">SELECT</option>
        <option  value="SSL">SSL</option>
        <option  value="VITBS">VITBS</option>
      </select>
      <input type="Submit" value='Filter'>
      <button type="submit"><a href="time.php">TimeTable</a></button>
    </form>
  </fieldset>
  <fieldset>
    <form method="get" action="register.php">
      <table>
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Credits</th>
          <th>School</th>
          <th>Prerequisites</th>
          <th>Course Type</th>
          <th></th>
        </tr>
        <?php
        $filter="";
        if(isset($_POST['filter']))
          $filter=$_POST['filter'];
        if($filter=="ALL" || !isset($_POST['filter']))
          $query="SELECT * FROM courses;";
        else
          $query="SELECT * FROM courses WHERE school='".$_POST['filter']."';";
        mysqli_query($db,$query);
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_array($result)){
          echo '<tr>';
          echo '<td>'.$row['code'].'</td>';
          echo '<td>'.$row['course_name'].'</td>';
          echo '<td>'.$row['credits'].'</td>';
          echo '<td>'.$row['school'].'</td>';
          echo '<td>'.$row['prereq'].'</td>';
          echo '<td>'.$row['type'].'</td>';
          echo "<td> <button type='submit' name='CourseName' value=".$row['code'].">Register</button></td>";
          echo '</tr>';
        }
        echo '</table>';
        mysqli_close($db);
        ?>
      </form>
    </fieldset>
    </body>
  </html>
