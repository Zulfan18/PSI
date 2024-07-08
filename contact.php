<?php 
include 'koneksi.php';

// Pastikan untuk memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxSight - Hubungi Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="informasi.php">Informasi Pajak</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="contact.php">Hubungi Kami</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!-- Main content -->
            <main class="d-flex flex-grow-1 flex-shrink-1">
              <div class="container-fluid p-0">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                  <div class="col-md-6">
                    <h1 class="mb-4 text-center">Hubungi Kami</h1>
                    <form action="process_contact.php" method="post">
                      <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="mb-3">
                        <label for="subject" class="form-label">Subjek</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                      </div>
                      <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                  </div>
                </div>
              </div>
            </main>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Ikuti Kami</h5>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                    <p class="mt-3">&copy; 2023 TaxSight. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>