<?php
include('koneksi.php');
if (isset($_POST['register'])){
    
    $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
    $convert = $_POST['password'];
    $md5 =md5($convert);
    $nama_user = filter_input(INPUT_POST, 'nama_user', FILTER_SANITIZE_STRING);
    $telp = $_POST['telp'];
    $provinsi = filter_input(INPUT_POST, 'provinsi', FILTER_SANITIZE_STRING);
    $kabupaten = filter_input(INPUT_POST, 'kabupaten', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $kode_pos = filter_input(INPUT_POST, 'kode_pos', FILTER_SANITIZE_STRING);
    $lokasi = $_POST['lokasi'];
    $level = $_POST['level'];
    $jumlah_digit_handphone = strlen(substr($telp, 3));
                    //script validasi data
                       $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE username='$username'"));
                        if ($cek > 0){
                        echo "<script>window.alert('Maaf email yang sudah ada!')
                        window.location='route.php?p=register'</script>";
                        } else{

                    // nomor handphone yang ditampilkan jika berjumlah 9 digit
                    if ($jumlah_digit_handphone == 9) {
                        $tampil_handphone = "62" . substr($telp, 3, 3) . "" . substr($telp, 6, 3) . "" . substr($telp, 9, 3);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 10 digit
                    if ($jumlah_digit_handphone == 10) {
                        $tampil_handphone = "62" . substr($telp, 3, 3) . "" . substr($telp, 6, 4) . "" . substr($telp, 10, 3);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 11 digit
                    if ($jumlah_digit_handphone == 11) {
                        $tampil_handphone = "62" . substr($telp, 3, 3) . "" . substr($telp, 6, 4) . "" . substr($telp, 10, 4);
                    }
                    // nomor handphone yang ditampilkan jika berjumlah 12 digit
                    if ($jumlah_digit_handphone == 12) {
                        $tampil_handphone = "62". substr($telp, 3, 3) . "" . substr($telp, 6, 4) . "" . substr($telp, 10, 5);
                    }
                    // validasi inputan nomor handphone
                    if (!preg_match("/^[0-9|(\+|)]*$/", $telp) OR strlen(strpos($telp, "+", 1)) > 0) {
                        echo"<script>alert('Handphone hanya boleh menggunakan angka dan diawali simbol +');</script>";
                        
                    } 

                    else if (substr($telp, 0, 3) != "+62" ) {
                        echo"<script>alert('Handphone harus diawali dengan kode negara +62');</script>";
                    }
                    else if (substr($telp, 3, 1) == "0" ) {
                        echo "<script>alert('Handphone tidak boleh diikuti dengan angka 0 setelah kode negara');</script>";
                    }
                    else if(strlen($_POST['telp']) != 14) {
                            echo"<script>alert('NO HP harus berjumlah 12 angka');</script>";
                    }
                    else {
                        //script untuk proses registrasi
                        $conn=mysqli_query($conn,"INSERT INTO users VALUES
                        (null,'$username','$md5', '$nama_user', '$tampil_handphone', '$provinsi', '$kabupaten', '$alamat', '$kode_pos', '$lokasi', '$level')");
                        // echo"<script>alert('$tampil_handphone');</script>";
                        echo "<script>window.alert('Pendaftaran Berhasil!')
                        window.location='route.php?p=login'</script>";
                        }
                      }
                    }
?>