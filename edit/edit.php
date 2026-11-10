
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_industri_bantul";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (!isset($_GET['id'])) {
    die("ID data tidak ditemukan.");
}

$id = (int) $_GET['id'];

$query = mysqli_prepare($conn, "SELECT * FROM industri WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data industri tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Industri</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #263b59;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #0d6efd;
            color: white;
            border: none;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Data Industri</h2>

    <form action="input.php" method="POST">

        <input type="hidden" name="id"
               value="<?= htmlspecialchars($data['id']) ?>">

        <label>Nama Industri</label>
        <input type="text" name="nama"
               value="<?= htmlspecialchars($data['nama']) ?>" required>

        <label>Jenis Industri</label>
        <input type="text" name="jenis"
               value="<?= htmlspecialchars($data['jenis']) ?>" required>

        <label>Latitude</label>
        <input type="number" step="any" name="latitude"
               value="<?= htmlspecialchars($data['latitude']) ?>" required>

        <label>Longitude</label>
        <input type="number" step="any" name="longitude"
               value="<?= htmlspecialchars($data['longitude']) ?>" required>

        <button type="submit" name="update">Update Data</button>

    </form>

    <a href="../index.php">Kembali</a>

</div>

</body>
</html>
