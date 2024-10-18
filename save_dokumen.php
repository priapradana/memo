<?php include 'koneksi.php';
$id_project= '1';
$format = "mobil";
$format = $id .'_'. $format;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
	</head>
	<body>
	<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
		<?php 
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('pdf','doc','ppt','xlsx','xls','docx');

			$temp = explode(".", $_FILES["file"]["name"]);
			$nama= $format . '.' . end($temp);
			// $nama = $_FILES['file']['name'];

			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$tanggal = date('d-m-Y');
					$query = mysqli_query($conn,"INSERT INTO upload VALUES(NULL, '$nama','$tanggal')");
					if($query){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>

		<br/>
		<br/>
		<a href="index.php">Upload Lagi</a>
		<br/>
		<br/>

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