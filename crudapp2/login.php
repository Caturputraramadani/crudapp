<?php
session_start();

require 'controler.php';

// cek cookie
if( isset($_COOKIE ['id']) && isset($_COOKIE ['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE ['key'];

    // ambi; username berdasarkan id
    $result = mysqli_query($conn, " SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location:index.php");
    exit;
}



if(isset ($_POST ["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE 
    username = '$username' ");

    // cek username
    if(mysqli_num_rows($result) === 1 ){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember'])){
                // buat cookie

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header ("Location:index.php");
            exit;
        }
    }

    $error = true;

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
                     <h1 class="card-title" style="text-align: center;">Login</h1>
    
    <?php if (isset ($error)) : ?>
        <p style="color: red; font-style:italic;">username/password salah!</p>
    <?php endif ; ?>  

    

    <form action="" method="post">
        
            <div class="mb-3">
                <label for="username" class="form-label">Username :</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label for="remember"  class="form-check-label" class="form-label"  class="form-control">Remember me </label>
            </div>

            <div class="btn">
                <button type="submit" class="text-white btn bg-secondary bg-gradient" name="login">Sign in</button>
                <button type="button" class="btn bg-secondary bg-gradient"><a class="aa" href="registrasi.php">Sign up</a></button>
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


   
   