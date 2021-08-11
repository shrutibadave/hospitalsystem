<?php
$server="localhost";
$username="root";
$password="";
$db="project";
$con=mysqli_connect($server,$username,$password,$db);
if($con)
{

  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $sos=$_POST['sos'];
  $phone=$_POST['phone'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $address=$_POST['address'];
  $age=$_POST['age'];
//  echo "Your appointment is Successfull";
if ($time>=10 && $time<=16)
 {
  $sql = "SELECT * FROM `pppd` WHERE sos='$sos' and date='$date'";
  //$sql1 = "SELECT * FROM `pppd` ";
  $result = mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);
  if($num<10)
  
  {
    $time=$_POST['time'];
    $sql = "INSERT INTO `project`.`pppd` ( `name`, `gender`,`sos`,`phone`,`date`,`time`,`address`,`age`) VALUES ( '$name', '$gender','$sos','$phone','$date','$time','$address','$age');";
    
    if($con->query($sql) == true)
    {
     //echo "data inserted Successfull";
    //  $insert=true;
 


    }
    else
    {
      echo "Error";
    }
  }
    else {

    //  echo "Kindly take appiontment on next day";
  //  echo `<script> alert("Booked Already. Book On Next Day!!");</script>`;
  ?>
  <script>
  alert("Appointment Not Available. Book On Next Day!!!!");
  window.location="app.html";
  </script>
  <?php
    }

  // code...
}
else {
  {
    //echo "enter time in between 10 to 4";
    ?>
    <script>
    alert("Kindly Enter Time Between 10 to 4");
    window.location="app.html";
    </script>
    <?php
  }
}
echo '
<html>
<img src="thankyou.jpg" style="margin-left:180px;" />

</html>
';





}
else {
  echo "not";
  // die("connection to database failed due to".mysqli_connect_error());
}

//$sql = "SELECT * FROM `pppd` WHERE sos='$sos' and date='$date'";
//$result = mysqli_query($con,$sql);
//$row1= mysqli_fetch_assoc($result);
//echo var_dump($row1);


//$sql = "SELECT *  FROM `pppd` WHERE sos='$sos'";
//$result = mysqli_query($con,$sql);







 ?>
