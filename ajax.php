<form>
<div class="row">
    <?php 
        include ('koneksi.php'); 
        $conn=mysqli_query($conn,"SELECT * FROM produk WHERE nm_brg LIKE '%$_GET[nm_brg]%'");
        while($h=mysqli_fetch_array($conn)){
        ?>

<div class="col-6 col-md-2">
  <?php
          $data=$h['id_brg'];

          $encrypt_1=($data);

          //now lets use base64 endcryption
          $link = "produk_detail/?id=".urlencode(base64_encode($encrypt_1));
          ?>
          <a href="<?php base()?><?=$link;?>" class="btn btn-light">
          <img src="assets/image/<?=$h['img']; ?>" class="card-img-top" alt="img" style="width: 180px;height:180px;">
          <div class="card-body">
          <p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($h['nm_brg'], 0,17,); ?> ...</p>
          <p><b> <?="Rp".number_format($h['harga']); ?> </b> </p>
          <p style="color:orange" class="m-1">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          </p>
          <p class="card-text" hidden><?=$h['kategori']; ?></p>
          </div>
          </a>
        </div>
        
<?php
              }      
?>
        </div>
        
        </div>
</form>    