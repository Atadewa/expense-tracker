<?php 

include '../config/database.php';

$id_pengeluaran = $_GET['id_pengeluaran'];

$sql = 'SELECT * FROM pengeluaran';
$stmt = sqlsrv_query($conn, $sql);

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    if ($row['id_pengeluaran'] == $id_pengeluaran) {
        $kategori = $row['id_kategori'];
        $deskripsi = $row['deskripsi'];
        $biaya = $row['biaya'];
        $tanggal = date_format($row['tanggal'], 'd-m-Y');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deskripsi = $_POST['deskripsi'];
    $id_kategori = $_POST['kategori'];
    $biaya = $_POST['biaya'];

    // d-m-Y
    $tanggalArray = explode('-', $_POST['tanggal']);
    // format database: Y-m-d
    $tanggal = $tanggalArray[2] . '-' . $tanggalArray[1] . '-' . $tanggalArray[0];    

    $sql = 'UPDATE pengeluaran
            SET id_kategori = ?, deskripsi = ?, biaya = ?, tanggal = ?
            WHERE id_pengeluaran = ?';
    $params = array($id_kategori, $deskripsi, $biaya, $tanggal, $id_pengeluaran);
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
    <title>Edit</title>
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
            }); 
        });
    </script>
</head>
<body class="bg-[#F4F6FF]">

    <?php include ('../includes/header.html')?>

    <section class="mt-12 mx-auto w-full flex justify-center items-center">
        <div class="bg-white p-6 w-full max-w-md rounded-md shadow-lg border">
            <h2 class="text-center text-2xl font-semibold text-[#10375C] mb-5">Edit Pengeluaran</h2>
                <form action="" method="POST">
                    <label for="deskripsi">Deskripsi Pengeluaran</label>
                    <input type="text" id="deskripsi" name="deskripsi" required value="<?php echo $deskripsi; ?>">
            
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" required>
                        <option value="K01" <?php if($kategori == 'K01') echo 'selected'; ?>>Makanan dan Minuman</option>
                        <option value="K02" <?php if($kategori == 'K02') echo 'selected'; ?>>Pendidikan</option>
                        <option value="K03" <?php if($kategori == 'K03') echo 'selected'; ?>>Hiburan dan Rekreasi</option>
                        <option value="K04" <?php if($kategori == 'K04') echo 'selected'; ?>>Kesehatan</option>
                        <option value="K05" <?php if($kategori == 'K05') echo 'selected'; ?>>Transportasi</option>
                    </select>
            
                
            
                    <label for="biaya">Biaya</label>
                    <input type="number" name="biaya" id="biaya" min="0" required value="<?php echo $biaya; ?>">
            
                    <label for="tanggal">Tanggal Pengeluaran</label>
                    <input type="text" name="tanggal" id="tanggal" required value="<?php echo $tanggal;?>" >
            
                    <div class="flex justify-between items-center mt-3">
                        <button type="submit" class="text-white focus:ring bg-blue-500 hover:bg-blue-600 rounded-md px-4 py-2">Simpan</button>
                        <a href="./view.php" class="text-blue-600 hover:underline">Kembali</a>
                    </div>
                </form>
        </div>
    </section>
</body>
</html>