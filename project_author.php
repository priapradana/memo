<?php
session_start();

include 'koneksi.php';


if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']!="author") {
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

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  /*border: 3px solid #f1f1f1;*/
  border: 1px solid #C0C0C0;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  /*max-width: 300px;*/
  padding: 10px;
  background-color: white;

}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;

}

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

				<form action="project_author.php" class="header-search pull-right">
					<input id="search-fld"  type="text" name="search" placeholder="Find Project"  value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" required>
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
					<li class="top-menu-invisible">
						<a href="home_author.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Document</span></a>
	
					</li>
					<li class="active">
						<a href="project_author.php"><i class="fa fa-lg fa-fw fa-cube txt-color-blue"></i> <span class="menu-item-parent">Project</span></a>

					</li>
					
				</ul>
				<img src="img/logout.png" style="position: absolute;bottom: 6px; left: 9px;">

				<button onclick="myFunction2()"style="position: absolute;left: 30px; bottom: 0px; height: 34px; color: white; background-color: transparent; border-color: transparent;opacity: 0.7;">Logout</button>
	
			</nav>
		
			

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main" style="padding-bottom: 0px;">
			<!-- RIBBON -->
			
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Project</h1>
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
									<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Project</h2>

									
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
										<table border="1" cellpadding="" style="margin: 5px; width: 95%; ">
										    <tr style="">
												<th style="width: 36px;">No</th>
												<th >Nama Project</th>
												<th>Description</th>
												<th>Key</th>
										    </tr>
										    <?php
										    
										    if(isset($_GET['search'])){
										  		$search = $_GET['search'].'%';
										  		// $dokumen = mysqli_query($conn,"SELECT * FROM document WHERE name LIKE '$search'");
										  		$halaman = 10;
												$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
												$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
												$result = mysqli_query($conn,"SELECT * FROM project WHERE name LIKE '$search' ");
												$total = mysqli_num_rows($result);
												$pages = ceil($total/$halaman);            
												$result2 = mysqli_query($conn,"SELECT * FROM project WHERE name LIKE '$search' LIMIT $mulai, $halaman");
												$no =$mulai+1;
										  		 // Customers  CustomerName LIKE 'A%';
										  	}else{
										  	  $halaman = 10;
											  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
											  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
											  $result = mysqli_query($conn,"SELECT * FROM project");
											  $total = mysqli_num_rows($result);
											  $pages = ceil($total/$halaman);            
											  $result2 = mysqli_query($conn,"SELECT * FROM project LIMIT $mulai, $halaman");
											  $no =$mulai+1;
										  	}
											
											foreach ($result2 as $row) {
												$cek = $row['name'];
											
											?>
										    <tr>
										        <td><?php echo $no++;?></td>
												<td style="width: 13%;"><a href="project_detail_author.php?var=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
												<td style="text-align: justify;"><?php echo $row['description'];?></td>
												<td><?php echo $row['k_ey'];?></td>
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
										   
										    <a class="<?php echo$active; ?>"href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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
										<?php 
										if (isset($cek)==false){
											echo '<div style="width: 100%; text-align: center;"><img src="img/not_dokumen.jpg" style= "width: 20%; height: 40%;" align="center"><H1> NOT AVAILABEL PROJECT</H1></div>';
										}
										?> 
										<!-- end content -->
									</div>
									
								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article >
						
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
		echo 'alert("Project Gagal ditambahkan!! key harus berbeda")';
		echo '</script>';
		$_SESSION['save'] = NULL;
	}
}
?>
<script type="text/javascript">
	function myFunction2(){
	if (confirm('Apakah anda yakin Untuk Keluar')) {
    window.location.href="logout.php";
	} else {
	    // Do nothing!
	}

}
	function openForm() {
		document.getElementById("myForm").style.display = "block";
	}

	function closeForm() {
	  document.getElementById("myForm").style.display = "none";
	}
</script>