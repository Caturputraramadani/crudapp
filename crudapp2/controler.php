<?php
$conn = mysqli_connect("localhost", "root", "", "testing");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while($baju = mysqli_fetch_assoc($result)){
        $wadah[] =$baju;
    }
    return $wadah;
}

function tambah($data){
    global $conn;
    $nama = htmlspecialchars ( $data["nama"] );
    $nis = htmlspecialchars ( $data["nis"] );
    $rombel = htmlspecialchars ( $data["rombel"]);
    $rayon =  htmlspecialchars ( $data["rayon"] );
    $status = htmlspecialchars ( $data["status"]) ;
    $hobi = htmlspecialchars ( $data["hobi"]) ;
    $alamat = htmlspecialchars ( $data["alamat"]) ;
    $merk_laptop = htmlspecialchars ( $data["merk_laptop"]) ;
    $cita_cita = htmlspecialchars ( $data["cita_cita"]) ;
    
    // upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO students VALUES ('', '$nama', '$nis', '$rombel', '$rayon', '$status', '$hobi', '$alamat', '$merk_laptop', '$cita_cita', '$gambar') ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);




}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada gambar yang di upload
    if ($error === 4){
        echo " 
        <script>
        alert('pilih gambar terlebih dahulu'); 
        </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if(  !in_array($ekstensiGambar, $ekstensiGambarValid) ){
         echo " 
        <script>
        alert('yang anda upload bukan gambar'); 
        </script>
        ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000){
         echo " 
        <script>
        alert('ukuran gambar terlalu besar'); 
        </script>
        ";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/'. $namaFileBaru );

    return $namaFileBaru;


}



function hapus ($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM students WHERE id = $id");
    return mysqli_affected_rows($conn);
 }


function ubah($data){
    global $conn;
    $id= $data["id"];
    $nama = htmlspecialchars ( $data["nama"] );
    $nis = htmlspecialchars ( $data["nis"] );
    $rombel = htmlspecialchars ( $data["rombel"]);
    $rayon =  htmlspecialchars ( $data["rayon"] );
    $status = htmlspecialchars ( $data["status"]) ;
    $hobi = htmlspecialchars ( $data["hobi"]) ;
    $alamat = htmlspecialchars ( $data["alamat"]) ;
    $merk = htmlspecialchars ( $data["merk_laptop"]) ;
    $cita = htmlspecialchars ( $data["cita_cita"]) ;
    $gambarLama =  htmlspecialchars ( $data["gambarLama"] );
    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES ['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload() ;
    }

    $query = "UPDATE students SET 
    nama = '$nama',
    nis = '$nis',
    rombel = '$rombel',
    rayon = '$rayon',
    status = '$status',
    hobi = '$hobi',
    alamat = '$alamat',
    merk_laptop = '$merk',
    cita_cita = '$cita',
    gambar = '$gambar'

    WHERE id = $id

    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
} 

function cari($keyword){
    $query = "SELECT * FROM students WHERE 
    nama LIKE '%$keyword%' OR
    nis LIKE '%$keyword%' OR
    rombel LIKE '%$keyword%' OR
    rayon LIKE '%$keyword%' OR
    status LIKE '%$keyword%' 
    
    ";
    return query($query);
}

function registrasi ($data){
    global $conn;

    $username = strtolower (stripslashes ($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE 
    username = '$username' ");
    if (mysqli_fetch_assoc ($result)){
        echo " 
        <script>
        alert('username sudah terpakai'); 
        </script>
        ";
        return false;
    }

    // konfirmasi password
    if( $password !== $password2){
         echo " 
        <script>
        alert('konfirmasi password tidak sesuai!'); 
        </script>
        ";
        return false;
    }
    
    // enkripsi password
    $password = password_hash( $password, PASSWORD_DEFAULT);


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>