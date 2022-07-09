<?php
session_start();
//koneksi ke database
include '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');

    exit();
}
?>
<?php $ambil=$koneksi->query("SELECT*FROM admin JOIN toko ON admin.id_admin=toko.id_admin");
$detpem=$ambil->fetch_assoc() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KUSUMA STORE ADMIN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link rel="stylesheet"  href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

   <script src="assets/js/jquery-1.10.2.js"></script>

   <script src="assets/ckeditor/ckeditor.js"></script>
   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">KUSUMA STORE</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">&nbsp; <a href="index.php?halaman=komentar"><i class="fa fa-envelope fa-lg" ></i></a></a></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../tema/bg_kusuma_store.jpg" class="user-image img-responsive"/>
					</li>
                    <li><a class="active-menu"  href="index.php"><i class="fa fa-dashboard "></i> Beranda</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=kategori"><i class="fa fa-cube"></i> Kategori</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=produk"><i class="fa fa-tags"></i> Produk</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> Pembelian</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> Pelanggan</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=laporan"><i class="fa fa-file"></i> Laporan</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=profil"><i class="fa fa-cogs"></i> Pengaturan</a></li>
                    <li><a class="active-menu"  href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
               <?php 
               if (isset($_GET['halaman'])) 
               {
                    if ($_GET['halaman']=="produk")
                    {
                       include 'produk.php'; 
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    {
                        include 'pembelian.php'; 
                    }
                    elseif ($_GET['halaman']=="pelanggan")
                    {
                        include 'pelanggan.php'; 
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php'; 
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php'; 
                    }
                    elseif ($_GET['halaman']=="hapusproduk")
                    {
                        include 'hapusproduk.php'; 
                    }
                    elseif ($_GET['halaman']=="ubahproduk")
                    {
                        include 'ubahproduk.php'; 
                    }
                    elseif ($_GET['halaman']=="logout") 
                    {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="laporan") 
                    {
                        include 'laporan.php';
                    }
                    elseif ($_GET['halaman']=="kategori") 
                    {
                        include 'kategori.php';

                    }
                    elseif ($_GET['halaman']=="ubahkategori") 
                    {
                        include 'ubahkategori.php';
                        
                    }
                    elseif ($_GET['halaman']=="detailproduk") 
                    {
                        include 'detailproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapusfotoproduk") 
                    {
                        include 'hapusfotoproduk.php';
                    }
                    elseif ($_GET['halaman']=="cetak") 
                    {
                        include 'cetak.php';
                    }
                    elseif ($_GET['halaman']=="tambahkategori") 
                    {
                        include 'tambahkategori.php';
                    }
                    elseif ($_GET['halaman']=="hapuskategori") 
                    {
                        include 'hapuskategori.php';
                    }
                     elseif ($_GET['halaman']=="hapuspelanggan") 
                    {
                        include 'hapuspelanggan.php';
                    }
                    elseif ($_GET['halaman']=="profil") 
                    {
                        include 'profil.php';
                    }
                    elseif ($_GET['halaman']=="ubahprofil") 
                    {
                        include 'ubahprofil.php';
                    }
                    elseif ($_GET['halaman']=="hapustema") 
                    {
                        include 'hapustema.php';
                    }
                     elseif ($_GET['halaman']=="komentar") 
                    {
                        include 'komentar.php';
                    }
                    elseif ($_GET['halaman']=="jawabkomentar") 
                    {
                        include 'jawabkomentar.php';
                    }
                    
               }
               else
               {
                    include 'home.php';
               } 
               ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
    <script src="assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>
    <script>
        $(document).ready(function(){
            var table =$('#table').DataTable ({
                buttons: ['csv','print','excel','pdf'],
                dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>"+
                "<'row'<'col-md-12'tr>>"+
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"ALL"]
                ]
            });

            table.buttons().container()
            .appendTo('#table_wrapper .col-md-5:eq(0)');
        });
    </script>   
   
</body>
</h