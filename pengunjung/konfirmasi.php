 <?php
    include_once 'templates/head.php';
    include_once 'templates/navbar.php';
    require_once '../dbkoneksi.php';
    ?>
 <?php
    $sql = "SELECT * FROM pesanan INNER JOIN produk ON pesanan.nama_produk = produk.nama WHERE pesanan.id IN (SELECT MAX(pesanan.id) FROM pesanan)";
    // SELECT * FROM tb_siswa WHERE id_siswa IN (SELECT MAX(id_siswa) FROM tb_siswa)
    $rs = $dbh->query($sql);
    ?>
 <link rel="stylesheet" href="css/csskonfirmasi.css">

 <!--================Order Details Area =================-->
 <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
     <div class="container">
         <div class="row no-gutters slider-text align-items-center justify-content-center">
             <div class="col-md-9 ftco-animate text-center">
                 <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span class="mr-2"><a href="menu_belanja.php">Menu</a></span> <span>Konfirmasi</span></p>
                 <h1 class="mb-0 bread">Detail Pemesanan</h1>
             </div>
         </div>
     </div>
 </div>

 <section class="order_details section_gap">
     <div class="container">
         <?php while ($row = $rs->fetch()) { ?>
             <h3 class="title_confirmation">Terima Kasih. Pesanan anda berhasil kami proses.</h3>
             <div class="row order_d_inner">
                 <div class="col-lg-4">
                     <div class="details_item">
                         <h4>Informasi Pesanan</h4>
                         <ul class="list">
                             <li><a href="#"><span>Kode</span> : <?php echo $row['kode'] ?? ""; ?></a></li>
                             <li><a href="#"><span>Jenis Produk</span> : <?php echo $row['jenis_produk'] ?? ""; ?></a></li>
                             <li><a href="#"><span>Nama Produk</span> : <?php echo $row['nama_produk'] ?? ""; ?></a></li>
                             <li><a href="#"><span>Date</span> : <?php echo $row['tanggal'] ?? ""; ?></a></li>
                             <li><a href="#"><span>Total Harga</span> : Rp<?= number_format($row['total_harga'], 0, ',', '.') ?></a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="details_item">
                         <h4>Alamat Penerima</h4>
                         <ul class="list">
                             <li><a href="#"><span>Nama</span> : <?php echo $row['nama_pemesan'] ?? ""; ?></a></li>
                             <li><a href="#"><span>Alamat</span> : <?php echo $row['alamat_pemesan'] ?? ""; ?></a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="details_item">
                         <h4>Alamat Pengirim</h4>
                         <ul class="list">
                             <li><a href="#"><span>Jalan</span> : Jl.Nurul Hidayah</a></li>
                             <li><a href="#"><span>Kelurahan</span> : Kelapa Dua Wetan</a></li>
                             <li><a href="#"><span>Kecamatan</span> : Ciracas</a></li>
                             <li><a href="#"><span>Kota </span> : Jakarta Timur</a></li>
                         </ul>
                     </div>
                 </div>
             </div>
             <div class="order_details_table">
                 <h2>Detail Informasi</h2>
                 <div class="table-responsive">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th scope="col">Produk</th>
                                 <th scope="col">Harga</th>
                                 <th scope="col">Quantity</th>
                                 <th scope="col">Total Harga</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>
                                     <p><?php echo $row['nama_produk'] ?? ""; ?></p>
                                 </td>
                                 <td>
                                     <p>Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                                 </td>
                                 <td>
                                     <h5>x 0<?php echo $row['qty'] ?? ""; ?></h5>
                                 </td>
                                 <td>
                                     <p>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></p>
                                 </td>
                             </tr>
                             <tr>
                                 <td>
                                     <h4>Total</h4>
                                 </td>
                                 <td>
                                     <h5></h5>
                                 </td>
                                 <td>
                                     <p></p>
                                 </td>
                                 <td>
                                     <p>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></p>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         <?php
            }
            ?>
     </div>
 </section>
 <!--================End Order Details Area =================-->

 <hr>

 <?php
    include_once 'templates/footer.php';
    ?>