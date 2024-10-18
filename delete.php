<?php
echo $_GET['var'];
$var = $_GET['var'];

include 'koneksi.php';

$db = "DELETE FROM user WHERE id = $var";
$save= mysqli_query($conn,$db);

echo '<br>'.$save;

header("location:user_management.php");

?>