
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_industri_bantul";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM industri ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Industri Kabupaten Bantul</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #263b59;
        }

        .tambah {
            display: inline-block;
            background: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #263b59;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .edit, .hapus {
            display: inline-block;
            padding: 7px 10px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .edit {
            background: #0d6efd;
        }

        .hapus {
            background: #dc3545;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Data Sebaran Industri Manufaktur Kabupaten Bantul</h2>

    <a href="input/index.html" class="tambah">+ Tambah Data</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Industri</th>
            <th>Jenis</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Aksi</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
        <tr>
            <td><?= htmlspecialchars($data['id']) ?></td>
            <td><?= htmlspecialchars($data['nama']) ?></td>
            <td><?= htmlspecialchars($data['jenis']) ?></td>
            <td><?= htmlspecialchars($data['latitude']) ?></td>
            <td><?= htmlspecialchars($data['longitude']) ?></td>

            <td>
                <a class="edit"
                   href="edit/edit.php?id=<?= $data['id'] ?>">
                   Edit
                </a>

                <a class="hapus"
                   href="delete.php?id=<?= $data['id'] ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>

</body>
</html>
