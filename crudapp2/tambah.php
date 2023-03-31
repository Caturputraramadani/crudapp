<?php

require 'controler.php';

if( isset( $_POST ["submit"] ) ){
    
    if( tambah($_POST) > 0){
        echo "<script> alert('Data berhasil ditambahkan!'); document.location.href ='index.php'</script>";
    }else{
        echo  "<script> alert('Data data gagal ditambahkan!'); document.location.href ='index.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width:100px;
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
   
</head>
<body>

    
    <div class="card" style="width: 35rem;">
    <div class="card-body">
            
    <form action="" method="post" enctype="multipart/form-data">

    <h1>Tambah Data Siswa</h1>
        <div class="mb-3">
        <label for="" class="form-label">Nama :</label>
        <input type="text" class="form-control" name="nama" id="nama" >
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Nis :</label>
        <input type="text" class="form-control" name="nis" id="nis">
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Rombel:</label>
        <input type="text" class="form-control" name="rombel" id="rombel">
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Rayon :</label>
        <input type="text" class="form-control" name="rayon" id="rayon">
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Status :</label>
        <input type="text" class="form-control" name="status" id="status">
        </div>
        
        <br>
        <div class="mb-3">
        <label for="" class="form-label">Hobi :</label>
        <input type="text" class="form-control" name="hobi" id="hobi">
        </div>

        <br>
        <div class="mb-3">
        <label for="" class="form-label">Alamat :</label>
        <input type="text" class="form-control" name="alamat" id="alamat">
        </div>

        <br>
        <div class="mb-3">
        <label for="" class="form-label">Merek Laptop :</label>
        <input type="text" class="form-control" name="merk_laptop"  id="merk_laptop">
        </div>

        <br>
        <div class="mb-3">
        <label for="" class="form-label">Cita-cita :</label>
        <input type="text" class="form-control"  name="cita_cita"  id="cita_cita">
        </div>

        <br>
        <div class="mb-3">
        <label for="gambar" class="form-label">Gambar :</label>
        <input type="file" class="form-control" name="gambar" id="gambar" >
        </div>
        <br>
        
        <button type="submit" name="submit"  class="text-white btn bg-secondary bg-gradient">Kirim</button>
    </form>
    </div>
</div>

</body>
</html>