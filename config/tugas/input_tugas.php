<?php 

    include "../koneksi.php";
    include "../session.php";

    // mengambil data dari variabel post
    $judul_tugas = $_POST["judul_tugas"] ;
    $isi_tugas = $_POST["isi_tugas"];
    $tanggal_pengingat = $_POST["tanggal_pengingat"];
    $jam_pengingat = $_POST["waktu_pengingat"];

    // mengeksekusi query
    $execute = mysqli_query($conn, "INSERT INTO tugas(judul_tugas, isi_tugas, tanggal_pengingat, waktu_pengingat, status_tugas, id_user) 
    VALUES ('$judul_tugas', '$isi_tugas', '$tanggal_pengingat', '$jam_pengingat', 0, '$id_user')");

    // mengecek apakah query dijalankan dengan aman atau tidak
    // jika iya maka akan muncul alert berhasil dibuat
    // jika gagal akan muncul alert gagal dibuat
    if($execute){
        $time = strtotime($tanggal_pengingat . "" . $jam_pengingat);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.fonnte.com/send',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array(
        'target' => "62$telp",
        'message' => "Hai $nama_user,kamu ada tugas nich!!!\njudul tugas = $judul_tugas\nisi tugas = $isi_tugas",
        'schedule' => $time - (6 * 60 * 60),
        ),
          CURLOPT_HTTPHEADER => array(
            'Authorization:  iRAvBva1iqWf4oD4C4jD'
          ),
        ));
        
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
          $error_msg = curl_error($curl);
        }
        curl_close($curl);
        
        if (isset($error_msg)) {
         echo $error_msg;
        }
        echo $response;

        // echo date("Y-m-d H:i:s", $time);

        echo "<script>alert('tugas berhasil di input.');
        window.location='../../tugas';
        </script>";
    }else{
        echo "<script>alert('tugas gagal di input');
        window.location='../../tugas';
        </script>";
    }
    // seletah selesai maka akan diarahkan ke halaman tugas


?>