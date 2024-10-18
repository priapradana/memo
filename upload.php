<?php include 'koneksi.php';
session_start();

if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}elseif ($_SESSION['hak_akses']=="user") {
	header("location:index.php");
}

?>
<style type="text/css">
	.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
  	@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}
	@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	
<h1 style="margin-left: 39%;">Menunggu Proses</h1>
<div style="margin-left: 42%;" class="loader"></div>
		<?php
		// echo $_SESSION['id'];
		// echo $_SESSION['id_dokumen'].'<br>';
		// echo $_POST['message'];
		$id_user = $_SESSION['id'];
		$id_dokumen = $_SESSION['id_dokumen'];
		$message = $_POST['message'];

		$p = "SELECT * FROM format WHERE id = (SELECT MAX(id) FROM format)";
		$result = mysqli_query($conn,$p);
		$value = mysqli_fetch_object($result);
		$last_id_format = 1 + $value->id;
		$last_id_format2 = (string) $last_id_format;

		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('pdf','doc','ppt','xlsx','xls','docx');

			// $temp = explode(".", $_FILES["file"]["name"]);
			// $nama= 'asd' . '.' . end($temp);
			$nama = $last_id_format2."_". $_FILES['file']['name'];

			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				move_uploaded_file($file_tmp, 'file/'.$nama);
				$tanggal = date('d-m-Y');
				$query = mysqli_query($conn,"INSERT INTO format VALUES(NULL,'$id_dokumen','$id_user', '$nama','$tanggal','$message')");
				if($query){
					echo 'FILE BERHASIL DI UPLOAD';
				}else{
					echo 'GAGAL MENGUPLOAD GAMBAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		if($_SESSION['hak_akses']=="admin"){
			header("location:detail_dokumen.php");
		}elseif ($_SESSION['hak_akses']=="author") {
			header("location:detail_dokumen_author.php");
		}
		?>
		
		

<!-- 		<table>
			<?php 
			$data = mysqli_query($conn,"select * from upload");
			while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td>
					<img src="<?php echo "file/".$d['nama_file']; ?>">
				</td>		
			</tr>
			<?php } ?>
		</table> -->
	</body>
</html>