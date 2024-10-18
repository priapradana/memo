<?php
session_start();

include 'koneksi.php';

if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']!="user") {
	header("location:index.php");
}
?>

<style>
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
	<!-- 	  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->


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

				<form action="home_user.php" method="get" class="header-search pull-right">
					<input id="search-fld"  type="text" name="search" placeholder="Find Document"  value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" required>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>

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
					<li class="active">
						<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Document</span></a>
	
					</li>
					<li class="top-menu-invisible">
						<a href="project_user.php"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Project</span></a>

					</li>
					
				</ul>
				<img src="img/logout.png" style="position: absolute;bottom: 6px; left: 9px;">

				<button onclick="myFunction2()"style="position: absolute;left: 30px; bottom: 0px; height: 34px; color: white; background-color: transparent; border-color: transparent;opacity: 0.7;">Logout</button>

				

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
									<span class="widget-icon" > <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Document</h2>

									
								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									<style>
										table td,th {
										padding: 7px;
										font-size: 14px;
										}
										label {
											font-size: 14px;
										}
									</style>
									
									<!-- end widget edit box -->

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<table border="1" cellpadding="" style="margin: 5px; width: 95%; ">
										    <tr>
												<th >No</th>
												<th >Document</th>
												<th >Project</th>
												<th >Upload</th>
										    </tr>
										  	<?php
										  	
										  	if(isset($_GET['search'])){
										  		$search = $_GET['search'].'%';
										  		$dokumen = mysqli_query($conn,"SELECT * FROM document WHERE name LIKE '$search' and category_class = 'public'");
										  		 // Customers  CustomerName LIKE 'A%';
										  	}else{
										  		$dokumen = mysqli_query($conn,"SELECT * FROM document WHERE category_class = 'public'");
										  	}
											
										  	$j = 0;
											foreach ($dokumen as $row) {
												$cek = $row['name'];
												$fk_id_user = $row['fk_id_user'];
												$id_project = $row['id_project'];

												// cek category pada project
												$d = "SELECT category_class FROM project WHERE id=$id_project limit 1";
												$result0 = mysqli_query($conn,$d);
												$value0 = mysqli_fetch_object($result0);
												$category_class = $value0->category_class;
												if ($category_class == 'public'){
													$j++;
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

													?>
													<tr>
														<td><?php echo $j;?></td>
														<td><?php echo $row['name'];?></td>
														<td><?php echo $project_name;?></td>
														<td><?php echo $category;?></td>
													</tr>
											<?php 
												}
											}?>
										<!--     <?php
										    $i= 0; 
											$upload=mysqli_query($conn,"select * from project");
											foreach ($upload as $row) {
												$i++;
											?>
										    <tr>
										        <td><?php echo $i; ?></td>
												<td style="width: 13%;"><a href="dummy_file.php?var=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
												<td style="text-align: justify;"><?php echo $row['description'];?></td>
												<td><?php echo $row['key'];?></td>
										    </tr>
											<?php }?> -->
										</table>
										<?php 
										if (isset($cek)==false){
											echo '<div style="width: 100%; text-align: center;"><img src="img/not_dokumen.jpg" style= "width: 20%; height: 40%;" align="center"><H1> NOT AVAILABEL DOKUMEN</H1></div>';
										}
										?> 
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
			</div>
		</div>
	</body>
</html>

<script>
function myFunction2(){
	if (confirm('Apakah anda yakin Untuk Keluar')) {
    window.location.href="logout.php";
	} else {
	    // Do nothing!
	}

}
</script>