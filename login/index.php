<?php 
    session_start();

    if(isset($_SESSION['username'])) {
        header('Location: ../dashboard');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMb0RZ4lfoPim8bLqGgPZimj5CfopBz7vF5y9zW" crossorigin="anonymous">
    <style>
        body{
            background: linear-gradient(to top right, rgb(171, 217, 255),white);
            
        }
        .kiri{
            align-content: center;
            margin-right: 20px;
        }

        .login-container{
            min-width: 400px;
        }

        @media (max-width: 600px) {
            .kanan {
                
                width: auto;
           
            }
            
            .kiri {
                display: none;
            }
        }

    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container text-center">
            <div class="row justify-content-around g-4">

                <div class="col-7 align-items-center kiri">
                    <h2>Selamat Datang, di Aplikasi <b class="text-primary">Livetifity</b></h2>
                    <p>Selamat datang di langkah pertamamu menuju hidup yang lebih terorganisir! Masukkan akun kamu dan mulai nikmati kemudahan mengelola aktivitas untuk produktivitas yang maksimal. Jika kamu belum punya akun mari Daftar sekarang, karena harimu yang lebih baik dimulai di sini!</p>
                    <button onclick="window.location.href='../daftar/'" type="button" class="btn btn-primary">Daftar Sekarang</button>
                </div>

                <div class="col-4 kanan">
                    <div class="login-container border p-4 rounded shadow-sm">
                        <h2 class="text-center mb-4">Login</h2>
                        <form action="../config/user/login-service.php" method="post">
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"
                                        placeholder="Masukkan username" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>
                            <div class="mb-3 form-check text-start">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100"><i class="fas fa-sign-in-alt"></i>
                                Masuk</button>
                        </form>
                        
                        <p class="text-center mt-3">Belum punya akun? <a href="../daftar/" class="link-primary">Daftar Sekarang</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
