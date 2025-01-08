<?php
include '../koneksi.php';

if (isset($_POST['login'])) {
    // mengambil data dari variabel post
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim($_POST['password']);

    // mengambil data berdasarkan username atau email user
    $query = $conn->prepare("SELECT id, username, is_guru, password, foto_profil, email, telp FROM users WHERE username = ? OR email = ?");
    $query->bind_param("ss", $username, $username);
    $query->execute();
    $result = $query->get_result();

    // jika terdapat data akun 
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // mengecek apakah password yang diisi sama atau berbeda
        if (password_verify($password, $row['password'])) {
            // jika sama maka session akan di set
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['id_user'] = $row['id'];
            $_SESSION['role'] = $row['is_guru'] === 0 ? 'murid' : 'guru';
            $_SESSION['foto_profil'] = $row['foto_profil'];
            $_SESSION['telp'] = $row['telp'];
            $_SESSION['email'] = $row['email'];

            echo "<script>window.location='../../dashboard'</script>";
        } else {
            // jika password salah maka akan diarahkan kembali ke halaman login
            echo "<script>
            alert('Username atau password salah!'); 
            window.location.href = '../../login/';
            </script>";
        }
    } else {
        // jika username tidak ditemukan maka akan diarahakan kembali ke halaman login
        echo "<script>
        alert('Username atau email tidak ditemukan!'); 
        window.location.href = '../../login/';
        </script>";
    }
}
?>

