<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Page</title>
</head>
<body>
	<?php $uname =  $_SESSION['user'] ; ?>
	<?php include("includes/header.php"); ?>
	
	<h2>Your Details</h2>
		<table border="2">
		<tr>
			<td>nid</td>
			<td>name</td>
			<td>gender</td>
			<td>hadcovid</td>
		</tr>
		
		<?php
		include("includes/connection.php");
		$sql = "select * from user ";
		// $records = mysqli_query($connect,"select * from user where Unq_username = $uname"); 
		$records = mysqli_query($connect, $sql) or die( mysqli_error($connect));// fetch data from database
		while($data = mysqli_fetch_array($records))
		{
		?>
		<tr>
			<td><?php echo $data['nid']; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['gender']; ?></td>
			<td><?php echo $data['hadcovid']; ?></td> 
		</tr>	
		<?php
}
?>
		</table>



		
</body>
</html>