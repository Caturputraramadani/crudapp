<?php

require 'controler.php';

if( isset( $_POST ["register"])){
    
    if(registrasi ($_POST) > 0){
        echo "<script> 
        alert('User baru berhasil ditambahkan!'); 
        </script>";
    }else{
        echo mysqli_error($conn);
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet" />
       <link rel="stylesheet" href="style.css" />
</head>
<body>



    <section class="hero">
        <div class="content">
        <h1>Daftar Siswa Pengembangan Perangkat Lunak dan Gim X<span></span></h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure libero neque vero similique consequatur nemo perspiciatis? Odit non ratione fuga dolor amet officia. Libero pariatur tenetur ducimus magni? Maxime, possimus.
        </p>
        </div>
    <div class="halaman">
        <div class="container">
            
                 <div class="card" style="width: 35rem;">
                 <div class="card-body">
                     <h1 class="card-title" style="text-align: center;">Registrasi</h1>

                    <form action="" method="post">
       
            <div class="mb-3">
                <label for="username" class="form-label">username :</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">konfirmasi password :</label>
                <input type="password" class="form-control" name="password2" id="password2">
            </div>
             <div class="btn">
                <button type="submit" class="text-white btn bg-secondary bg-gradient"  name="register"> Register !</button>
                <button type="button" class="btn bg-secondary bg-gradient"><a class="aa" href="Login.php">Login</a></button>
           </div>
       
    </form>

                 </div>
                </div>
            
        </div>
    </div>
    </section>
     <footer>
      <div class="credit">
        <p>Created by <a href="">Catur Putra Ramadani</a>. | &copy; 2023.</p>
      </div>
    </footer>
  
</body>

</html>


   
   