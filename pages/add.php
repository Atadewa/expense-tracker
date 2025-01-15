<?php 
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $id_kategori = $_POST['kategori'];
    $biaya = $_POST['biaya'];

    // d-m-Y
    $tanggalArray = explode('-', $_POST['tanggal']);
    // format database: Y-m-d
    $tanggal = $tanggalArray[2] . '-' . $tanggalArray[1] . '-' . $tanggalArray[0];

    $sql = 'INSERT INTO pengeluaran VALUES (?, ?, ?, ?)';
    $params = array($id_kategori, $deskripsi, $biaya, $tanggal);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header('Location: ./view.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengeluaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            label{
                @apply w-full text-gray-800;
            }
            input, select {
                @apply mt-1 py-1.5 px-2 w-full focus:ring focus:outline-none border border-gray-200 rounded mb-4;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        $(function(){
            $("#tanggal").datepicker({
                dateFormat: "dd-mm-yy"
            }).datepicker("setDate", new Date());
        });
    </script>
</head>
<body class="bg-[#F4F6FF]">

    <?php include ('../includes/header.html')?>

    <section class="mt-12 mx-auto w-full flex justify-center items-center">
        <div class="bg-white p-6 w-full max-w-md rounded-md shadow-lg border">
            <h2 class="text-center text-2xl font-semibold text-[#10375C] mb-5">Tambah Pengeluaran</h2>
            <form action="" method="POST">
                <label for="deskripsi">Deskripsi Pengeluaran</label>
                <input type="text" id="deskripsi" name="deskripsi" required placeholder="Contoh: Makan siang">
        
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" required>
                    <option value="K01">Makanan dan Minuman</option>
                    <option value="K02">Pendidikan</option>
                    <option value="K03">Hiburan dan Rekreasi</option>
                    <option value="K04">Kesehatan</option>
                    <option value="K05">Transportasi</option>
                </select>
        
                <label for="biaya">Biaya</label>
                <input type="number" name="biaya" id="biaya" min="0" required placeholder="Masukkan jumlah biaya">
        
                <label for="tanggal">Tanggal Pengeluaran</label>
                <input type="text" name="tanggal" id="tanggal" placeholder="Pilih tanggal" required>
        
                <div class="flex justify-between items-center mt-3">
                    <button type="submit" class="text-white focus:ring bg-blue-500 hover:bg-blue-600 rounded-md px-4 py-2">Tambah</button>
                    <a href="./view.php" class="text-blue-600 hover:underline">Kembali</a>
                </div>
        
            </form>
        </div>
    </section>
</body>
</html>