<?php require("includes/connection.php") ?>
<html>
<head>
    <meta charset="UTF-8">
    
    <title>Covid Vaccine System</title>
	<body style='background-color: #ADD8E6'>
</head>


<?php
    function input_filter($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $SUCC = True;
    if(isset($_POST['Login'])){
        $AdminEmail=input_filter($_POST['AdminEmail']);
        $AdminPass=input_filter($_POST['AdminPass']);

        $query="SELECT * FROM `admin` WHERE `Email`=? AND `Password`=?";

        if($stmt=mysqli_prepare($connect,$query)){
            mysqli_stmt_bind_param($stmt, "ss", $AdminEmail,$AdminPass);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)==1){
               session_start();
               $_SESSION['AdminLoginId']=$AdminEmail;
               header("location: Admin_Panel.php");
            }
            else
            {
                $SUCC = False;
                echo"<script>alart('Invalid Admin Email or Password')</script>";
            }
            mysqli_stmt_close($stmt);
        }
        else{
            echo"<script>alart(\"SQL Query cannot be prepared\")</script>";
        }
    }

?>
<body>
	<?php include("includes/header.php"); ?>



	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form method="post">
					<?php
					
							?>
						<h3 class="text-center my-3">Admin Login</h3>
                        
						<label>Admin Email</label>
						<input type="text" name="AdminEmail" class="form-control my-2" placeholder="Enter Email" autocomplete="off">
                        

						<label>Password</label>
						<input type="password" name="AdminPass" class="form-control my-2" placeholder="Enter Password">

					</form>
                    <form action="Admin Panel.php" >
                    <input type="submit" name="login" class="btn btn-success" value="Login">
                    </form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>