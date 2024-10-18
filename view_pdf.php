<?php
session_start();

if(isset($_SESSION['hak_akses'])==false){
	header("location:index.php");
}
$file = "file/".$_POST['view'];

?>

<!DOCTYPE html>
<html>
<body>
<embed src="<?php echo $file;?>" type="application/pdf" height="600px" width="100%">
    <!-- <iframe src="view.pdf" width="100%" style="height:100%"></iframe> -->
<!-- <a href="#" onclick="window.open('file:///C:/xampp/htdocs/fileupload/view.pdf', '_blank', 'fullscreen=yes'); return false;">MyPDF</a> -->


    <!-- <object data="file/view.pdf" type="application/pdf" width="100%" height="600px">
  <p>Alternative text</p>
</object>
 -->
</body>
</html>