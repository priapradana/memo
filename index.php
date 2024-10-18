<?php 
session_start();
if(isset($_SESSION['gagal_login'])){
	if($_SESSION['gagal_login']==1){
		echo "<script > alert('Username dan Password Salah!'); </script>";
	}
	$_SESSION['gagal_login'] = 0;
}
?>
<!-- <script >
     alert('Username dan Password harus di isi !');
     </script> -->
<!DOCTYPE html>
<html>

<head>	
	<title>Memu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<br/>
	<br/>
	<center><h2>MEMO</h2></center>	
	<br/>
	<div class="login">
	<br/>
		<form action="cek_user.php" method="post" onSubmit="return validasi()">
			<div>
				<label>Username:</label>
				<input type="text" name="username" id="username" />
			</div>
			<div>
				<label>Password:</label>
				<input type="password" name="password" id="password" />
			</div>			
			<div>
				<input type="submit" value="login" name="login" class="tombol">
			</div>
		</form>
	</div>
</body>

<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
				
		if (username != "" && password!="") {

			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	function gagal(){
		alert('Username atau password salah');
		}
	}

</script>
</html>