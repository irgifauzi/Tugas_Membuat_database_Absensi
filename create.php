<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nama=input($_POST["nama"]);
        $kampus=input($_POST["kampus"]);
        $jurusan=input($_POST["jurusan"]);
        $jurusan=input($_POST["kehadiran"]);

        //Query input menginput data kedalam tabel anggota
        $sql="INSERT INTO peserta (nama,kampus,jurusan,kehadiran) VALUES
		('$nama','$kampus','$jurusan','$kehadiran')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql); 
         
        

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Kampus:</label>
            <input type="text" name="kampus" class="form-control" placeholder="Masukan nama kampus" required/>
        </div>
       <div class="form-group">
            <label>Jurusan :</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>
        <div class="form-group">
            <label>kehadiran :</label>
            <input type="text" name="kehadiran" class="form-control" placeholder="Masukan kehadiran" required/>
        </div>
                </p>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>