<?php
session_start();
// Create connection
include 'koneksi.php';

$user=mysqli_query($conn,"select * from user");

// foreach($user as $row){
// 	// echo $row['nama'] ;
	
// 	echo $row['username'].' ';
// 	echo $row['password'].'<br>';
// 	$username_db = $row['username'];
// 	$password_db = $row['password'];
// }
// echo $_POST['username']." ";
// echo md5($_POST['password']).'<br>';
$username = $_POST['username'];
$password = md5($_POST['password']);
// echo $_POST['Login'];

// echo isset($_POST['username'])." ";
// echo isset($_POST['login'])."ster";
if(isset($_POST['login'])){
	foreach ($user as $row) {
		if($username==$row['username'] and $password==$row['password']){
			// echo " ".$row['hak_akses'];
			$hak_akses=$row['category'];
			$id= $row['id'];
		}
	}
	if(isset($hak_akses)){
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $id;
		$_SESSION['hak_akses'] = $hak_akses;

		if($hak_akses=="admin"){
			header("location:home.php");
		}
		elseif ($hak_akses=="author") {
			header("location:home_author.php");
		}
		elseif ($hak_akses == "user"){
			header("location:home_user.php");
		}else{
			header("location:index.php");
		}
	}else{
		$_SESSION['gagal_login'] = 1;
		header("location:index.php");
	}
	// if($username==$username_db and $password==$password_db){
	// 	echo "akun benar";
	// }
} 

 
// include 'config.php';

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }else{
// 	echo "string";
// }
?>