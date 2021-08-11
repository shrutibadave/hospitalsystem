<?php

$server="localhost";
$username="root";
$password="";
$db="project";
$con=mysqli_connect($server,$username,$password,$db);
if($con)
{


  $username=$_POST['username'];
  $password=$_POST['password'];

 //echo "Your appointment is Successfull";

   $sql = "SELECT * FROM `docinfo`WHERE (email='$username' or username='$username'  )or (password='$password')";
   $result = mysqli_query($con,$sql);
   $num = mysqli_num_rows($result);
//  $sql = "INSERT INTO `project`.`docinfo` ( `name`, `email`,`sos`,`phone`,`username`,`password`) VALUES ( '$name', '$email','$sos','$phone','$username','$password');";

if($num>0)
{
  $row1= mysqli_fetch_assoc($result);
 //echo var_dump($row1);
//echo $username.$row1['email'];

if($username==$row1['username']||$username==$row1['email'])
{

  if($password==$row1['password'])
  {
  //  echo "login";
    $dept=$row1['sos'];
 //echo $dept;
    $query="SELECT * FROM `pppd` WHERE sos='$dept'";
$result1=mysqli_query($con,$query);
$r=mysqli_num_rows($result1);
$rows=mysqli_fetch_assoc($result1)
//echo $r;

?>
    <html>
	<head>
		<title> Fetch Data From Database </title>
	</head>
	<body>
	<table align="center" border="1px" style="width:1000px; line-height:40px;">
	<tr>
		<th colspan="7"><h2>Appointment Table</h2></th>
		</tr>
			  <th style="width:50px;"> Sr.no </th>
			  <th style="width:400px;"> Name </th>
			  <th style="width:100px;"> Gender </th>
			  <th> Phone </th>
        <th style="width:125px;"> Date </th>
        <th> Time </th>
        <th> Age </th>

		</tr>




		<?php 
    
     mysqli_data_seek($result1,0);
    
    while($rows=mysqli_fetch_assoc($result1))
		{
     
		?>
		<tr> <td><?php echo $rows['sr.no']; ?></td>
		<td><?php echo $rows['name']; ?></td>
		<td><?php echo $rows['gender']; ?></td>
		<td><?php echo $rows['phone']; ?></td>
    <td><?php echo $rows['date']; ?></td>
    <td><?php echo $rows['time']; ?></td>
    <td><?php echo $rows['age']; ?></td>



		</tr>
	<?php
               }
          ?>

	</table>
	</body>
	</html>


<?php

}

  else
    // code...
   {
    //echo "wrong password";
    ?>
    
    <script>alert("wrong password");
   window.location="login.html";
    </script>
  <?php
  }

  //echo "user match";
}
else {
  //echo "wrong username";
  ?>
    
  <script>alert("wrong username")
   window.location="login.html"</script>
<?php
}
}

}
else {
  echo "not";
  // die("connection to database failed due to".mysqli_connect_error());
}




 ?>