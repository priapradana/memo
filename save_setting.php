<?php
	session_start();
	echo "string";
	include 'koneksi.php';

	// echo $save_w;

	if(isset($_POST['save'])){
		// echo "string"."<br>";
		// // echo $_POST['owner']."<br>";
		// echo $_POST['name']."<br>";
		// echo $_POST['key']."<br>";
		// echo $_POST['description']."<br>";
		// echo $_POST['category_class']."<br>";
		$name = $_POST['name'];
		$keys = $_POST['key'];
		// echo $keys;
		$description = $_POST['description'];
		$category_class = $_POST['category_class'];
		$id_project = $_SESSION['var'];
	  	// $db = "UPDATE project SET name ='$name', key='$key', description = '$description', category_class = '$category_class' WHERE id = '$id_project'";
	  	$db = "UPDATE project SET name ='$name', k_ey='$keys', description = '$description', category_class = '$category_class' WHERE id='$id_project'";
		$save= mysqli_query($conn,$db);
		if(isset($save)){
			if($save==1){
				$_SESSION['save2']=1;
				header("location:project_admin.php");
			}else{
				$_SESSION['save2']=2;
				header("location:setting_project.php");
			}
		}
		// echo $save;

		

	}else
?>