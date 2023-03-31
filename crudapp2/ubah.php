<?php

require 'controler.php';
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$student = query("SELECT * FROM students WHERE id = $id")[0]; 


if( isset( $_POST ["submit"] ) ){
    
    if( ubah($_POST) > 0){
        echo "<script> 
        alert('Data berhasil diubah'); 
        document.location.href ='index.php'
        </script>";
    }else{
        
        echo  "<script> 
        alert('Data data gagal diubah'); 
        document.location.href ='index.php'
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
      html{
          background-image: linear-gradient(to right, #DECBA4, #3E5151);
           display:flex;
            justify-content:center;
           
            height: 250px;
            width:100%;
             
            margin-top:100px;
        }
         img{
            width:150px;
            display:flex;
            justify-content:center;
            margin-left:auto;
            margin-right:auto;
    
        }
        .aa{
            color:#fff;
            text-decoration:none;
        }
        .card{
          /* padding-top:100px; */
          background-color:#fff;
          margin-bottom:100px; 
          
        }

        
    </style>

    <title>Edit</title>
</head>
<body>
    

      <div class="card" style="width: 35rem;">
          <div class="card-body">
          <h1>Ubah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $student["id"];?>"> 
    <input type="hidden" name="gambarLama" value="<?= $student["gambar"];?>"> 

     <div class="mb-3">
        <label for="nama">Nama :</label>
        <input type="text" class="form-control" name="nama" id="nama" required 
        value="<?= $student["nama"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="nis">Nis :</label>
        <input type="text" class="form-control" name="nis" id="nis" required 
        value="<?= $student["nis"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="rombel">Rombel :</label>
        <input type="text" class="form-control" name="rombel" id="rombel" required 
        value="<?= $student["rombel"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="rayon">Rayon :</label>
        <input type="text" class="form-control" name="rayon" id="rayon"  required 
        value="<?= $student["rayon"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="status">Status :</label>
        <input type="text" class="form-control" name="status" id="status" required 
        value="<?= $student["status"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="hobi">Hobi :</label>
        <input type="text"  class="form-control"name="hobi" id="hobi" required 
        value="<?= $student["hobi"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="alamat">Alamat :</label>
        <input type="text"  class="form-control"name="alamat" id="alamat" required 
        value="<?= $student["alamat"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="merk_laptop">Merk Laptop :</label>
        <input type="text"  class="form-control"name="merk_laptop" id="merk_laptop" required 
        value="<?= $student["merk_laptop"]; ?>">
        <br>
        </div>
        <div class="mb-3">
        <label for="cita_cita">Cita -Cita :</label>
        <input type="text" class="form-control" name="cita_cita" id="cita_cita" required 
        value="<?= $student["cita_cita"]; ?>">
        <br>
        </div>
        <label for="gambar">gambar :</label><br>
        <img src="img/<?= $student['gambar']; ?>" width="100px"><br>
        <input type="file" class="form-control" name="gambar" id="gambar">
        <br>
        <br>
        <button type="submit" name="submit" class="text-white btn bg-secondary  bg-gradient">Updet</button>
        

    </form>
    </div>
</div> 


</body>
</html>
