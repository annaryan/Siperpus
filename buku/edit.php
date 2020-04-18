<?php 

include '../koneksi.php';
include '../aset/header.php';

$id_buku = $_GET["id_buku"];

$sql = "SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id_buku=$id_buku";
$res = mysqli_query($kon,$sql);
$buku = mysqli_fetch_assoc($res);
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
           <center>
           <div class="card" >
               <h2 class="card-title"><i class="fas fa-book"></i>Edit Data Buku</h2>
           </div>
           <div class="card-body">
           <form action="edit-proses.php" method="post">
           <table class="table">
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                <tr>
                    <td>Judul</td>
                    <td><input  type="text" name="judul" value="<?= $buku['judul']; ?>" required></td>
                </tr>
                  <tr>
                    <td>penerbit</td>
                    <td><input  type="text" name="penerbit" value="<?= $buku['penerbit']; ?>"  required></td>
                </tr>
                  <tr>
                    <td>pengarang</td>
                    <td><input  type="text" name="pengarang" value="<?= $buku['pengarang']; ?>"  required></td>
                </tr>
                <tr>
                    <td>ringkasan</td>
                    <td style="">
                        <textarea  height:"100px" value="<?= $buku['ringkasan']; ?>" type="textarea" name="ringkasan"   required><?= $buku ['ringkasan']; ?>
                            
                        </textarea>
                    </td>
                </tr>
                <input  type="hidden" name="cover" value="<?= $buku['cover'];?>">
                <tr>
                    <td>Stok</td>
                    <td><input  type="number" name="stok" value="<?= $buku['stok']; ?>" ></td>
                </tr>
                <tr>
                    <td>kategori</td>
                    <td>
                        <select  name="id_kategori" required>
                        <?php
                       $query = mysqli_query($kon,"SELECT * FROM kategori ");
                       while ($query_kategori = mysqli_fetch_assoc($query)) :
                        ?>
                        <option value="<?= $query_kategori['id_kategori']; ?> " >
                            <?php echo $query_kategori['kategori']; ?>
                              </option>
                        <?php
                        endwhile;    
                        ?>
                      
                            
                        </select>
                    </td>
                </tr>
                <tr>
                 <th></th>
                 <th><button style="width:100%; height:70px" type="submit" class="btn btn-primary" name="simpan">EDIT</button></th>
                </tr>
               
           </table>
               
           </form>
               
           </div>    
           </center> 
        </div>
        
    </div>
    
</div>






<?php

include '../aset/footer.php';

?>