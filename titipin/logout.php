<?php
include "koneksi.php";
session_start();

if (isset($_SESSION['id_user'])) {
    header("Location: index.php"); exit();
}

$error = ''; $success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = trim($_POST['nama']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $no_hp    = trim($_POST['No_HP']);
    $alamat   = trim($_POST['alamat']);
    $role     = $_POST['role'] ?? 'customer';
    // Validasi: hanya customer bisa self-register, jastiper butuh kode
    if ($role === 'admin') $role = 'customer';
    if ($role === 'jastiper' && ($_POST['kode_jastiper'] ?? '') !== 'JASTIP2026') {
        $error = "Kode registrasi jastiper salah!";
    } else {
        // Cek email duplikat
        $cek = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
        $cek->bind_param("s", $email);
        $cek->execute();
        if ($cek->get_result()->num_rows > 0) {
            $error = "Email sudah terdaftar!";
        } else {
            $sql  = "INSERT INTO users (nama, email, password, No_HP, alamat, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nama, $email, $password, $no_hp, $alamat, $role);
            if ($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan <a href='login.php'>login</a>.";
            } else {
                $error = "Terjadi kesalahan: " . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar — Titipin</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
:root { --pink-deep: #c2185b; --pink-hot: #e91e8c; --pink-soft: #fce4ec; --dark: #1a0a10; --muted: #9e7080; }
body { font-family: 'DM Sans', sans-serif; background: linear-gradient(135deg, #fff0f5, #fce4ec); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
.auth-wrap { background: white; border-radius: 24px; box-shadow: 0 24px 80px rgba(194,24,91,.18); overflow: hidden; max-width: 520px; width: 100%; }
.auth-header { background: linear-gradient(135deg, #e91e8c, #c2185b); padding: 28px 36px; color: white; }
.auth-header .logo { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 900; margin-bottom: 6px; }
.auth-header h2 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 600; opacity: .85; }
.auth-body { padding: 30px 36px; }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
.form-group { margin-bottom: 14px; }
.form-group label { display: block; font-size: 0.77rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: var(--muted); margin-bottom: 6px; }
.form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px 14px; border: 1.5px solid var(--pink-soft); border-radius: 10px; font-size: 0.88rem; font-family: inherit; outline: none; transition: border-color .2s; }
.form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--pink-hot); box-shadow: 0 0 0 3px rgba(233,30,140,.08); }
.form-group textarea { resize: vertical; min-height: 70px; }
#kode-wrap { display: none; }
.btn-reg { width: 100%; padding: 13px; background: var(--pink-hot); color: white; border: none; border-radius: 10px; font-size: 0.95rem; font-weight: 700; cursor: pointer; transition: background .2s; margin-top: 4px; }
.btn-reg:hover { background: var(--pink-deep); }
.alert-error   { background: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 8px; font-size: 0.84rem; margin-bottom: 14px; border-left: 3px solid #ef4444; }
.alert-success { background: #d1fae5; color: #065f46; padding: 10px 14px; border-radius: 8px; font-size: 0.84rem; margin-bottom: 14px; border-left: 3px solid #10b981; }
.auth-link { text-align: center; font-size: 0.83rem; color: var(--muted); margin-top: 16px; }
.auth-link a { color: var(--pink-hot); font-weight: 600; text-decoration: none; }
@media (max-width: 480px) { .form-row { grid-template-columns: 1fr; } .auth-body { padding: 24px 22px; } }
</style>
</head>
<body>
<div class="auth-wrap">
  <div class="auth-header">
    <div class="logo">Titipin.</div>
    <h2>Buat Akun Baru</h2>
  </div>
  <div class="auth-body">
    <?php if ($error):   ?><div class="alert-error">⚠️ <?= $error ?></div><?php endif; ?>
    <?php if ($success): ?><div class="alert-success">✅ <?= $success ?></div><?php endif; ?>
    <form action="register.php" method="post">
      <div class="form-row">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" placeholder="Nama kamu" required>
        </div>
        <div class="form-group">
          <label>Nomor HP</label>
          <input type="text" name="No_HP" placeholder="08xx..." required>
        </div>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="email@kamu.com" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Min. 6 karakter" required>
      </div>
      <div class="form-group">
        <label>Alamat Lengkap</label>
        <textarea name="alamat" placeholder="Jalan, Kota, Provinsi" required></textarea>
      </div>
      <div class="form-group">
        <label>Daftar Sebagai</label>
        <select name="role" id="roleSelect" onchange="toggleKode(this.value)">
          <option value="customer">Customer (Pembeli)</option>
          <option value="jastiper">Jastiper (Penyedia Jastip)</option>
        </select>
      </div>
      <div class="form-group" id="kode-wrap">
        <label>Kode Registrasi Jastiper</label>
        <input type="text" name="kode_jastiper" placeholder="Masukkan kode yang diberikan admin">
      </div>
      <button type="submit" class="btn-reg">Daftar Sekarang →</button>
    </form>
    <p class="auth-link">Sudah punya akun? <a href="login.php">Login di sini</a> · <a href="index.php">← Beranda</a></p>
  </div>
</div>
<script>
function toggleKode(val) {
  document.getElementById('kode-wrap').style.display = val === 'jastiper' ? 'block' : 'none';
}
</script>
</body>
</html>