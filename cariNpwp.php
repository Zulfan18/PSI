<?php
session_start();
include 'koneksi.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$npwp = $_POST['npwp'];

$sql = "SELECT * FROM pajak WHERE npwp = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $npwp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['pajak_data'] = $row;
    header("Location: tagihan.php");
} else {
    echo "<div class='alert alert-danger mt-3'>NPWP salah. Silakan masukkan NPWP yang benar.</div>";
}

$stmt->close();
$conn->close();
?>