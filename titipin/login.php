<?php
include "koneksi.php";
session_start();

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if($row['password'] == $password){
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['user_role'] = $row['role'];

            echo "Login berhasil!";

            // Redirect berdasarkan role
            if($_SESSION['user_role'] == 'admin'){
                header("Location: admin/dashboard.php");
            }
            elseif($_SESSION['user_role'] == 'jastiper'){
                header("Location: jastiper.php");
            }
            else{
                header("Location: customer.php");
            }

            exit();

        }else{
            echo "Password salah!";
        }

    }else{
        echo "Email tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .login a {
            color: #df298d;
            margin-left: 5px;
        }
        .button {
            background-color: #df298d;
            color: #ffffff;
        }

    </style>
</head>
<body>
    
    <div class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input class="button" type="submit" name="submit" value="Login">
            <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </form>
    </div>
</body>
</html>