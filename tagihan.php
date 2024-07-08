<?php
session_start();

if (!isset($_SESSION['pajak_data'])) {
    header("Location: index.php");
    exit();
}
 
$data = $_SESSION['pajak_data'];
$nama = htmlspecialchars($data['nama']);
$npwp = htmlspecialchars($data['npwp']);
$unpaid_tax = $data['unpaid_tax'];
$paid_tax = $data['paid_tax'];
$total_tax = $data['total_tax'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TaxSight Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tagihan.css"/>
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
                      <a class="nav-link" href="contact.php">Hubungi Kami</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

        <!-- Main content -->
        <main class="row main-content">
            <div class="col-12">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Selamat Datang, <?php echo $nama; ?>!</h1>
                    <br>
                    <h5 class="3"> Informasi Pajak Tahun Ini</h5>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card bg-danger text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Pajak yang belum dibayarkan</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($unpaid_tax, 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Pajak yang sudah dibayarkan</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($paid_tax, 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total semua pajak</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($total_tax, 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="mb-3">Rangkuman Tagihan</h3>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Rekap Pajak</h5>
                        <div class="mb-3">
                            <label class="form-label">Pajak yang belum di bayarkan</label>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($unpaid_tax / $total_tax) * 100; ?>%" aria-valuenow="<?php echo ($unpaid_tax / $total_tax) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pajak yang sudah di bayarkan</label>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($paid_tax / $total_tax) * 100; ?>%" aria-valuenow="<?php echo ($paid_tax / $total_tax) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total pajak</label>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <span>0</span>
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>9</span>
                            <span>10</span>
                        </div>
                    </div>
                </div>
            </div>
            <a class="navbar-brand" href="tren_pajak.php"><h2>Informasi Tren Pajak</h2></a>
        </main>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Data untuk grafik
    var taxData = <?php echo json_encode(array_reverse($riwayat_pajak)); ?>;
    var years = taxData.map(item => item.tahun);
    var taxAmounts = taxData.map(item => item.jumlah_pajak);

    // Membuat grafik
    var ctx = document.getElementById('taxTrendChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: years,
            datasets: [{
                label: 'Jumlah Pajak',
                data: taxAmounts,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Pajak (Rp)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tahun'
                    }
                }
            }
        }
    });
</script>
</body>
</html>

<?php
// Clear the session data after use
unset($_SESSION['pajak_data']);
?>