<?php
session_start();

include 'koneksi.php';


if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']!="admin") {
	header("location:index.php");
}
if (isset($_GET['var'])){
		$var = $_GET['var'];
}else{
	$var = $_SESSION['var'];
}
$_SESSION['var'] = $var;

$id_pro = $var;
$p3 = "SELECT name FROM project WHERE id=$id_pro limit 1";
$result3 = mysqli_query($conn,$p3);
$value3 = mysqli_fetch_object($result3);
$project_n = $value3->name;
?>

<style>
	/*untuk ubah bentuk radio box*/
input[type="radio"] {
  -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
  -moz-appearance: checkbox;    /* Firefox */
  -ms-appearance: checkbox;     /* not currently supported */
}
/*body {font-family: Arial, Helvetica, sans-serif;}*/
/** {box-sizing: border-box;}*/

/* Button used to open the contact form - fixed at the bottom of the page */
/*.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
*/
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
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
/*}*/

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
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

		<title> Memu</title>
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
							Project > <?php echo $project_n; ?>
							
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
					<li class="active">
						<a onclick="openForm()"><img src="img/settings.png" style="width: 18px; height: 18px; margin-right: 12px; margin-left: 3px;"><span class="menu-item-parent">Setting</span></a>

					</li>
					
				</ul>
			
					<img onclick="myFunction2()" src="img/logout.png" style="position: absolute;bottom: 6px; left: 9px;">
				
				<div class="container mt-3" style=" position: absolute;bottom: 36px;width: 100%;">
					<a href='user_management.php'>
					  <img  src="img/user.png" style="position: absolute;bottom: 5px; left: 10px;">
					</a>
				</div>
	
		<script>
			$(document).ready(function(){
			  $(".dropdown-toggle").dropdown();
			});
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
						
					</div>
					
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
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
								

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									<?php
										//Get data Project
										$id_project = $_SESSION['var'];
										$s = "SELECT * FROM project WHERE id=$id_project limit 1";
										$result = mysqli_query($conn,$s);
										$value = mysqli_fetch_object($result);
										$category_class = $value->category_class;
										$name = $value->name;
										$key = $value->k_ey;
										$description = $value->description;
									?>
									<!-- end widget edit box -->

									<div class="widget-body" style="border: 1px solid #C0C0C0;">
										<!-- content -->
										<div id="myTabContent"  class="tab-content">
											<div style="margin-left: 350px;">
												<form action="save_setting.php" method="POST" class="form-container">
											    <h1 style="margin-bottom: 12px;">Project Setting</h1>
											    
											    <table style="width: 400px;" >
											    	<tr >
													    <td style="padding-bottom: 6px; padding-top: 6px;"><label for="owner"><b>Owner</b></label></td>
													    <td><input type="text" placeholder="Enter Owner" name="owner" disabled value="<?php echo $_SESSION['hak_akses']; ?>"></td>
													</tr>
													<tr>
													    <td style="padding-bottom: 6px; padding-top: 6px;"><label for="name"><b>Name</b></label></td>
													    <td><input type="text" placeholder="Enter Project Name" name="name" value="<?php echo $name;?>" required></td>
													</tr>
												    <tr>
													    <td style="padding-bottom: 6px; padding-top: 6px;"><label for="key"><b>Key</b></label></td>
													    <td><input type="text" placeholder="Enter Key" name="key" required value="<?php echo $key;?>"></td>
											    	</tr>
											    	<tr>
											    		<td style="padding-bottom: 6px; padding-top: 6px;"><label for="key"><b>Category</b></label></td>
											   
											    		<td>
											    			<!-- <input list="browsers" name="category_class" placeholder="<?php echo $category_class;?>" required> -->
											    			<select id="browsers" name="category_class">
															    <option value="private">private</option>
          														<option value="public">public</option>
															  </select>
											    			<!-- <input type="radio" name="category_class" value="private" required>Private
											    		<input type="radio" name="category_class" value="public" required style="margin-left: 20px;">Public -->
											    		</td>
											    	</tr>
												</table>
											    <label for="description" style="font-size: 17px;"><b>Description</b></label>
											    <textarea rows="7" cols="45" name="description" required><?php echo $description;?></textarea>
											    <br>
											    <br>

											    <button style="background: #C0C0C0; margin-right: 18px;"type="submit" class="btn" name="save" value="save">Save</button>
											    <button style="background: #C0C0C0;" type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
											  </form>
											</div>
										<!-- end content -->
										</div>
									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article>
					</div>

					<!-- end row -->

					<!-- row -->

					<!-- end row -->

				</section>
				
			

				
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
	
	</body>
</html>
<?php
if(isset($_SESSION['save'])){
	if($_SESSION['save']==1){
		echo '<script language="javascript">';
		echo 'alert("Project Berhasil ditambahkan")';
		echo '</script>';
		$_SESSION['save'] = NULL;
	}else{
		echo '<script language="javascript">';
		echo 'alert("Gagal Edit!! Key harus berbeda ")';
		echo '</script>';
		$_SESSION['save'] = NULL;
	}
}
if(isset($_SESSION['save2'])){
	if($_SESSION['save2']==1){
		echo '<script language="javascript">';
		echo 'alert("Project Berhasil ditambahkan")';
		echo '</script>';
		$_SESSION['save2'] = NULL;
	}else{
		echo '<script language="javascript">';
		echo 'alert("Gagal Edit!! Key harus berbeda ")';
		echo '</script>';
		$_SESSION['save2'] = NULL;
	}
}
?>
<script type="text/javascript">
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	  window.location.href="add_dokumen_admin.php";
	}
	//fungsi untuk log
	function myFunction2(){
		if (confirm('Apakah anda yakin Untuk Keluar')) {
	    window.location.href="logout.php";
	} else {
	    // Do nothing!
	}}
</script>