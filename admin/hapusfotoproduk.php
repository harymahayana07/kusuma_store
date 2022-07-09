<?php  

$id_foto=$_GET["idfoto"];
$id_produk=$_GET["idproduk"];

//ambil foto di folder
$ambilfoto=$koneksi->query("SELECT *FROM produk_foto WHERE id_produk_foto='$id_foto'");
$detailfoto=$ambilfoto->fetch_assoc();

$namafilefoto=$detailfoto["nama_produk_foto"];

//hapus foto dr folder

unlink("../foto_produk/".$namafilefoto);

//hapus data di mysql
$koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto='$id_foto'");

echo "<script>alert('foto produk terhapus');</script>";
echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
?>