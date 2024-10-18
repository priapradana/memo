<?php
echo "string";
if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']=="user") {
	header("location:index.php");
}
session_start();
echo "string";
include 'koneksi.php';

if(isset($_POST['save'])){
	// echo "string"."<br>";
	// // echo $_POST['owner']."<br>";
	// echo $_SESSION['id'].'<br>';
	// echo $_POST['name']."<br>";
	// echo $_POST['message']."<br>";
	// echo $_POST['category_class']."<br>";
	// echo $_SESSION['var'];

	$id_user = $_SESSION['id'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$category_class = $_POST['category_class'];
	$id_project = $_SESSION['var'];
	// $_SESSION['save'] = 1;

 	$db = "INSERT INTO document VALUES(NULL,'$id_project','$name','$message','$category_class','$id_user')";
	$save= mysqli_query($conn,$db);

	if($_SESSION['hak_akses']=="admin"){
		header("location:project_detail_admin.php");
	}elseif ($_SESSION['hak_akses']=="author") {
		header("location:project_detail_author.php");
	}
	

	}
?>