<?php
session_start();
include 'koneksi.php';

/*if (!isset($_SESSION['pajak_data'])) {
    header("Location: index.php");
    exit();
}
*/

$data = $_SESSION['pajak_data'];
$nama = htmlspecialchars($data['nama']);
$npwp = htmlspecialchars($data['npwp']);

// Ambil data riwayat pajak 5 tahun terakhir
$sql = "SELECT * FROM riwayat_pajak WHERE pajak_id = ? ORDER BY tahun DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $data['id']);
$stmt->execute();
$result = $stmt->get_result();

$riwayat_pajak = [];
while ($row = $result->fetch_assoc()) {
    $riwayat_pajak[] = $row;
}

// Hitung total pajak dan status untuk 5 tahun terakhir
$total_pajak = 0;
$total_lunas = 0;
$total_belum_lunas = 0;

foreach ($riwayat_pajak as $pajak) {
    $total_pajak += $pajak['jumlah_pajak'];
    if ($pajak['status_pembayaran'] == 'Lunas') {
        $total_lunas += $pajak['jumlah_pajak'];
    } else {
        $total_belum_lunas += $pajak['jumlah_pajak'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TaxSight - Tren Perpajakan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="tagihan.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Navbar code here -->
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
                      <a class="nav-link" href="informasiPajak.php">Informasi Pajak</a>
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
                    <h1 class="h2">Tren Perpajakan <?php echo $nama; ?></h1>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card bg-danger text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Pajak Belum Dibayar (5 Tahun)</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($total_belum_lunas, 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Pajak Sudah Dibayar (5 Tahun)</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($total_lunas, 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Total Pajak (5 Tahun)</h5>
                                <p class="card-text fs-4">Rp. <?php echo number_format($total_pajak, 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Grafik Tren Pajak 5 Tahun Terakhir</h5>
                        <canvas id="taxTrendChart"></canvas>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pembayaran Pajak</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Jumlah Pajak</th>
                                    <th>Status</th>
                                    <th>Tanggal Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat_pajak as $pajak): ?>
                                <tr>
                                    <td><?php echo $pajak['tahun']; ?></td>
                                    <td>Rp. <?php echo number_format($pajak['jumlah_pajak'], 2); ?></td>
                                    <td><?php echo $pajak['status_pembayaran']; ?></td>
                                    <td><?php echo $pajak['tanggal_pembayaran'] ? date('d-m-Y', strtotime($pajak['tanggal_pembayaran'])) : '-'; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
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