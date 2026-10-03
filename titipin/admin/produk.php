<?php
include "../koneksi.php";
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['user_role'] !== 'admin') { header("Location: ../login.php"); exit(); }

$msg = '';

// TAMBAH / EDIT produk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $np   = trim($_POST['nama_produk']);
    $br   = trim($_POST['brand']);
    $na   = trim($_POST['negara_asal']);
    $des  = trim($_POST['deskripsi']);
    $hrg  = (int)$_POST['harga_asli'];
    $fee  = (int)$_POST['fee_jastip'];
    $ong  = (int)$_POST['estimasi_ongkir'];
    $stok = (int)$_POST['stok'];
    $stat = $_POST['status'];
    $gambar = '';
    // Upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $ext   = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $fname = 'prod_' . time() . '.' . $ext;
        $dest  = "../uploads/produk/" . $fname;
        if (!is_dir("../uploads/produk")) mkdir("../uploads/produk", 0755, true);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $dest);
        $gambar = $fname;
    }

    if ($_POST['action'] === 'tambah') {
        $sql = "INSERT INTO produk (nama_produk,brand,negara_asal,deskripsi,harga_asli,fee_jastip,estimasi_ongkir,gambar,stok,status) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $st  = $conn->prepare($sql);
        $st->bind_param("ssssiiissi",$np,$br,$na,$des,$hrg,$fee,$ong,$gambar,$stok,$stat);
        $st->execute();
        $msg = 'success:Produk berhasil ditambahkan!';
    } elseif ($_POST['action'] === 'edit') {
        $id = (int)$_POST['id_produk'];
        if ($gambar) {
            $sql = "UPDATE produk SET nama_produk=?,brand=?,negara_asal=?,deskripsi=?,harga_asli=?,fee_jastip=?,estimasi_ongkir=?,gambar=?,stok=?,status=? WHERE id_produk=?";
            $st  = $conn->prepare($sql);
            $st->bind_param("ssssiiissii",$np,$br,$na,$des,$hrg,$fee,$ong,$gambar,$stok,$stat,$id);
        } else {
            $sql = "UPDATE produk SET nama_produk=?,brand=?,negara_asal=?,deskripsi=?,harga_asli=?,fee_jastip=?,estimasi_ongkir=?,stok=?,status=? WHERE id_produk=?";
            $st  = $conn->prepare($sql);
            $st->bind_param("ssssiiiisi",$np,$br,$na,$des,$hrg,$fee,$ong,$stok,$stat,$id);
        }
        $st->execute();
        $msg = 'success:Produk berhasil diperbarui!';
    }
}

// HAPUS
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $conn->query("DELETE FROM produk WHERE id_produk=$id");
    $msg = 'success:Produk dihapus!';
}

// TOGGLE STATUS
if (isset($_GET['toggle'])) {
    $id = (int)$_GET['toggle'];
    $cur = $conn->query("SELECT status FROM produk WHERE id_produk=$id")->fetch_assoc()['status'];
    $new = $cur === 'aktif' ? 'nonaktif' : 'aktif';
    $conn->query("UPDATE produk SET status='$new' WHERE id_produk=$id");
    header("Location: produk.php"); exit();
}

// Ambil data untuk edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $edit_data = $conn->query("SELECT * FROM produk WHERE id_produk=$id")->fetch_assoc();
}

// Ambil semua produk
$search = $_GET['q'] ?? '';
$sql_produk = "SELECT * FROM produk" . ($search ? " WHERE nama_produk LIKE '%$search%' OR brand LIKE '%$search%'" : "") . " ORDER BY id_produk DESC";
$produk_list = $conn->query($sql_produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Produk — Admin Titipin</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../includes/dashboard.css">
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">Titipin.<small>Admin Panel</small></div>
  <div class="sidebar-user">
    <div class="avatar"><?= strtoupper(substr($_SESSION['nama'],0,1)) ?></div>
    <div class="sidebar-user-info"><span><?= htmlspecialchars($_SESSION['nama']) ?></span><small>Administrator</small></div>
  </div>
  <nav class="sidebar-nav">
    <a href="dashboard.php"><span class="nav-icon">🏠</span> Dashboard</a>
    <a href="pesanan.php"><span class="nav-icon">📦</span> Pesanan</a>
    <a href="pembayaran.php"><span class="nav-icon">💳</span> Verifikasi Pembayaran</a>
    <a href="produk.php" class="active"><span class="nav-icon">🛍️</span> Produk</a>
    <a href="users.php"><span class="nav-icon">👥</span> Pengguna</a>
    <a href="jastiper.php"><span class="nav-icon">🌍</span> Jastiper</a>
    <a href="request.php"><span class="nav-icon">✏️</span> Request Produk</a>
    <a href="review.php"><span class="nav-icon">⭐</span> Review</a>
  </nav>
  <div class="sidebar-footer"><a href="../logout.php">🚪 Logout</a></div>
</aside>

<div class="main">
  <div class="topbar">
    <div class="page-title">Manajemen Produk</div>
    <button class="btn btn-primary" onclick="document.getElementById('modalTambah').classList.add('open')">+ Tambah Produk</button>
  </div>
  <div class="content">
    <?php if ($msg): [$type,$text] = explode(':',$msg,2); ?>
    <div class="alert alert-<?= $type === 'success' ? 'success' : 'error' ?>"><?= htmlspecialchars($text) ?></div>
    <?php endif; ?>

    <!-- Search -->
    <div class="card">
      <div class="card-body" style="padding:14px 18px">
        <form method="GET" style="display:flex;gap:10px">
          <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" placeholder="Cari nama produk atau brand..." style="flex:1;padding:9px 14px;border:1.5px solid var(--pink-soft);border-radius:8px;font-family:inherit;outline:none">
          <button type="submit" class="btn btn-primary">Cari</button>
          <?php if ($search): ?><a href="produk.php" class="btn btn-outline">Reset</a><?php endif; ?>
        </form>
      </div>
    </div>

    <!-- Table -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Daftar Produk (<?= $produk_list->num_rows ?>)</span>
      </div>
      <div class="card-body" style="padding:0">
        <div class="table-wrap">
          <table>
            <thead><tr>
              <th>ID</th><th>Produk</th><th>Brand</th><th>Negara</th>
              <th>Harga Asli</th><th>Fee</th><th>Stok</th><th>Status</th><th>Aksi</th>
            </tr></thead>
            <tbody>
              <?php if ($produk_list->num_rows === 0): ?>
              <tr><td colspan="9"><div class="empty-state"><div class="empty-icon">📭</div><p>Belum ada produk</p></div></td></tr>
              <?php else: while ($p = $produk_list->fetch_assoc()): ?>
              <tr>
                <td><?= $p['id_produk'] ?></td>
                <td><strong><?= htmlspecialchars($p['nama_produk']) ?></strong></td>
                <td><?= htmlspecialchars($p['brand']) ?></td>
                <td><?= htmlspecialchars($p['negara_asal']) ?></td>
                <td>Rp <?= number_format($p['harga_asli'],0,',','.') ?></td>
                <td>Rp <?= number_format($p['fee_jastip'],0,',','.') ?></td>
                <td><?= $p['stok'] ?></td>
                <td><span class="badge badge-<?= $p['status'] ?>"><?= ucfirst($p['status']) ?></span></td>
                <td style="white-space:nowrap">
                  <a href="produk.php?edit=<?= $p['id_produk'] ?>" class="btn btn-sm btn-outline">✏️</a>
                  <a href="produk.php?toggle=<?= $p['id_produk'] ?>" class="btn btn-sm btn-outline" title="Toggle status">⏸</a>
                  <a href="produk.php?hapus=<?= $p['id_produk'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">🗑</a>
                </td>
              </tr>
              <?php endwhile; endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal-overlay" id="modalTambah" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="modal-box">
    <div class="modal-header">
      <span class="modal-title">➕ Tambah Produk Baru</span>
      <button class="modal-close" onclick="document.getElementById('modalTambah').classList.remove('open')">✕</button>
    </div>
    <form action="produk.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="tambah">
      <div class="form-row">
        <div class="form-group"><label>Nama Produk</label><input type="text" name="nama_produk" required></div>
        <div class="form-group"><label>Brand</label><input type="text" name="brand" required></div>
      </div>
      <div class="form-row">
        <div class="form-group"><label>Negara Asal</label><input type="text" name="negara_asal" required></div>
        <div class="form-group"><label>Stok</label><input type="number" name="stok" value="0" min="0" required></div>
      </div>
      <div class="form-group"><label>Deskripsi</label><textarea name="deskripsi" required></textarea></div>
      <div class="form-row">
        <div class="form-group"><label>Harga Asli (Rp)</label><input type="number" name="harga_asli" value="0" required></div>
        <div class="form-group"><label>Fee Jastip (Rp)</label><input type="number" name="fee_jastip" value="0" required></div>
      </div>
      <div class="form-row">
        <div class="form-group"><label>Est. Ongkir (Rp)</label><input type="number" name="estimasi_ongkir" value="0" required></div>
        <div class="form-group"><label>Status</label><select name="status"><option value="aktif">Aktif</option><option value="nonaktif">Nonaktif</option></select></div>
      </div>
      <div class="form-group"><label>Gambar Produk</label><input type="file" name="gambar" accept="image/*"></div>
      <button type="submit" class="btn btn-primary" style="width:100%">Simpan Produk</button>
    </form>
  </div>
</div>

<?php if ($edit_data): ?>
<!-- MODAL EDIT (auto open) -->
<div class="modal-overlay open" id="modalEdit" onclick="if(event.target===this)window.location='produk.php'">
  <div class="modal-box">
    <div class="modal-header">
      <span class="modal-title">✏️ Edit Produk</span>
      <a href="produk.php" class="modal-close">✕</a>
    </div>
    <form action="produk.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="edit">
      <input type="hidden" name="id_produk" value="<?= $edit_data['id_produk'] ?>">
      <div class="form-row">
        <div class="form-group"><label>Nama Produk</label><input type="text" name="nama_produk" value="<?= htmlspecialchars($edit_data['nama_produk']) ?>" required></div>
        <div class="form-group"><label>Brand</label><input type="text" name="brand" value="<?= htmlspecialchars($edit_data['brand']) ?>" required></div>
      </div>
      <div class="form-row">
        <div class="form-group"><label>Negara Asal</label><input type="text" name="negara_asal" value="<?= htmlspecialchars($edit_data['negara_asal']) ?>" required></div>
        <div class="form-group"><label>Stok</label><input type="number" name="stok" value="<?= $edit_data['stok'] ?>" required></div>
      </div>
      <div class="form-group"><label>Deskripsi</label><textarea name="deskripsi" required><?= htmlspecialchars($edit_data['deskripsi']) ?></textarea></div>
      <div class="form-row">
        <div class="form-group"><label>Harga Asli</label><input type="number" name="harga_asli" value="<?= $edit_data['harga_asli'] ?>" required></div>
        <div class="form-group"><label>Fee Jastip</label><input type="number" name="fee_jastip" value="<?= $edit_data['fee_jastip'] ?>" required></div>
      </div>
      <div class="form-row">
        <div class="form-group"><label>Est. Ongkir</label><input type="number" name="estimasi_ongkir" value="<?= $edit_data['estimasi_ongkir'] ?>" required></div>
        <div class="form-group"><label>Status</label><select name="status"><option value="aktif" <?= $edit_data['status']==='aktif'?'selected':'' ?>>Aktif</option><option value="nonaktif" <?= $edit_data['status']==='nonaktif'?'selected':'' ?>>Nonaktif</option></select></div>
      </div>
      <div class="form-group"><label>Ganti Gambar</label><input type="file" name="gambar" accept="image/*"></div>
      <button type="submit" class="btn btn-primary" style="width:100%">Update Produk</button>
    </form>
  </div>
</div>
<?php endif; ?>
</body>
</html>