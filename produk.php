<style type="text/css">
	.col-md-3 {
		position: relative;
		margin: 0 auto;
		overflow: hidden;
	}

	.tumbnail {
		position: absolute;
		top: 0;
		left: 0;
	}

	.thumbnail img {
		padding: 1px;
		-webkit-transition: 0.4 ease;
		transition: 0.4 ease;
	}

	.col-md-3:hover .thumbnail img {
		-webkit-transform: scale(1.36);
		transform: scale(1.36);
	}
</style>
<h1>PRODUK TERBARU</h1><br>

<div class="row">
	<?php $ambil = $koneksi->query("SELECT *FROM produk"); ?>
	<?php while ($perproduk = $ambil->fetch_assoc()) { ?>
		<div class="col-md-3" style="margin:0px;">
			<div class="thumbnail">
				<div class="caption text-center" style="background-color: #E2CA88;">
					<img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" width="100" alt="">
					<h5><?php echo $perproduk['nama_produk'] ?></h5>
					<h5>Rp <?php echo number_format($perproduk['harga_produk']) ?></h5>
					<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart fa-sm"></i> Beli</a>
					<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default btn-sm" i><i class="fas fa-info-circle fa-sm"></i>Detail</a>
				</div>
			</div>
		</div>
	<?php } ?>

</div>