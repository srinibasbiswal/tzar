<?php

	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		include('../php/connect.php');
		
		$email=trim(mysqli_real_escape_string($conn,$_POST['email']));
		$password=trim(mysqli_real_escape_string($conn,md5($_POST['password'])));
		$query=$conn->query("SELECT email,password FROM trainuserprof WHERE email='$email' AND password='$password' ");
		$result = $query->num_rows;

		$data = $query->fetch_array();
		if($result==1)
		{	
			session_start();
			$_SESSION['u_id']=$data['id'];
			$_SESSION['u_fname']=$data['fname'];
			$_SESSION['u_lname']=$data['lname'];
			$_SESSION['u_fn']=$data['fn'];
			$_SESSION['u_mn']=$data['mn'];
			$_SESSION['u_gender']=$data['gender'];
			$_SESSION['u_dob']=$data['dob'];
			$_SESSION['u_email']=$data['email'];
			$_SESSION['u_contact']=$data['contact'];
			$_SESSION['u_altcontact']=$data['altcontact'];
			$_SESSION['u_address']=$data['address'];
			$_SESSION['u_pin']=$data['pin'];
			$_SESSION['u_id']=$data['identity'];
			$_SESSION['u_occupation']=$data['occupation'];
			$_SESSION['u_qualification']=$data['qualification'];
			$_SESSION['u_specialization']=$data['specialization'];
			$_SESSION['timestamp']=time();
			echo "string";
			echo $_SESSION['u_id'];
			echo $data['id'];
			#header('Location: ../profile/index');	
		}

		else
		{
			echo "Sorry, wrong credentials";
			exit();
		}
	}
	else
	{
		header("location:login.php");
	}
?>