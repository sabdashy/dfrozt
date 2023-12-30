 <?php
    include_once 'templates/head.php';
    include_once 'templates/navbar.php';
    require_once '../dbkoneksi.php';
    ?>
 <?php
    $_idbeli = $_GET['idbeli'];
    if (!empty($_idbeli)) {
        // beli
        $sql = "SELECT * FROM produk WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_idbeli]);
        $row = $st->fetch();
    } else {
        // new data
        $row = [];
    }
    ?>
 <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
     <div class="container">
         <div class="row no-gutters slider-text align-items-center justify-content-center">
             <div class="col-md-9 ftco-animate text-center">
                 <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span>Checkout</span></p>
                 <h1 class="mb-0 bread">Checkout</h1>
             </div>
         </div>
     </div>
 </div>

 <section class="ftco-section">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-8 ftco-animate">
                 <form method="POST" action="proses.php" class="billing-form">
                     <h3 class="mb-4 billing-heading">Pemesanan</h3>
                     <div class="row align-items-end">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="nama_produk">Nama Produk</label>
                                 <input type="text" name="nama_produk" class="form-control" placeholder="" value="<?= $row['nama'] ?? "" ?>" readonly>
                             </div>
                         </div>
                         <div class="w-100"></div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="qty">Quantity</label>
                                 <input type="number" name="qty" class="form-control" placeholder="" value="1">
                             </div>

                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="tanggal">Tanggal</label>
                                 <input type="date" name="tanggal" class="form-control" placeholder="0" value="<?= date('Y-m-d') ?>" readonly>
                             </div>
                         </div>
                         <div class="w-100"></div>
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="harga">Harga per 100g</label>
                                 <input type="text" id="harga" name="harga" class="form-control" placeholder="" value="<?= $row['harga'] ?? "" ?>" readonly>
                             </div>
                         </div>
                         <div class="w-100"></div>
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="nama_pemesan">Nama Pemesan</label>
                                 <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" placeholder="" value="">
                             </div>
                         </div>
                         <div class="w-100"></div>
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label for="alamat_pemesan">Alamat Pemesan</label>
                                 <input type="text" id="alamat_pemesan" name="alamat_pemesan" class="form-control" placeholder="" value="">
                             </div>
                         </div>
                         <div class="w-100"></div>
                     </div>
                     <p><input type="submit" name="proses" value="Simpan" class="btn btn-primary py-3 px-4"></a></p>
                 </form><!-- END -->
             </div>
         </div>
     </div>
 </section> <!-- .section -->

 <?php
    include_once 'templates/footer.php';
    ?>