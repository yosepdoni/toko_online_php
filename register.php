  
<br>
<br>
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
<?php
// KONEKSI DATABASE
include('koneksi.php');
// TAMPILKAN DATA BARANG DAN HARGA
?>
<div class="container">
	<center><img src="https://img.icons8.com/ios-filled/2x/user-male-circle.png" alt=""></center>
	<h4 class="text-center">Sign Up</h4>
		<form action="" method="POST">
		<div class="mb-3">
			<label for="nama" class="form-label">Nama Lengkap</label>
			<input type="text" name="nama_user" class="form-control" id="nama" placeholder="Nama Lengkap" required>
		</div>
		<div class="mb-3">
			<label for="email" class="form-label">Email address</label>
			<input type="email" name="username" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>
		<div class="mb-3">
			<label for="pwd" class="form-label">Password</label>
			<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required>
			<input type="hidden" name="level" class="form-control" id="level" value="user" required>
		</div>
		<div class="mb-3">
			<label for="telp" class="form-label">Telepon</label>
			<input type="text" name="telp" class="form-control" id="telp" placeholder="+62xxxxxxxxxxxx"  required>
		</div>
		<div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <select class="form-select" aria-label="Default select example" name="provinsi" id="provinsi" autofocus>
                <option selected>Pilih</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kab/Kota</label>
            <select class="form-select" aria-label="Default select example" name="kota" id="kota">
                <option>Pilih</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kecamatan</label>
            <select class="form-select" aria-label="Default select example" name="kecamatan" id="kecamatan">
                <option>Pilih</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Kelurahan</label>
            <select class="form-select" aria-label="Default select example" name="kelurahan" id="kelurahan">
                <option>Pilih</option>
            </select>
        </div>
		<div class="mb-3">
			<label for="alamat" class="form-label">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control"  placeholder="Alamat Lengkap" style="width: 100%;height: 150px; padding: 12px 20px;resize: none;"></textarea>

		</div>
		<div class="mb-3">
			<label for="kodepos" class="form-label">Kode POS</label>
			<input type="number" name="kode_pos" class="form-control" id="kodepos" placeholder="Kode POS" required >
			<input type="hidden" name="lokasi" class="form-control">
		</div>
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="chk">
			<label class="form-check-label" id="lbl" for="chk">Show Password</label>
		</div>
    <div class="mb-3">
    <button type="submit" class="btn btn-primary" name="register"><i class="fa fa-sign-in-alt"> Sign Up</i></button>
    </div>
    <div class="mb-3">
      <a href="" onclick="new.window.open('Lupa password')" style="text-decoration:none; color:blue;"><i>Forget your password?</i></a><br>
      Have an account?<a href="route.php?p=login" style="text-decoration:none; color:blue;"> <i>Login</i></a>
    </div>
		</form>
		 <script>
        fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>Pilih</option>`;
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kota").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://yosepdoni.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>
	</div>

<!-- <script language="javascript" type="text/javascript">
function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    }
}
</script> -->