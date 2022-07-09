<h3>Kategori Produk</h3>	
<hr>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>

		<?php $ambil= $koneksi->query("SELECT * FROM kategori");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah["nama_kategori"] ?></td>
			<td>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori'];?>" class="btn btn-warning btn-sm">Hapus</a>
				<a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori'];?>" class="btn btn-danger btn-sm">Ubah</a>
			</td>

		</tr>
		<?php $nomor++;?>
		<?php }?>

	</tbody>

</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary"> Tambah Kategori</a>