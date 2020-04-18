<?php

include "../koneksi.php";

?>

<?php

$sql = "SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas INNER JOIN  detail_pinjam ON peminjaman.id_pinjam = detail_pinjam.id_pinjam ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($kon, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
	$pinjam[] = $data;
}

?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md">
		
		</div>
	</div>
</div>

<div class="card">
  <div class="card-header">
  		<h2 class="card-title"><i class="fas fa-edit"></i> Data Peminjaman <a href="form-pinjam.php"><button type="button" class="btn btn-outline-info"><i class="fas fa-plus"></i></button></a>
  </div>
  <div class="card-body">
    
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peminjaman</th>
      <th scope="col">tanggal Pinjam</th>
      <th scope="col">Tanggal Jatuh Tempo</th>
      <th scope="col">Petugas</th>
       <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>

  <?php

  	$no=1;
  	foreach ($pinjam as $p ) {

  ?>

  <tr>
  	<th scope="row"><?= $no ?></th>
  	<th><?= $p ['nama'] ?></th>
  	<th><?= date('d F Y', strtotime($p['tgl_pinjam']))?></th>
  	<th><?= date('d F Y', strtotime($p['tgl_jatuh_tempo']))?></th>
  	<td><?= $p ['nama_petugas'] ?></td>
  	<td>
  		<?php
  		if ($p ['status'] == "dipinjam") 
  		{
  			echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
  		}
  		else
  		{
  			echo '<h5><span class="badge badge-secondary">kembali</span></h5>';
  		}
  		?>
  	</td>
  	<td>
  		<a href="detail.php" class="badge badge-success">Detail</a>
  		<a href="form-edit.php" class="badge badge-warning">Edit</a>
  		<a href="hapus.php" class="badge badge-danger">Hapus</a>
  	</td>
  </tr>
  <?php
  $no++;
		}
  ?>
</table>
  </div>
</div>
<?php

include '../aset/footer.php';

?>
