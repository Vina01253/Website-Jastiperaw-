<?php
include 'config/koneksi.php';

$npm = $_GET['npm'];

mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm = '$npm'");

header("Location: output.php");
exit;
?>