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
        text-align: center;
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
      #det{
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.3);
        margin:5px;
        float: right;
      }
      td{
        padding: 5px;
      }
    </style>
  </head>
  <body>
    <span id="heading">My Courses</span>
    <?php
      $cred="select credits from student where regno='".$_SESSION["REG"]."';";
      $creds=mysqli_query($db,$cred);
      $result1=mysqli_fetch_array($creds);
      echo "<table id='det'>";
      echo "<tr> <td> <b>registration no:</b> ".$_SESSION["REG"]."</td></tr>";
      echo "<tr> <td> <b>credits:</b> ".$result1['credits']."</td></tr>";
      echo "</table><br/>";
    ?>
    <form method="get" action="register.php">
      <table>
        <tr>
          <th>Course Code</th>
          <th>Course Name</th>
          <th>Credits</th>
          <th>School</th>
          <th>Prerequisites</th>
          <th>Course Type</th>
          <th>Faculty</th>
          <th>Theory Slots</th>
          <th>Lab Slots</th>
        </tr>
        <?php
          $query="SELECT * FROM student where regno='".$_SESSION["REG"]."';";
          mysqli_query($db,$query);
          $result=mysqli_query($db,$query);
          $result=mysqli_fetch_array($result);
          $result=$result['class'];
          $result=explode("+",$result);

          foreach($result as $myclass){
            $myclass=(int)$myclass;
            $query="SELECT * from courses, classes where classes.code=courses.code and classes.classno=$myclass;";
            $result=mysqli_query($db,$query);
          while($row=mysqli_fetch_array($result)){
          echo '<tr>';
          echo '<td>'.$row['code'].'</td>';
          echo '<td>'.$row['course_name'].'</td>';
          echo '<td>'.$row['credits'].'</td>';
          echo '<td>'.$row['school'].'</td>';
          echo '<td>'.$row['prereq'].'</td>';
          echo '<td>'.$row['type'].'</td>';
          echo '<td>'.$row['faculty'].'</td>';
          echo '<td>'.$row['Tslot'].'</td>';
          echo '<td>'.$row['Lslot'].'</td>';
          echo '</tr>';
        }
      }
        echo '</table>';
        ?>
      </form>
    <hr/>
    <form action="courses.php">
      <button type="submit">Go Back</button>
    </form>
    <hr/><br>
    <?php
    $query="select * from student where regno='".$_SESSION["REG"]."';";
          mysqli_query($db,$query);
          $res=mysqli_query($db,$query);
          $row=mysqli_fetch_array($res);
          $row=$row['class'];
          $row=explode("+",$row);
    ?>
    <table>
      <tr>
        <th> Theory Hours </th>
        <th>08:00 AM<br> to<br> 08:50 AM</th>
        <th>09:00 AM <br>to <br>09:50 AM</th>
        <th>10:00 Am <br>to<br> 10:50 AM</th>
        <th>11:00 AM <br>to <br>11:50 AM</th>
        <th>12:00 PM <br>to<br> 12:50 AM</th>
        <th></th>
        <th rowspan="9">L<br>U<br>N<br>C<br>H</th>
        <th>02:00 PM <br>to<br> 02:50 PM</th>
        <th>03:00 PM <br>to<br> 03:50 PM</th>
        <th>04:00 PM <br>to<br> 04:50 PM</th>
        <th>05:00 PM <br>to<br> 05:50 PM</th>
        <th>06:00 PM <br>to<br> 06:50 PM</th>
        <th>                    </th>
      </tr>
      <tr>
        <th> Lab Hours </th>
        <th>08:00 AM <br>to<br> 08:50 AM</th>
        <th>08:50 AM <br>to<br> 09:40 AM</th>
        <th>10:00 AM <br>to<br> 10:50 AM</th>
        <th>10:50 AM <br>to<br> 11:40 AM</th>
        <th>12:00 AM <br>to<br> 12:50 AM</th>
        <th>12:50 AM <br>to<br> 01:30 AM</th>
        <th>02:00 AM <br>to<br> 02:50 AM</th>
        <th>02:50 AM <br>to <br>03:40 AM</th>
        <th>04:00 AM <br>to<br> 04:50 AM</th>
        <th>04:50 AM <br>to<br> 05:40 AM</th>
        <th>05:50 AM <br>to<br> 06:40 AM</th>
        <th>06:40 AM <br>to <br>07:30 AM</th>
      </tr>
      <tr>
        <th> MON </th>
        <td class="A1" name="L1"></td>
        <td class="F1" name="L1"></td>
        <td class="D1" name="L3"></td>
        <td class="TB1" name="L3"></td>
        <td class="TG1" name="L5"></td>
        <td name="L5"></td>
        <td class="A2" name="L31"></td>
        <td class="F2" name="L31"></td>
        <td class="D2" name="L33"></td>
        <td class="TB2" name="L33"></td>
        <td class="TG2" name="L35"></td>
        <td name="L35"></td>
      </tr>
      <tr>
        <th> TUE </th>
        <td class="B1" name="L7"></td>
        <td class="G1" name="L7"></td>
        <td class="E1" name="L9"></td>
        <td class="TC1" name="L9"></td>
        <td class="TAA1" name="L11"></td>
        <td name="L11"></td>
        <td class="B2" name="L37"></td>
        <td class="G2" name="L37"></td>
        <td class="E2" name="L39"></td>
        <td class="TC2" name="L41"></td>
        <td class="TAA2" name="L41"></td>
        <td name="L41"></td>
      </tr>
      <tr>
        <th> WED </th>
        <td class="C1" name="L13"></td>
        <td class="A1" name="L13"></td>
        <td class="F1"></td>
        <td colspan="3">Extramural Hour</td>
        <td class="C2" name="L43"></td>
        <td class="A2" name="L43"></td>
        <td class="F2" name="L45"></td>
        <td class="TD2" name="L45"></td>
        <td class="TBB2" name="L47"></td>
        <td name="L47"></td>
      </tr>
      <tr>
        <th> THU </th>
        <td class="D1" name="L19"></td>
        <td class="B1" name="L29"></td>
        <td class="G1" name="L21"></td>
        <td class="TE1" name="L21"></td>
        <td class="TCC1" name="L23"></td>
        <td name="L23"></td>
        <td class="D2" name="L49"></td>
        <td class="B2" name="L49"></td>
        <td class="G2" name="L51"></td>
        <td class="TE2" name="L51"></td>
        <td class="TCC2" name="L53"></td>
        <td name="L53"></td>
      </tr>
      <tr>
        <th> FRI </th>
        <td class="E1" name="L25"></td>
        <td class="C1" name="L25"></td>
        <td class="TA1" name="L27"></td>
        <td class="TF1" name="L27"></td>
        <td class="TD1" name="L29"></td>
        <td name="L29"></td>
        <td class="E2" name="L55"></td>
        <td class="C2" name="L55"></td>
        <td class="TA2" name="L57"></td>
        <td class="TF2" name="L57"></td>
        <td class="TDD2" name="L59"></td>
        <td name="L59"></td>
      </tr>
      <tr>
        <th> SAT </th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th> SUN </th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <?php
      // echo $_SESSION["REG"];
      $query1="select class from student where regno='".$_SESSION["REG"]."';";
      $result1=mysqli_query($db,$query1);
      $classes=mysqli_fetch_array($result1);
      $classes=explode("+",$classes['class']);
      foreach($classes as $classno)
      {
        // echo "<br>".$classno;
        $classno=(int)$classno;
        $query2="select code,Tslot,Lslot from classes where classno=$classno;";
        $result2=mysqli_query($db,$query2) or die('error in query');
        $row=mysqli_fetch_array($result2);
        // echo $row['code'].$row['Tslot'];
        $Lslot=explode("+",$row['Lslot']);
        echo "
          <script>
            var x=document.getElementsByClassName('".$row['Tslot']."')
            for (var i=0;i<x.length;i++){
              x[i].innerHTML='".$row['code']."<br/>".$row['Tslot']."';
              x[i].style.backgroundColor= '#c8bcac';
            }
          </script>
        ";
        foreach($Lslot as $lab)
        {
          echo "
            <script>
              var x=document.getElementsByName('".$lab."')
              x[0].innerHTML='".$row['code']."<br/>".$lab."';
              x[1].innerHTML='".$row['code']."<br/>".$lab."';
              x[0].style.backgroundColor= '#FEFBF7';
              x[1].style.backgroundColor= '#FEFBF7';
            </script>
          ";
        }
      }
      mysqli_close($db);
     ?>
     </table>
    </body>
  </html>
