<?php

$server="localhost";
$username="root";
$password="";
//$db="project";
$con=mysqli_connect($server,$username,$password);
if($con)
{

  $name=$_POST['name'];
  $email=$_POST['email'];
  $sos=$_POST['sos'];
  $phone=$_POST['phone'];
  $username=$_POST['username'];
  $password=$_POST['password'];

// echo "Your appointment is Successfull";
echo '
<html>
<img src="thankyoudr.jpg" style="margin-left:180px;" />

</html>
';

  $sql = "INSERT INTO `project`.`docinfo` ( `name`, `email`,`sos`,`phone`,`username`,`password`) VALUES ( '$name', '$email','$sos','$phone','$username','$password');";

  if($con->query($sql) == true)
  {
  // echo "data inserted Successfull";
  //  $insert=true;

  }
  else
  {
    echo "ERROR:";
  }

}
else {
  echo "not";
  // die("connection to database failed due to".mysqli_connect_error());
}

 ?>
