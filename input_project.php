<?php
	session_start();
	// echo "string";
include 'koneksi.php';

	// echo $save_w;

	if(isset($_POST['save'])){
		// echo "string"."<br>";
		// echo $_POST['owner']."<br>";
		// echo $_POST['name']."<br>";
		// echo $_POST['key']."<br>";
		// echo $_POST['description']."<br>";
		// echo $_POST['category_class']."<br>";
		$name = $_POST['name'];
		$key = $_POST['key'];
		$description = $_POST['description'];
		$category_class = $_POST['category_class'];
	 	$db = "INSERT INTO project VALUES(NULL,'$name','$key','$description','$category_class')";
		$save= mysqli_query($conn,$db);
		$_SESSION['save'] = $save;
		// if(isset($save)){
		// 	$_SESSION['save']= 1;
		// }else{
		// 	$_SESSION['save']= 2;
		// }
		header("location:project_admin.php");

	}
?>