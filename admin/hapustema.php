<?php

$ambil =$koneksi->query("SELECT*FROM tema WHERE id_tema='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$tema =$pecah['tema'];
if (file_exists("../tema/$tema"))
{
	unlink("../tema/$tema");
} 


$koneksi->query("DELETE FROM tema WHERE id_tema='$_GET[id]'");

echo "<script>alert('Tema terhapus');</script>";
echo "<script>location='index.php?halaman=profil';</script>";

?>