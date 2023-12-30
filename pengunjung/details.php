 <?php
    include_once 'templates/head.php';
    include_once 'templates/navbar.php';
    require_once '../dbkoneksi.php';
    ?>
 <?php
    $_iddetails = $_GET['iddetails'];
    if (!empty($_iddetails)) {
        // details
        $sql = "SELECT * FROM produk WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_iddetails]);
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
                 <p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home</a></span> <span class="mr-2"><a href="menu_belanja.php">Menu</a></span> <span>Details Produk</span></p>
                 <h1 class="mb-0 bread">Detail Produk</h1>
             </div>
         </div>
     </div>
 </div>

 <section class="ftco-section">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 mb-5 ftco-animate">
                 <a href="images/product-1.jpg" class="image-popup"><img src="images/product-1.jpg" class="img-fluid" alt="Colorlib Template"></a>
             </div>
             <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                 <h3><?= $row['nama'] ?></h3>
                 <div class="rating d-flex">
                     <p class="text-left mr-4">
                         <a href="#" class="mr-2">5.0</a>
                         <a href="#"><span class="ion-ios-star-outline"></span></a>
                         <a href="#"><span class="ion-ios-star-outline"></span></a>
                         <a href="#"><span class="ion-ios-star-outline"></span></a>
                         <a href="#"><span class="ion-ios-star-outline"></span></a>
                         <a href="#"><span class="ion-ios-star-outline"></span></a>
                     </p>
                     <p class="text-left mr-4">
                         <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                     </p>
                 </div>
                 <p class="price"><span>Rp<?= number_format($row['harga'], 0, ',', '.') ?></span></p>
                 <p>
                     Semua jenis sayuran dan buah - buahan tersedia dengan segar serta terjamin kualitasnya, diambil dari negara
                     maritim yang sangat subur dan makmur tumbuh tumbuhannya yaitu INDONESIA, semua sayuran maupun buah - buahan
                     terawat dengan baik dan benar. Terakhir, kejujuran menjadi patokan kami untuk terus memajukan usaha NF Vegetarian ini.
                 </p>
                 <div class="row mt-4">
                     <div class="col-md-6">
                         <div class="form-group d-flex">
                         </div>
                     </div>
                     <div class="w-100"></div>
                 </div>
                 <p><a class="btn btn-black py-3 px-5" href="checkout.php?idbeli=<?= $row['id'] ?>">Beli</a></p>
                 </form>
             </div>
         </div>
     </div>
 </section>

 <hr>

 <?php
    require_once 'templates/footer.php';
    ?>