<?php 
include 'koneksi.php';

// Pastikan untuk memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan data dari tabel dashboard
$querynpwp = "SELECT * FROM pajak;";
$hasilnpwp = $conn->query($querynpwp);

// Pastikan query berhasil dijalankan
if (!$hasilnpwp) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxSight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
              <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <a href="index.php">
                      <img src="logomata.png" alt="TaxSight Logo" class="me-2" width="50" height="50">
                    </a>
                </div>
                <a class="navbar-brand" href="index.php">TaxSight</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="informasi.php">Informasi Pajak</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Hubungi Kami</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- Main content -->
            <main class="d-flex flex-grow-1 flex-shrink-1">
              <div class="container-fluid p-0">
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                  <div class="text-center">
                    <h1 class="mb-4">Cek semua daftar pajak anda dengan satu kali <span class="highlight">klik</span></h1>
                    <form action="cariNpwp.php" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="npwp" placeholder="Masukkan NPWP Anda" required>
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>