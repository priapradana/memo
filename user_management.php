<?php
session_start();

include 'koneksi.php';

if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']!="admin") {
	header("location:index.php");
}
?>

<style>
	/*untuk ubah bentuk radio box*/
input[type="radio"] {
  -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
  -moz-appearance: checkbox;    /* Firefox */
  -ms-appearance: checkbox;     /* not currently supported */
}
/*body {font-family: Arial, Helvetica, sans-serif;}*/
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  /*border: none;*/
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 1px solid #C0C0C0;;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  /*max-width: 300px;*/
  padding: 10px;
  background-color: white;
  
}

/* Full-width input fields */
/*.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}*/

/* When the inputs get focus, do something */
/*.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}*/

/* Set a style for the submit/login button */
/*.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}*/

/* Add a red background color to the cancel button */
/*.form-container .cancel {
  background-color: red;*/
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;

}
 /*buat paging*/
 .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

</style>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		  <!-- boostrap -->
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">

		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	</head>

	<body class="">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="img/logo-blacknwhite.png" alt="SmartAdmin"> </span>
			</div>

				

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<!-- <img src="img/avatars/sunny.png" alt="me" class="online" />  -->
						<span>
							<?php echo $_SESSION['hak_akses']; ?> 
						</span>
						<!-- <i class="fa fa-angle-down"></i> -->
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li class="top-menu-invisible">
						<a href="home.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Document</span></a>
	
					</li>
					<li class="top-menu-invisible">
						<a href="project_admin.php"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Project</span></a>

					</li>
					
				</ul>
				<img src="img/logout.png" style="position: absolute;bottom: 6px; left: 9px;">

				<button onclick="myFunction2()"style="position: absolute;left: 30px; bottom: 0px; height: 34px; color: white; background-color: transparent; border-color: transparent; opacity: 0.7;">Logout</button>

				<div class="container mt-3" style=" position: absolute;bottom: 36px;width: 100%;">

				  <img src="img/user.png" style="position: absolute;bottom: 5px; left: 10px;">
				  <button onclick=""style="position: absolute;left: 30px; bottom: 0px; height: 30px; color: white; background-color: transparent; border-color: transparent;">User Management</button>

				  <!-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style=" background-color: transparent; margin-left :14px;border-color: transparent; ">
				      User Management
				    </button> -->

				  <!-- <div class="dropdown">
				    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style=" background-color: transparent; margin-left :14px;border-color: transparent; ">
				      User Management
				    </button>
				    <div class="dropdown-menu" >
				      <a class="dropdown-item" onclick="myFunction()"href="#">Create a Project</a>
				      <a class="dropdown-item" href="#">Link 2</a>
				      <a class="dropdown-item" href="#">Link 3</a>
				    </div>
				  </div>
				</div>
 -->
				<!-- <div class="form-popup" id="myForm">
				  <form action="input_project.php" method="POST" class="form-container">
				    <h1>Create a Project</h1>

				    <label for="owner"><b>Owner</b></label>
				    <input type="text" placeholder="Enter Owner" name="owner" disabled value="<?php echo $_SESSION['hak_akses']; ?>">

				    <label for="name"><b>Project Name</b></label>
				    <input type="text" placeholder="Enter Project Name" name="name" required>

				    <label for="key"><b>Key</b></label>
				    <input type="text" placeholder="Enter Key" name="key" required>

				    <label for="description"><b>Description</b></label>
				    <input type="text" placeholder="Description" name="description" required>
				    <br>
				    <input type="radio" name="category_class" value="private" required>Private
				    <input type="radio" name="category_class" value="public" required>Public <br>

				    <button type="submit" class="btn" name="save" value="save">Save</button>
				    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
				  </form>-->
				</div> 

		<script>
			$(document).ready(function(){
			  $(".dropdown-toggle").dropdown();
			});
			function openForm() {
  				document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
			  document.getElementById("myForm").style.display = "none";
			}
		</script>
			</nav>
		
			

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">
			<!-- RIBBON -->
			
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><img src="img/user2.png"style="margin-right: 6px; margin-bottom: 3px;">User Management</h1>
					</div>
					
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row" style="">
						<article class="col-sm-12">
							<!-- new widget -->
							<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									 
									<h2>Users</h2>
								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									
									<!-- end widget edit box -->

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
										<style>
											table td,th {
    										padding: 5px;
    										font-size: 14px;
											}
											label {
												font-size: 14px;
											}
										</style>
										<table border="1" cellpadding="" style="margin: 2px;">
										    <tr>
										    	<th>NO</th>
												<th>ID</th>
												<th>USERNAME</th>
												<th>CATEGORY</th>
												<th>ACTION</th>
										    </tr>
										    <?php
										     
											// $upload=mysqli_query($conn,"select * from user");
											  $halaman = 10;
											  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
											  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
											  $result = mysqli_query($conn,"SELECT * FROM user");
											  $total = mysqli_num_rows($result);
											  $pages = ceil($total/$halaman);            
											  $result2 = mysqli_query($conn,"SELECT * FROM user LIMIT $mulai, $halaman");
											  $no =$mulai+1;
											$none = 'none';
											foreach ($result2 as $row) {
											
											?>
										    <tr>
										    	<td style="width: 7%"><?php echo $no++;?></td>
										    	<!-- <td><?php echo "s"; ?></td> -->
										        <td style="width: 7%;"><?php echo $row['id']; ?></td>
												<td style="width: 10%;"><?php echo $row['username'];?></a></td>
												<td style="text-align: justify; width: 10%;"><?php echo $row['category'];?></td>
												<td style="width: 10%;"><a href="delete.php?var=<?php echo $row['id'];?>" style="color:black;"><button style="float: right;" <?php if($row['category']=='admin'){echo 'hidden';}?> >Delete</button></a></td>
										    </tr>
											<?php }?>
										</table>
										<div class="pagination" style="padding-left: 5px;">

										  <?php
										    if(isset($_GET['halaman'])==false){
										    $_GET['halaman']=1;
										  }
										  $max_page = $pages;
										  if($pages>10){
										 //  	if(isset($_POST['nex'])){
											//   	echo "string";
											//   	$pages = 20;
											//   	$i = $pages - 9;
											// }
										  	if (isset($_GET['halaman'])){
										 		$co = $_GET['halaman'] - $_GET['halaman']%10;
										 		if($_GET['halaman']%10==0){
										 			$co = $_GET['halaman']-10;
										 		}
										 		// echo "co".$co;
										 		$i = $co +1 ;

										  		$pages = $i+9;
										  		if($pages>$max_page){
										  			$pages = $max_page;
										  		}
										  		// echo "page".$page;
										  	}else{
											  	$pages = 10;
											  	$i = $pages - 9;
										  	}
										  }else{
										  	$i=1;
										  }?>
										  <?php if($pages>10){?>
										  		<a class=""href="?halaman=<?php echo ($pages-19); ?>">previous</a>
										  <?php }?>
										<?php
										   for ($i; $i<=$pages ; $i++){
										      $active = ""; 
										      if(isset($_GET['halaman']) and $_GET['halaman']==$i){
										        $active = "active";
										      }
										    ?>
										    <?php if (isset($_GET['search']) and $max_page>1){	?>		
										    <a class="<?php echo$active; ?>"href="?halaman=<?php echo $i; ?>&search=<?php echo $_GET['search']?>"><?php echo $i; ?></a>
										   	<?php }elseif($max_page>1){ ?>
										   
										    <a class="<?php echo $active; ?>"href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
										   	<?php } ?>
										  <?php } ?>
										  <?php if($max_page>10 and $pages<$max_page){?>
										  		<a class=""href="?halaman=<?php echo ($pages+1); ?>">next</a>
										  <?php }?>
										<!--   <form method="post">
										  <button name="nex" type="submit"> Next</button>
										  	</form> -->
										  	<?php 
										  	
											  ?>
										</div>
										<!-- <img  style="position: absolute; left: 9px; background-color: black;" src="img/plus.png">
										<div style=" background-color: blue;">ccccccccccccc</div>	
										
										<?php 
										$upload=mysqli_query($conn,"select * from upload");
										$user=mysqli_query($conn,"select * from update");
										foreach ($upload as $row) {
										?>
										<img  style="margin-top: 4px; position: absolute; margin-left: 9px; background-color: black;" src="img/plus.png">
										<div style="margin-left: 40px; background-color: blue;"><?php echo $row['nama_file']; ?></div>
										<?php }?> -->
										</div>

										<!-- end content -->
									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article>
					</div>
				</section>
				<button onclick="openForm()" style="float: right;">Add Users</button>

				<div class="form-popup" id="myForm">
				  <form action="input_user.php" method="POST" class="form-container">
				    <h1 style="">Add Users</h1>
				    <table >
				    	<tr>
						    <td style="padding: 0px;"><label for="username"><b>Username</b></label></td>
						    <td><input type="text" placeholder="Enter username" name="username" required=""></td>
						</tr>
						<tr>
						    <td style="padding: 0px;"><label for="password"><b>password</b></label></td>
						    <td><input type="text" placeholder="Enter password" name="password" required></td>
						</tr>
						<tr>
							<td>
								<label for="description"><b>Category</b></label>
				    		</td>
				    		<td>
						    	<input type="radio" name="category" value="author" required>Author
						    	<input type="radio" name="category" value="user" style= "margin-left: 12px;"required>User
				    		</td>
				    	<tr>
					</table>
				    

				    <button style="background: #CACFD2; border: 1px solid #839192;"type="submit" class="btn" name="save" value="save">Save</button>
				    <button style="background: #CACFD2; border: 1px solid #839192;"type="button" class="btn cancel" onclick="closeForm()">Close</button>
			</div>
		</div>
		
	</body>
</html>

<script type="text/javascript">
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("myForm").style.display = "none";
	}
</script>
<script>
// function myFunction() {
//   var txt;
//   var Owner = prompt("Owener","Admin");
//   var person = prompt("Project Name:", "Harry Potter");
//   if (person == null || person == "") {
//     txt = "User cancelled the prompt.";
//   } else {
//     txt = "Hello " + person + "! How are you today?";
//   }
//   document.getElementById("demo").innerHTML = txt;
// }
function myFunction2(){
	if (confirm('Apakah anda yakin Untuk Keluar')) {
    window.location.href="logout.php";
} else {
    // Do nothing!
}


}

$.alert({
    title: 'Alert!',
    content: 'Simple alert!',
});
</script>