
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_industri_bantul";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $query = mysqli_prepare($conn, "DELETE FROM industri WHERE id = ?");
    mysqli_stmt_bind_param($query, "i", $id);

    if (mysqli_stmt_execute($query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }

} else {
    header("Location: index.php");
    exit;
}
?>
