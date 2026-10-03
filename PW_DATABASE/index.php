<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Mahasiswa</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>

    <form action="output.php" method="POST">
        <label>NPM:</label><br>
        <input type="text" name="npm" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Jenis Kelamin:</label><br>
        <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jk" value="Perempuan" required> Perempuan
        <br><br>

        <label>Umur:</label><br>
        <input type="number" name="umur" required><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Kirim</button>
    </form>

</body>
</html>