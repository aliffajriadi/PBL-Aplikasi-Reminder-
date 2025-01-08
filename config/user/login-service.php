<?php
// Psuecode Alur fitur login pada aplikasi kami
// MULAI

// JIKA form login sudah disubmit (isset POST['login']):
// Ambil data input
// $username = DAPATKAN 'username' dari request POST
// $password = DAPATKAN 'password' dari request POST

// Membersihkan dan mengamankan input untuk mencegah SQL injection
// $username = bersihkan dan amankan username
// $password = bersihkan password

// Menyiapkan query SQL untuk mendapatkan data pengguna dari database
// QUERY SQL: PILIH id, username, is_guru, password, foto_profil, email, telp 
// DARI users DIMANA username = ? ATAU email = ?
// Jalankan query dengan parameter username dan username

// Periksa apakah query mengembalikan data pengguna
// JIKA query mengembalikan hasil:

    // Ambil data pengguna (id, username, password, is_guru, foto_profil, email, telp)
    // $data_pengguna = AMBIL data pengguna

    // Periksa apakah password yang dimasukkan cocok
    // JIKA password cocok (menggunakan password_verify):

        // Mulai sesi
        // Mulai sesi

        // Simpan data pengguna ke dalam variabel sesi
        // Simpan 'username' dalam sesi
        // Simpan 'id_user' dalam sesi
        // Simpan 'role' dalam sesi berdasarkan 'is_guru' (jika 0 => 'murid', selain itu => 'guru')
        // Simpan 'foto_profil' dalam sesi
        // Simpan 'telp' dalam sesi
        // Simpan 'email' dalam sesi

        // Alihkan pengguna ke halaman dashboard
        // Alihkan ke halaman dashboard

    // LAIN:

        // Password salah, tampilkan pesan kesalahan dan alihkan ke halaman login
        // Tampilkan pesan: "Username atau password salah!"
        // Alihkan ke halaman login

// LAIN:

    // Username atau email tidak ditemukan di database, tampilkan pesan kesalahan dan alihkan ke halaman login
    // Tampilkan pesan: "Username atau email tidak ditemukan!"
    // Alihkan ke halaman login

// SELESAI

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

