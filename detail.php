<style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}

	img {
		max-width: 100%;
	}

	.cycle-slideshow {
		width: 100%;
		max-width: 960px;
		display: block;
		position: relative;
		margin: 20px auto;
		overflow: hidden;
	}

	.cycle-prev,
	.cycle-next {
		font-size: 200%;
		color: #DAA520;
		display: block;
		position: absolute;
		top: 50%;
		z-index: 990;
		cursor: pointer;
		margin-top: -16px;
	}

	.cycle-prev {
		left: 42px;
	}

	.cycle-next {
		right: 62px;
	}

	.cycle-pager {
		position: absolute;
		width: 100%;
		height: 10px;
		bottom: 10px;
		z-index: 990;
		text-align: center;
	}

	.cycle-pager span {
		text-indent: 100%;
		top: 100px;
		width: 10px;
		height: 10px;
		display: inline-block;
		border: 1px solid #808080;
		border-radius: 50%;
		margin: 0 10px;
		white-space: nowrap;
		cursor: pointer;
	}

	.cycle-pager-active {
		background-color: #008000;
	}
</style>

<?php session_start(); ?>
<?php include 'koneksi.php'; ?>

<?php

//mendapatkan id url
$id_produk = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
$kategori = $detail["id_kategori"];
?>
<?php
$data = array();
$slider = $koneksi->query("SELECT*FROM produk_foto WHERE id_produk='$id_produk'");
while ($s = $slider->fetch_assoc()) {
	$data[] = $s;
} ?>
<!DOCTYPE html>
<html>

<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">

</head>

<body>
	<?php include 'menu.php'; ?><br><br><br>
	<?php include 'buttonup.php'; ?>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v8.0" nonce="x8IbXLrR"></script>
	<div class="wrap">

		<main>
			<div class="container">
				<div class="row">
					<!-- start content -->
					<div class="single">
						<!-- start span1_of_1 -->
						<div class="thumbnail left_content" style="margin-top: 20px;">
							<div class="col-md-8 span1_of_1">
								<!-- start product_slider -->
								<div class="cycle-slideshow">
									<span class="cycle-prev">&#9001;</span> <!-- Untuk membuat tanda panah di kiri slider -->
									<span class="cycle-next">&#9002;</span> <!-- Untuk membuat tanda panah di kanan slider -->
									<span class="cycle-pager"></span>
									<?php foreach ($data as $key => $value) : ?>
										<img src="foto_produk/<?php echo $value["nama_produk_foto"]; ?>" id="myimage">
									<?php endforeach ?>
								</div>
								<script type="text/javascript" src="slider.js"></script>
								<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
								<script src="admin/assets/js/bootstrap.min.js"></script>
								<script src="admin/assets/js/jquery.min.js"></script>
								<script src="zoomsl.min.js"></script>
								<script>
									$('#myimage').imagezoomsl();
								</script>

								<!-- end product_slider -->
							</div>
							<!-- start span1_of_1 -->

							<div class="col-md-4 span1_of_1_des" style="margin: 0px;">
								<div class="col-md-12 desc1"><br>
									<h3><?php echo $detail["nama_produk"] ?></h3>
									<h5>Rp. <?php echo number_format($detail["harga_produk"]); ?></h5>
									<h5><? echo $detail['nama_produk'] ?></h5>
									<h4>Stok Produk : <?php echo number_format($detail["stok_produk"]); ?></h4>
									<?php
									$data1 = array();
									$a = $koneksi->query("SELECT*FROM pembelian_produk WHERE id_produk='$id_produk'");
									while ($p = $a->fetch_assoc()) {
										$data1[] = $p;
									}
									?>
									<?php $to = 0; ?>
									<?php foreach ($data1 as $key => $val) : ?>
										<?php $har = $val['jumlah'];
										$to += $har ?>
									<?php endforeach ?>
									<h4>Terjual : <?php echo $to ?></h4>
									<form method="post">
										<div class="input-group">
											<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo number_format($detail["stok_produk"]); ?>" required></input><br> <br>
											<div class="input-group-button">
												<button class="btn btn-primary" name="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
											</div>
										</div>
									</form>
									<?php
									if (isset($_POST["beli"])) {
										$jumlah = $_POST["jumlah"];
										$_SESSION["keranjang"][$id_produk] = $jumlah;
										echo "<script> alert('Produk Masuk Ke Keranjang');</script>";
										echo "<script> location ='keranjang.php';</script>";
									}
									?>
									<div class="share-desc">
										<div class="share">
											<h4>Share Product :</h4>
											<ul class="share_nav">
												<!-- AddToAny BEGIN -->
												<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="http://localhost/toko/detail.php?id=36" data-a2a-title="Detail">
													<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
													<a class="a2a_button_facebook"></a>
													<a class="a2a_button_twitter"></a>
													<a class="a2a_button_whatsapp"></a>
													<a class="a2a_button_telegram"></a>
													<a class="a2a_button_facebook_messenger"></a>
												</div>
												<script>
													var a2a_config = a2a_config || {};
													a2a_config.onclick = 1;
												</script>
												<script async src="https://static.addtoany.com/menu/page.js"></script>
												<!-- AddToAny END -->
											</ul>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<!--  -->
							</div>
							<div class="clear"></div>
							<!-- start tabs -->
							<section class="tabs">
								<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
								<label for="tab-1" class="tab-label-1">Komentar</label>

								<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2">
								<label for="tab-2" class="tab-label-2">Deskripsi</label>

								<div class="clear-shadow"></div>

								<div class="content">
									<div class="content-1">
										<?php
										$am = $koneksi->query("SELECT*FROM komentar JOIN pelanggan
								ON komentar.id_pelanggan=pelanggan.id_pelanggan 
								WHERE komentar.id_produk='$_GET[id]'"); ?>
										<?php while ($det = $am->fetch_assoc()) { ?>
											<img src="fotoprofil/<?php echo $det["fotoprofil"] ?>" width="20px" style="border-radius: 15px; -moz-border-radius:15px; border: 2px solid crimson;"> <?php echo $det['nama_pelanggan'] ?> | <?php echo $det['tgl_komentar'] ?><br><?php echo $det['komentar'] ?>
											<hr>
										<?php  } ?>


										<?php include 'komentar.php' ?>

									</div>
									<div class="content-2">

										<?php echo $detail["deskripsi_produk"] ?>
									</div>
								</div>
							</section>
							<!-- end tabs -->
						</div>
						<!-- start sidebar -->
						<div class="left_sidebar">
							<?php

							if (empty($_SESSION['keranjang']) or !isset($_SESSION["keranjang"])) : ?>

							<?php else : ?>
								<?php include 'modal.php'; ?><br>
							<?php endif ?>

						</div>
						<!-- end sidebar -->
						<div class="clear"></div>
					</div>
				</div>
				<h1 style="font-size: 30px;">Produk Terkait</h1>

				<div class="row">
					<?php
					$semuadata = array();
					$am = $koneksi->query("SELECT*FROM produk WHERE id_kategori LIKE '$kategori%' AND id_produk NOT LIKE '$id_produk%'");
					while ($pecah = $am->fetch_assoc()) {
						$semuadata[] = $pecah;
					}
					?>
					<?php foreach ($semuadata as $key => $value) : ?>
						<div class="col-md-3" style=" padding:  5px;">
							<div class="thumbnail" style="border: 3px solid black;">
								<img src="foto_produk/<?php echo $value['foto_produk'] ?>" width="100" alt="">
								<div class="caption">
									<h3><?php echo $value['nama_produk'] ?></h3>
									<h5>Rp <?php echo number_format($value['harga_produk']) ?></h5>
									<a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Beli</a>
									<a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-default" i><i class="fas fa-info-circle"></i>Detail</a>

								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</main>

		<!-- end content -->
	</div>
	</div>


</body>

</html>