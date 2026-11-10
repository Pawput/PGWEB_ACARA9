
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_industri_bantul";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['simpan'])) {

    $nama = trim($_POST['nama']);
    $jenis = trim($_POST['jenis']);
    $latitude = (float) $_POST['latitude'];
    $longitude = (float) $_POST['longitude'];

    $query = "INSERT INTO industri
              (nama, jenis, latitude, longitude)
              VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssdd",
        $nama,
        $jenis,
        $latitude,
        $longitude
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location='index.php';
              </script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>
