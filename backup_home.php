<?php
session_start();

include 'koneksi.php';

if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']!="admin") {
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		  <!-- boostrap -->
	<!-- 	  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

		  	<!-- boostrap paging -->
		    <title>Bootstrap Example</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
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

				<form action="home.php" method="get" class="header-search pull-right">
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
						<a href="project_admin.php"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Project</span></a>

					</li>
					
				</ul>
				<img src="img/logout.png" style="position: absolute;bottom: 6px; left: 9px;">

				<button onclick="myFunction2()"style="position: absolute;left: 30px; bottom: 0px; height: 34px; color: white; background-color: transparent; border-color: transparent;opacity: 0.7;">Logout</button>

				<div class="container mt-3" style=" position: absolute;bottom: 36px;width: 100%;">

				  <img src="img/user.png" style="position: absolute;bottom: 5px; left: 10px;">
				  <button onclick="window.location.href='user_management.php'" style="position: absolute;left: 30px; bottom: 0px; height: 30px; color: white; background-color: transparent; border-color: transparent;opacity: 0.7;">User Management</button>
				</div>

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
			<!-- 	<div class="form-popup" id="myForm">
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
				  </form>
				</div> -->

		<script>
			// $(document).ready(function(){
			//   $(".dropdown-toggle").dropdown();
			// });
			// function openForm() {
  	// 			document.getElementById("myForm").style.display = "block";
			// }

			// function closeForm() {
			//   document.getElementById("myForm").style.display = "none";
			// }
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
					<!-- <div class="row"style="background-color: blue"> -->
						<article class="col-sm-12">
							<!-- new widget -->
							<div  class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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

									<div class="widget-body" >
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<table border="1" cellpadding="" style="margin: 5px; width: 95%; ">
										    <tr>
												<th style="width: 36px;" >No</th>
												<th >Document</th>
												<th >Project</th>
												<th >Upload</th>
										    </tr>
										  	<?php
										  	$i = 0;
										  	if(isset($_GET['search'])){
										  		$search = $_GET['search'].'%';
										  		$dokumen = mysqli_query($conn,"SELECT * FROM document WHERE name LIKE '$search'");
										  		 // Customers  CustomerName LIKE 'A%';
										  	}else{
										  		$dokumen = mysqli_query($conn,"select * from document ");
										  	}
											

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

											?>
											<tr>
												<td><?php echo $i;?></td>
												<td><a href="detail_dokumen.php?id_dokumen=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
												<td><?php echo $project_name;?></td>
												<td><?php echo $category;?></td>
											</tr>
											<?php }?>
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
					<!-- </div> -->
				</section>
			</div>
		</div>
	</body>
</html>


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

// $.alert({
//     title: 'Alert!',
//     content: 'Simple alert!',
// });
</script>