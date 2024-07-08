<?php 
include 'koneksi.php';

// Ensure connection is checked
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// You can add queries here to fetch tax information from your database if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxSight - Informasi Pajak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="index.css">
    <script src="ai.js" defer></script>
    <link rel="stylesheet" href="ai.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar -->
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
                      <a class="nav-link active" aria-current="page" href="informasiPajak.php">Informasi Pajak</a>
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
        </div>
        
        <!-- Main content -->
        <div class="row">
            <main class="col-12 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Informasi Pajak</h1>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pajak Penghasilan (PPh)</h5>
                                <p class="card-text">Pajak Penghasilan adalah pajak yang dikenakan terhadap penghasilan yang diterima atau diperoleh oleh Orang Pribadi maupun Badan.</p>
                                <a href="https://klikpajak.id/blog/belajar-pajak-itu-mudah-ini-pengertian-pajak-penghasilan/" target="_blank" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pajak Pertambahan Nilai (PPN)</h5>
                                <p class="card-text">Pajak Pertambahan Nilai adalah pajak yang dikenakan atas konsumsi barang dan jasa di dalam daerah pabean.</p>
                                <a href="https://klikpajak.id/blog/pajak-pertambahan-nilai-ppn/" target="_blank" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pajak Bumi dan Bangunan (PBB)</h5>
                                <p class="card-text">Pajak Bumi dan Bangunan adalah pajak yang dikenakan atas kepemilikan atau pemanfaatan tanah dan atau bangunan.</p>
                                <a href="https://klikpajak.id/blog/pengertian-pbb-dan-cara-mengecek-secara-online/" target="_blank" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bea Materai</h5>
                                <p class="card-text">Bea Materai adalah pajak yang dikenakan atas dokumen yang bersifat perdata dan dokumen untuk digunakan di pengadilan.</p>
                                <a href="https://www.pajak.go.id/id/bea-meterai-0#:~:text=Bea%20Meterai%20adalah%20pajak%20atas%20dokumen%20yang%20terutang,bila%20dokumen%20tersebut%20hanya%20dibuat%20oleh%20satu%20pihak." target="_blank" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="chatbot-toggler">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Chatbot</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there! How can I help you today?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>