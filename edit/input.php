
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_industri_bantul";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {

    $id = (int) $_POST['id'];
    $nama = trim($_POST['nama']);
    $jenis = trim($_POST['jenis']);
    $latitude = (float) $_POST['latitude'];
    $longitude = (float) $_POST['longitude'];

    $query = "UPDATE industri
              SET nama = ?, jenis = ?, latitude = ?, longitude = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssddi",
        $nama,
        $jenis,
        $latitude,
        $longitude,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data berhasil diperbarui!');
            window.location='../index.php';
        </script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }

} else {
    header("Location: ../index.php");
    exit;
}
?>
