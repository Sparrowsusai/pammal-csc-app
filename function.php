<?php
$databseconnection=mysqli_connect("localhost","sparrow","","csc");
$user_id=isset($_GET['user_id'])?$_GET['user_id']:'';
$user_name=isset($_GET['username'])?$_GET['username']:'';
$contact=isset($_GET['contact'])?$_GET['contact']:'';
$password=isset($_GET['password'])?$_GET['password']:'';
$confirm_password=isset($_GET['confirmpassword'])?$_GET['confirmpassword']:'';
$mail=isset($_GET['email'])?$_GET['email']:'';
$category=isset($_GET['category'])?'updated	':'Not_updated';
$submit=$_GET['sub'];

if ($submit=='login') 
{
	

	$table_query_login="select id,cryptpassword from register where id=".$user_id." and cryptpassword='".$password."'";
	$table_login_con=mysqli_query($databseconnection,$table_query_login);
	if (mysqli_num_rows($table_login_con)==1) 
	{
		// echo $table_query_login;
		header("location:susai.php");
	}

	else
	{
		
		echo "<script>
				alert('username and password is incorrect ');
				location.replace('login.php');
			  </script>	
				";
	}

}
else if($submit=='Register')
{
	if ($password==$confirm_password)
	{
		$table_query_register="INSERT into `register` (`usersname`,`phone`,`cryptpassword`,`encryptpassword`,`mailid`,`categories`,`del`) VALUES ('$user_name',$contact,'$password',md5('$confirm_password'),'$mail','$category',1)";
		$table_register_con=mysqli_query($databseconnection,$table_query_register);

		if ($table_register_con==1)
		{
			
			header("location:login.php");
		}

		else
		{
			echo "<script>
					alert('error in fetching the database');
					location.replace('register.php');
				  </script>
				";
		}	
	}
	else
	{
		echo "<script>
				alert('password and confirm confirm password are not same');
				location.replace('register.php');
			  </script>";
	}
}

else
{
	echo "entered wrong";
}

?>