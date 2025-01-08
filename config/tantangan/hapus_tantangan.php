<?php
    include '../koneksi.php';
    include '../session.php';

    // mengambil id tantangan dari variable post
    $id_tantangan = $_POST['id_tantangan'];

    // menginisiasi variable execute
    $execute = false;

    // jika role adalah guru maka data yang akan dihapus adalah data di tabel tantangan
    // jika role adalah murid maka data yang akan di hapus adalah data di tabel tantangan_stat
    if($role === "guru") 
    {
        $execute = mysqli_query($conn, "DELETE FROM tantangan WHERE id_tantangan = $id_tantangan");
    }else{
        $execute = mysqli_query($conn, "DELETE FROM tantangan_stat WHERE id_tantangan = $id_tantangan AND id_user = $id_user");
    }

    // setelah query dijalankan
    // jika berhail maka akan muncul alert berhasil
    // jika gagal maka akan muncul alert gagal
    // setelah itu akan dipindahkan ke halaman tantangan
    if($execute){
        echo "<script>alert('tantangan berhasil di hapus');
        window.location='../../tantangan'</script>";
    }else{
        echo "<script>alert('tantangan gagal di hapus');
        window.location='../../tantangan'</script>";
    }
    // setelah selesai maka akan diarahkan ke halaman tantangan
?>