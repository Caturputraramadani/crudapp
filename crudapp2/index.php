<?php

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


require 'controler.php';
$students = query( "SELECT * FROM students");

// tombol cari di klik
if (isset ($_POST ["cari"]) ){
    $students = cari($_POST ["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    

    <style>
        html{
            display: flex;
            align-items: center;
            background-image: url("img/header_bg.jpg");
            margin-bottom:none;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            height: 100vh;
          
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
          display:flex;
            justify-content:center;
            width:1000px;
        }

    

    </style> 
</head>
<body>
<div class="position-absolute top-50 start-50 translate-middle">
    <button type="button" class="text-white btn bg-secondary bg-gradient"><a class="aa" href="logout.php">Logout</a></button>
    <br>
    <br>
    <div class="bg-image"></div>
<div class="card" >
     
  <div class="card-body">
    <h1>Daftar Siswa</h1>
    <br>
    <button type="button" class="text-white btn bg-secondary bg-gradient"><a class="aa" href="tambah.php">Tambah data siswa</a></button>
    <br></br>
    <form action="" method="post">
        

<div class="input-group mb-3">
  <input type="text" name="keyword" class="form-control " placeholder="Cari Data" aria-label="Cari Data" aria-describedby="basic-addon2" autocomplete ="off">
  <span class="input-group-text" id="basic-addon2"> <button type="submit" name="cari"  class="text-white btn bg-secondary bg-gradient">Cari</button></span>
</div>
    

    </form>
    <br>
     
   

    <table border="1"  cellpadding="10" cellspacing="0" class="table table-bordered border-dark">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nis</th>
                <th>Rombel</th>
                <th>Rayon </th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1;?>
            <?php foreach($students as $student ) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?=$student["nama"]?></td>
                    <td><?=$student["nis"]?></td>
                    <td><?=$student["rombel"]?></td>
                    <td><?=$student["rayon"]?></td>
                    <td><?=$student["status"]?></td>
                    <td>
                    <button type="button" class="text-white btn bg-secondary bg-gradient"><a class="aa"href="ubah.php?id=<?= $student["id"];?>">ubah</a> </button>
                    <button type="button" class="text-white btn bg-secondary bg-gradient"><a  class="aa"href="hapus.php?id=<?= $student["id"];?>" onclick="return confirm ('yakin?')">hapus</a></button>
                    <button type="button" class="text-white btn bg-secondary bg-gradient"><a  class="aa"href="lihat.php?id=<?= $student["id"];?>">lihat</a></button> 

                    </td>
                </tr>
                <?php $i++;?>
                <?php  }?>
                
                
        </tbody>
    </table>
    </div>
</div>
</div>
</body>
</html>


