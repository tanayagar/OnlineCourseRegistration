<!DOCTYPE html>
<?php
  session_start();
  if ($_SESSION["logged"]!=1)
    header("location: login.php?err=1");
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registered</title>
    <style>
      *{
        margin:4px;
      }
      body{
        font-family:sans-serif;
        background-color: #faebd7;
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
      </style>
  </head>
  <body>
    <?php
      $db=mysqli_connect('localhost','root','','courseReg');
      $classno=$_GET['ClassNo'];
      $update="update student set class=concat(class,concat($classno,'+')) where regno='".$_SESSION["REG"]."';";// Adding new course to the student db

      $query="update student,courses,classes set student.credits=student.credits+courses.credits ,
       nos=nos+1 where regno='".$_SESSION["REG"]."' and courses.code=classes.code and classes.classno=".$_GET['ClassNo'].";"; // Updating the credits

      $fetch="select class from student where regno='".$_SESSION["REG"]."';"; //
      $result = mysqli_query($db,$fetch) or die("Could not find record"); //
      while($row=mysqli_fetch_array($result))//
          $temp=$row['class'];// Getting the already registered courses

      $name=explode("+",$temp);// Making an array out of it

      $Err=0;//
      //CHECKING IF SAME COURSE IS REGISTERED TWICE
      foreach ($name as $var){//
          $var=(int)$var;//
        $tQuery="SELECT * from courses,classes where classes.classno=".$var." and  courses.code=classes.code;";//

        $tRes=mysqli_query($db,$tQuery) or die("Could not find record");// Finding if a class from the same course exists
        $Code='';//
        while($row=mysqli_fetch_array($tRes)){//
          $Code=$row['code'];//
        }//
        if ($_SESSION["CODE"]==$Code){//
          echo "Already Registered for ".$Code;//
          $Err=1;//
        }//
      }//

      // CHECKING WHETHER SLOTS CLASH
      $Slot_Array=[]; $i=0;
      foreach ($name as $var){
        $var=(int)$var;
        $cQuery="SELECT * from classes,courses where classes.classno=".$var." and courses.code=classes.code;";
        $cRes=mysqli_query($db,$cQuery) or die("Could not find the record");
        while($row=mysqli_fetch_array($cRes)){
          $Slot_Array[$i++]=$row['Tslot'];
          $temprow=explode("+", $row['Lslot']);
          foreach($temprow as $Lval){
          $Slot_Array[$i++]=$Lval; // Stored all used slots in this array
          }
        }
      }

      $newSlots=[];
      $cQuery="SELECT * from classes,courses where classes.classno=".$classno." and courses.code=classes.code;";
      $cRes=mysqli_query($db,$cQuery) or die("Could not find the record");
      $i=1;
      while($row=mysqli_fetch_array($cRes)){
        $newSlots[0]=$row['Tslot'];
        $temprow=explode("+",$row['Lslot']);
        foreach($temprow as $Lval)
          $newSlots[$i++]=$Lval; // Getting the new slots here
      }

      // foreach ($newSlots as $NEW){
      //   foreach ($Slot_Array as $OLD){
      //     if ($NEW!='NULL' && $OLD!='NULL' & $NEW==$OLD){
      //       echo "New Course Clashing with ".$OLD; // theory=theory? OR lab=lab?
      //       $Err=1;
      //     }
      //   }
      // }

      $lab=[];//array of all the clashes
      $i=0;
      $sQuery="SELECT * from slots";
      $sRes=mysqli_query($db,$sQuery);
      while($row=mysqli_fetch_array($sRes)){
        $tempLab=explode("+", $row['lab']);
        $lab[$row['theory']]=$tempLab;//theory->key , lab->value
      }
      //array of clashing theory and lab slots that are already registered
      $existing_slots=[];
      foreach($Slot_Array as $OLD){
        foreach($lab as $theory=>$LABS){
          if($OLD == $LABS[0])
          {
            $existing_slots[$theory]=[$LABS[0],"N"];
          }
          if($OLD == $LABS[1])
          {
            $existing_slots[$theory]=["N",$LABS[1]];
          }
          if($OLD ==$theory)
          {
            $existing_slots[$theory]=["N","N"];
          }
        }
      }
      //
      // foreach($existing_slots as $THEORY=>$LAB)
      // {
      //   foreach($newSlots as $NEW)
      //   {
      //     echo "<br>".$THEORY."--".$LAB[0]."  ".$LAB[1]."<br>";
      //   }
      // }
      // foreach($newSlots as $NEW)
      // {
      //   echo "<br>".$NEW;
      // }
      //

      foreach($existing_slots as $THEORY=>$LAB)
      {
        foreach($newSlots as $NEW)
        {
          if($NEW == $THEORY || $NEW == $LAB[0] || $NEW == $LAB[1])
          {
            $Err=1;
            echo "<br>".$THEORY ." ". $LAB[0] ." ". $LAB[1]." Clashing with $NEW ";
            break;
          }
        }
      }
       // foreach ($Th as $theory=>$lab){
      //    if($newSlots in $th[$Slot_Array])
      //    {
       //     $Err=1;
       //   }
      //}

      if($Err==0&&mysqli_query($db,$query))//
      {
        if(mysqli_query($db,$update))
         echo "<h3>you have been registered</h3>";
      }
      else
      {
        echo "<h3>Error in registering</h3>";
      }
      mysqli_close($db);
     ?>
     <form action="courses.php" method="post">
       <button action='courses.php'>Go Back</button>
     </form>
  </body>
</html>
