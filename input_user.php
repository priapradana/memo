<?php
	session_start();
	echo "string";
include 'koneksi.php';

	// echo $save_w;

	if(isset($_POST['save'])){
		echo "string"."<br>";
		// echo $_POST['owner']."<br>";
		echo $_POST['username']."<br>";
		echo $_POST['password']."<br>";
		echo md5($_POST['password'])."<br>";
		echo $_POST['category']."<br>";
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$category = $_POST['category'];
		// $description = $_POST['description'];
		// $category_class = $_POST['category_class'];
	  	$db = "INSERT INTO user VALUES(NULL,'$username','$password','$category')";
		$save= mysqli_query($conn,$db);
		// if(isset($save)){
		// 	$_SESSION['save2']= 1;
		// }else{
		// 	$_SESSION['save2']= 2;
		// }
		header("location:user_management.php");

	}
?>