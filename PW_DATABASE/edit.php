<?php
include 'config/koneksi.php';

// Ambil data berdasarkan NPM dari URL
$npm = $_GET['npm'];
$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
$row = mysqli_fetch_assoc($data);

// Jika form disubmit
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE mahasiswa SET 
        nama='$nama',
        jenis_kelamin='$jenis_kelamin',
        umur='$umur',
        alamat='$alamat',
        email='$email'
        WHERE npm='$npm'");

    header("Location: output.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <label>NPM (Tidak bisa diubah)</label><br>
        <input type="text" value="<?= $row['npm']; ?>" disabled><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br><br>

        <label>Jenis Kelamin</label><br>
        <select name="jenis_kelamin" required>
            <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
        </select><br><br>

        <label>Umur</label><br>
        <input type="number" name="umur" value="<?= $row['umur']; ?>" required><br><br>

        <label>Alamat</label><br>
        <input type="text" name="alamat" value="<?= $row['alamat']; ?>" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="<?= $row['email']; ?>" required><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>