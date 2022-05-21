<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agent Page</title>
</head>
<body>

	<?php include("includes/header.php"); ?>
	
	<h2>Vaccination Details of Users</h2>
		<table border="2">
		<tr>
			<td>username</td>
			<td>no_of_doses</td>
			<td>first_dose_date</td>
			<td>second_dose_date</td>
			<td>vaccine_name</td>
			<td>Edit</td>
		</tr>

		<?php
		include("includes/connection.php");
		$records = mysqli_query($connect,"select * from vaccinated"); // fetch data from database

		while($data = mysqli_fetch_array($records))
		{
		?>
		<tr>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['no_of_doses']; ?></td>
			<td><?php echo $data['first_dose_date']; ?></td>
			<td><?php echo $data['second_dose_date']; ?></td> 
			<td><?php echo $data['vaccine_name']; ?></td> 
			<td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
		</tr>	
		<?php
}
?>
</table>

</body>
</html>