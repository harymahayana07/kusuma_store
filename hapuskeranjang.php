<?php 
session_start();
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);
include 'koneksi.php';

echo "<script> alert('Produk Terhapus');</script>";
echo "<script> location ='keranjang.php';</script>";
?>