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
					<li class="top-menu-invisibl">
						<a href="setting_project.php"><img src="img/settings.png" style="width: 18px; height: 18px; margin-right: 12px; margin-left: 3px;"><span class="menu-item-parent">Setting</span></a>

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
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Document</h1>
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
								<header>
									<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Document</h2>

									
								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									
									<!-- end widget edit box -->

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">

<!-- 										<img  style="position: absolute; left: 9px; background-color: black;" src="img/plus.png">
										<div style=" background-color: blue;">ccccccccccccc</div>	

										
										<?php 
										$upload=mysqli_query($conn,"select * from project");
										$user=mysqli_query($conn,"select * from update");
										foreach ($upload as $row) {
										?>
										<img  style="margin-top: 4px; position: absolute; margin-left: 9px; background-color: black;" src="img/plus.png">
										<div style="margin-left: 40px; background-color: blue;"><?php echo $row['name']; ?></div>
										<?php }?>
										</div> -->
										<style>
											table td,th {
    										padding: 7px;
    										font-size: 14px;
											}
											label {
												font-size: 14px;
											}
										</style>
										<form id="myform" method="POST" >
										<table border="1" cellpadding="" style="margin: 5px; width: 95%; ">
										    <tr>
												<th style="width: 32px;">
													<input type="checkbox" class="check" id="checkAll">
												</th>
												<th >Document</th>
												<th >Project</th>
												<th >Upload</th>
										    </tr>
										  	<?php
										  	$i=0;
											$dokumen = mysqli_query($conn,"select * from document where id_project != $var");
											foreach ($dokumen as $row) {
											$i++;
											$cek = $row['name'];
											$fk_id_user = $row['fk_id_user'];
											$id_project = $row['id_project'];

											//get deta user(upload) from dukumen
											$s = "SELECT category FROM user WHERE id=$fk_id_user limit 1";
											$result = mysqli_query($conn,$s);
											$value = mysqli_fetch_object($result);
											$category = $value->category;

											//get deta Project(name project) from project
											$p = "SELECT name FROM project WHERE id=$id_project limit 1";
											$result2 = mysqli_query($conn,$p);
											$value2 = mysqli_fetch_object($result2);
											$project_name = $value2->name;

											$id_project2 = $_SESSION['var'];
											$name2 = $row['name'];
											$message2 = $row['message'];
											$category_class2 = $row['category_class'];
											$id_user2 = $_SESSION['id'];

											$db = "INSERT INTO document VALUES(NULL,'$id_project2','$name2','$message2','$category_class2','$id_user2')";
											?>
											<tr>
												<input type="hidden" name="<?php echo 'id'.$i;?>" value="<?php echo $row['id']; ?>">
												<td><input class="check" type="checkbox" name="<?php echo $i;?>" value="<?php echo $db; ?>"></td>
												<td>
													<?php echo $row['name'];?></</td>
												<td><?php echo $project_name;?></td>
												<td><?php echo $category;?></td>
											</tr>
											<?php }?>
										
										</table>
										<input type="hidden" name="counter" value="<?php echo $i; ?>">
										</form> 
										<!-- end content -->
										<?php 
										if (isset($cek)==false){
											echo '<div style="width: 100%; text-align: center;"><img src="img/not_dokumen.jpg" style= "width: 20%; height: 40%;" align="center"><H1> NOT AVAILABEL DOKUMEN</H1></div>';
										}

										
										?>
										
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
					
					<button style="float: right;" type="submit" form="myform" name="add" onclick="add_document()">Add Document</button>	
					<?php 
						
						if(isset($_POST['add'])){
							for($a=1; $a<=$i;$a++){
								if(isset($_POST[$a])){
									$cek = true;
									//add data pada DB dokumen
									$dd = $_POST[$a];
									$save= mysqli_query($conn,$dd);

									//ambil id doc yg baru di upload
									$p = "SELECT * FROM document WHERE id = (SELECT MAX(id) FROM document)";
									$result = mysqli_query($conn,$p);
									$value = mysqli_fetch_object($result);
									$new_id_document = $value->id;
									echo $new_id_document;

									//id_doc lama akan mencopy isi file format lama dan di insert
									$d = 'id'.$a;
									$id_doc_lama = $_POST[$d];
									$format = mysqli_query($conn,"select * from format where id_doc = $id_doc_lama");
									foreach ($format as $row) {
										$id_dokumen2 = $new_id_document;
										$id_user3 = $_SESSION['id'];
										$name3 = $row['name_file'];
										$tanggal = date('d-m-Y');
										$message = $row['message'];
										$query = mysqli_query($conn,"INSERT INTO format VALUES(NULL,'$id_dokumen2','$id_user3', '$name3','$tanggal','$message')");
									}
									
								}
							}
								
						}
					
						if(isset($d) and isset($_POST['add'])){
							echo '<script type="text/javascript">alert("Berhasil Add Dokumen"); window.location.href = "project_detail_admin.php";</script>';
						}elseif(isset($_POST['add'])){
							echo '<script type="text/javascript">alert("Gagal Add Dokumen");</script>';
						}
					?>
				
				<!-- <button onclick="openForm()" style="float: right; margin-right: 15px;">Add Dokumen</button> -->

				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
	
	</body>
</html>
<!-- <?php
if(isset($_SESSION['save'])){
	if($_SESSION['save']==1){
		echo '<script language="javascript">';
		echo 'alert("Project Berhasil ditambahkan")';
		echo '</script>';
		$_SESSION['save'] = NULL;
	}else{
		echo '<script language="javascript">';
		echo 'alert("Project Gagal ditambahkan")';
		echo '</script>';
		$_SESSION['save'] = NULL;
	}
}
?> -->
<script type="text/javascript">
$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});
	//fungsi untuk log
	function myFunction2(){
		if (confirm('Apakah anda yakin Untuk Keluar')) {
	    window.location.href="logout.php";
	} else {
	    // Do nothing!
	}}
</script>