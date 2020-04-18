<?php 
include 'aset/header.php';
include 'koneksi.php';

$date=date("Y-m-d");
$anggota = "SELECT count(nama) as jml FROM anggota ";
$buku = "SELECT sum(stok) as jml FROM  buku";

$peminjaman = "SELECT count(id_pinjam) as jml FROM peminjaman";


$anggota = mysqli_query($kon, $anggota);
$buku = mysqli_query($kon, $buku);
$peminjaman = mysqli_query($kon, $peminjaman);
$s=mysqli_fetch_assoc($anggota);
$b=mysqli_fetch_assoc($buku);
$p=mysqli_fetch_assoc($peminjaman);

?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md">
			<h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
			<hr class="bg-light">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 ">
			<div class="card bg-danger ml-5 " style="width: 18rem; margin-left:200px;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Buku</h5>
			    <p class="card-text" style="font-size: 60px"><?= $b["jml"];?></p>
			    <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-warning" style="width: 18rem;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Anggota</h5>
			    <p class="card-text" style="font-size: 60px"><?= $s["jml"];?></p>
			    <a href="http://localhost/siperpus/anggota/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info" style="width: 18rem;">
  			<div class="card-body text-white">
    			<h5 class="card-title">Jumlah Transaksi</h5>
			    <p class="card-text" style="font-size: 60px"><?= $p["jml"];?></p>
			    <a href="http://localhost/siperpus/transaksi/index.php" class="text-white">Lebih detail >>> <i class="fas fa-angel-double-right"></i></a>
  			</div>
			</div>
		</div>
	</div>
</div>
<?php 
include 'aset/footer.php';
?>
