<?php
include "../koneksi.php";
include "../session.php";


// mengambil data dari variabel POST 
$username_ubah = mysqli_real_escape_string($conn, $_POST['username']);
$email_ubah = mysqli_real_escape_string($conn, $_POST['email']);
$telp_ubah = mysqli_real_escape_string($conn, $_POST['telp']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// mengambil data dari file foto baru yang telah diupload
$foto_profil = $_FILES['foto_profil']['name'];
$foto_profil_tmp = $_FILES['foto_profil']['tmp_name'];
$foto_profil_error = $_FILES['foto_profil']['error'];

// mengambil data foto lama
$current_foto_profil = $_SESSION['foto_profil'];

if ($foto_profil_error == 0) {
    $upload_dir = "../../asset/uploads/profiles/";
    $foto_profil_path = $upload_dir . basename($foto_profil);

    // memindahkan file yang diupload
    if (move_uploaded_file($foto_profil_tmp, $foto_profil_path)) {
    } else {
        echo "Terjadi kesalahan saat mengunggah foto profil.";
        exit();
    }
} else {
    $foto_profil_path = $current_foto_profil;
}


// syarat apakah usename tersebut sudah digunakan
$syarat1 = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username_ubah'");

if(mysqli_num_rows($syarat1) > 0 && $username_ubah !== $nama_user){
    echo "<script>alert('Username sudah digunakan!');
    window.location='../../profile';</script>";
}


// syarat apakah email tersebut sudah digunakan
$syarat2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email_ubah'");

if(mysqli_num_rows($syarat2) > 0 && $email_ubah !== $email){
    echo "<script>alert('email sudah digunakan!');
    window.location='../../profile';</script>";
}


// syarat apakah no telp tersebut sudah digunakan
$syarat3 = mysqli_query($conn, "SELECT * FROM users WHERE telp = '$telp_ubah'");

if(mysqli_num_rows($syarat3) > 0 && $telp_ubah !== $telp){
    echo "<script>alert('No Telp. sudah digunakan!');
    window.location='../../profile';</script>";
}


// jika variable password ada dan variable password memiliki nilai yang sama dengan confirm password
// bakal mengubah isi password dari akun user
if (!empty($password) && $password === $confirm_password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $update_password_query = "UPDATE users SET password = '$hashed_password' WHERE id = '$id_user'";
    mysqli_query($conn, $update_password_query);
}


// menginisiasi query
$update_query = "UPDATE users SET username = '$username_ubah', email = '$email_ubah', foto_profil = '$foto_profil_path', telp = $telp_ubah WHERE id = '$id_user'";


// mengeksekusi query
// jika berhasil akan muncl alert berhasil
// jika gagal akan muncul alert gagal
if (mysqli_query($conn, $update_query)) {

    $query = $conn->prepare("SELECT id, username, is_guru, password, foto_profil, email, telp FROM users WHERE username = ?");
    $query->bind_param("s", $username_ubah );
    $query->execute();
    $result = $query->get_result();

    // jika tidak terdapat data akun 
    if ($result->num_rows < 1) {
        echo "<script>alert('Gagal mengatur ulang session');
        window.location='../../profile';</script>";      
    }   

    $row = $result->fetch_assoc();

    $_SESSION['username'] = $row['username'];
    $_SESSION['id_user'] = $row['id'];
    $_SESSION['role'] = $row['is_guru'] === 0 ? 'murid' : 'guru';
    $_SESSION['foto_profil'] = $row['foto_profil'];
    $_SESSION['telp'] = $row['telp'];
    $_SESSION['email'] = $row['email'];


    echo "<script>alert('Profil berhasil diperbarui');
            window.location='../../profile';</script>";            
} else {
    echo "<script>alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
            window.location='../../profile';</script>";
           
}
// setelah itu dipindahkan ke halaman profile kembali
?>