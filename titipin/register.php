<?php
include "koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $No_HP = $_POST['No_HP'];
    $alamat = $_POST['alamat'];
    $role = 'customer';

    $sql = "INSERT INTO users
    (nama,email,password,No_HP,alamat,role)
    VALUES
    ('$nama','$email','$password','$No_HP','$alamat','$role')";

    if(mysqli_query($conn,$sql)){
        echo "Registrasi Berhasil!";
    }else{
        echo "Error: " . mysqli_error($conn);
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
        .registerdiv {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .back-link {
            
            text-align: center;
            margin-bottom: 20px;
            text-decoration: none;
            color: #ffffff;
            background-color: #df298d;
            padding: 10px 20px;
            font-size: 18px;
        }
        .registerdiv input {
            display: block;
            padding: 15px;
            margin: 8px;

        }
        .registerdiv textarea {
            display: block;
            padding: 15px;
            margin: 8px;
            width: 162px;
        }
        .button {
            width: 80%;
            background-color: #df298d;
            color: #ffffff;
        }
        .button:hover {
            background-color: #c1277e;
        }
        h1{
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Form Register</h1>
    <a class="back-link" href="index.php">Back to Home</a>
    <div class="registerdiv">
            <form action="register.php" method="post">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="No_HP" placeholder="Nomor HP" required>
            <textarea name="alamat" placeholder="Alamat" required></textarea>
            <input type="submit" value="Register" class="button">
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>

    </div>
    
</body>
</html> 