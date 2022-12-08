<?php
if (!isset($_GET['id'])) {
  echo require_once("404.php");
  }else{
    
  }
?>
<?php
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        include "koneksi.php";
    foreach ($_GET as $key => $id) {
    $data2 =$_GET[$key] = base64_decode(urldecode($id));
  //return my data value
    $encrypt_2=($data2);
    $query    =mysqli_query($conn, "SELECT * FROM produk WHERE id_brg='$encrypt_2'");
    $result    =mysqli_fetch_array($query);
   }  if (is_null($result)) {
     echo require_once("404.php");
     }else{           
      include 'actionproduk_detail.php';

}      }
?>
