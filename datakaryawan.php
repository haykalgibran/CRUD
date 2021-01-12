<?php
  //koneksi database
  $server   = "localhost";
  $user     = "root";
  $pass     = "";
  $database = "datakaryawan";

  $koneksi = mysqli_connect($server,$user,$pass,$database) or die (mysqli_error($koneksi));

  if(isset($_POST['bsimpan'])){

    //pengujian apakah data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit"){
      //data akan di edit
      $edit = mysqli_query($koneksi, "UPDATE dt_karyawan set 
                                      Nama = '$_POST[tnama]', 
                                      Idkaryawan = '$_POST[tid]', 
                                      Gaji = '$_POST[tgaji]', 
                                      LokasiKerja = '$_POST[tlokasi]' 
                                      WHERE Idkaryawan = '$_GET[id]' ");
    if($edit){ //jika edit sukses
      echo "<script>
            alert('Edit data Sukses!');
            document.location='datakaryawan.php';
            </script>";
    }
    else{
      echo "<script>
      alert('Edit data GAGAL!!');
      document.location='datakaryawan.php';
      </script>";
    }
    }
    else{
      //data akan disimpan baru
      $simpan = mysqli_query($koneksi, "INSERT INTO dt_karyawan (Nama,Idkaryawan,Gaji,LokasiKerja) 
        VALUES ('$_POST[tnama]', 
                '$_POST[tid]', 
                '$_POST[tgaji]', 
                '$_POST[tlokasi]') 
                ");
    if($simpan){ //jika simpan sukses
      echo "<script>
            alert('Simpan data Sukses!');
            document.location='datakaryawan.php';
            </script>";
    }
    else{
      echo "<script>
      alert('Simpan data GAGAL!!');
      document.location='datakaryawan.php';
      </script>";
    }
    }

    
  }
  //pengujian jika tombol Edit / Hapus Bekerja
  if(isset($_GET['hal'])){

    // edit data
    if($_GET['hal'] == "edit"){
    // tampilkan data yang akan di edit
    $tampil = mysqli_query($koneksi, "SELECT * FROM dt_karyawan WHERE Idkaryawan = '$_GET[id]' ");
    $data   = mysqli_fetch_array($tampil);
    if($data){
      //jika data ditemukan, maka data di tampung ke dalam variabel
      $vnama    = $data['Nama'];
      $vid      = $data['Idkaryawan'];
      $vgaji    = $data['Gaji'];
      $vlokasi  = $data['LokasiKerja'];
      }
    }
    else if ($_GET['hal'] == "hapus"){
      
      $hapus = mysqli_query($koneksi, "DELETE FROM dt_karyawan WHERE Idkaryawan = '$_GET[id]' ");
      if($hapus){
        echo "<script>
        alert('Hapus data SUKSES!!');
        document.location='datakaryawan.php';
        </script>";

      }

    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title mt-3>Data Karyawan</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="datakaryawan.php">Data Karyawan<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>  
       
      <div class="container">
        <h1 class="text-center">Data Karyawan</h1>

        <!--Form Data Karyawan-->
        <div class="card mt-3">
          <div class="card-header bg-dark text-white">
            Form Data Karyawan
          </div>
          <div class="card-body">
            <form method="post" action="">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan Nama anda Disini!" required>
              </div>
              <div class="form-group">
                <label>ID Karyawan</label>
                <input type="text" name="tid" value="<?=@$vid?>" class="form-control" placeholder="Input ID Karyawan anda Disini!" required>
              </div>
              <div class="form-group">
                <label>Gaji</label>
                <input type="number" name="tgaji" value="<?=@$vgaji?>" class="form-control" placeholder="Input Gaji anda Disini!" required>
               </div>
              <div class="form-group">
                <label>Lokasi Kerja</label>
                <textarea class="form-control" name="tlokasi" placeholder="Input Lokasi Kerja anda Disini!"><?=@$vlokasi?></textarea>
              </div>
              <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
              <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
          </form>
        </div>
        <!--Form Data Karyawan-->

        <!--Tabel Karyawan-->
        <div class="card mt-5">
          <div class="card-header bg-dark text-white">
           Data Karyawan
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>ID Karyawan</th>
                <th>Gaji</th>
                <th>Lokasi Kerja</th>
                <th>Aksi</th>
              </tr>
              <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * FROM dt_karyawan order by Idkaryawan");
                while($data = mysqli_fetch_array($tampil)){
              ?>
              <tr>
                <td><?=$no++;?></td>
                <td><?=$data['Nama']?></td>
                <td><?=$data['Idkaryawan']?></td>
                <td><?=$data['Gaji']?></td>
                <td><?=$data['LokasiKerja']?></td>
                <td>
                  <a href="datakaryawan.php?hal=edit&id=<?=$data['Idkaryawan']?>" class="btn btn-warning">Edit</a>
                  <a href="datakaryawan.php?hal=hapus$id=<?=$data['Idkaryawan']?>" onclick="return confirm('Apakah Anda yakin ingin mengahapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
              <?php } //penutup perulangan while?>
            </table>
        </div>
        <!--Tabel Karyawan-->
        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>