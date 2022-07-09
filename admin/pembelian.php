
<h2>Daftar Pembelian</h2>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Pembelian</th>
			<th>Total Pembelian</th>
			<th>Status Belanja</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil= $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian. id_pelanggan=pelanggan.id_pelanggan ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_pelanggan']?></td>
			<td><?php echo date("d F Y", strtotime($pecah['tanggal_pembelian']))?></td>
			<td>Rp. <?php echo number_format($pecah['total_pembelian'])?></td>
			<td><?php echo $pecah['status_pembelian']?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']?>" class= "btn btn-info">Detail</a>
				<?php if ($pecah['status_pembelian']!=="pending"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']?>" class= "btn btn-success">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++;?>
		<?php }?>
	</tbody>
</table>

<?php 
$semuadata=array();
$am=$koneksi->query("SELECT*FROM pembelian_produk WHERE id_produk='18'");
WHILE ($pe=$am->fetch_assoc())
	{
		$semuadata[]=$pe;
	}
?>

<table class="table table-bordered" >
	<thead>
		<tr>
			<th>Ranking</th>
			<th>Nama Produk</th>
			<th>Total Penjualan</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php $nomor=1;?>
		<?php foreach ($semuadata as $key => $value): ?>
		
		<?php $nama=$value['nama'];?>
				<?php $harga=$value['jumlah'];?>
				<?php $total+=$harga ?>
		<?php endforeach ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $nama?></td>
			<td><?php echo number_format($total) ?></td>
		</tr>
		<?php $nomor++;?>
		
	</tbody>	
</table>