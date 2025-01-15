<?php 
include '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                primary: '#10375C',
              },
            }
          }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            label{
                @apply font-medium text-gray-700;
            }
            select, input{
                @apply w-full mt-1 p-2 border border-gray-300 rounded-md;
            }
            tbody tr{
                @apply border-b border-gray-200;
            }
            th{
                @apply p-3 text-left bg-gray-50 font-bold text-primary
            }
            td{
                @apply p-3;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });

                if (value) {
                    $(".totalPengeluaran").hide();
                } else {
                    $(".totalPengeluaran").show();
                }
            });
        });
        </script>
</head>

<body class="min-h-screen bg-[#F4F6FF]">

    <?php include '../includes/header.html'?>

    <section class="container mx-auto">
        <div class="bg-white mx-auto max-w-5xl shadow-lg p-6 rounded-lg my-10 border">
            <h1 class="font-bold text-2xl text-primary mb-5">Catatan Pengeluaran</h1>
            
            <form action="" method="POST" class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mb-5">
                <div>
                    <label for="kategori">Kategori:</label> <br>
                    <select name="kategori" id="kategori">
                        <option value="">Semua Kategori</option>
                        <option value="K01">Makanan dan Minuman</option>
                        <option value="K02">Pendidikan</option>
                        <option value="K03">Hiburan dan Rekreasi</option>
                        <option value="K04">Kesehatan</option>
                        <option value="K05">Transportasi</option>
                    </select>
                </div>
                <div>
                    <label for="order">Urutan:</label> <br>
                    <select name="order" id="order">
                        <option value="">Tanggal Terakhir</option>
                        <option value="ascending">Tanggal Awal</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-sky-500 text-white px-4 py-2 rounded-md hover:bg-sky-600 w-full focus:ring">Filter</button>
                </div>
            </form>
        
            <input id="myInput" type="text" placeholder="Cari pengeluaran..." class="mb-2">
            
            <!-- Table start -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 mt-5 rounded-sm">
                    <thead>
                        <tr>
                            <th>Nama Pengeluaran</th>
                            <th>Kategori</th>
                            <th>Biaya</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $totalPengeluaran = 0;
                        
                        if (isset($_POST['kategori'])) {
                            $kategori = $_POST['kategori'];
                        } else {
                            $kategori = '';
                        }
                        
                        if (isset($_POST['order'])) {
                            $order = $_POST['order'];
                        } else {
                            $order = '';
                        }
                        
                        $sql = 'SELECT id_pengeluaran, deskripsi, nama_kategori, biaya, tanggal
                                FROM pengeluaran
                                JOIN kategori
                                ON pengeluaran.id_kategori = kategori.id_kategori';
            
                        if ($kategori) {
                            $sql .= ' WHERE kategori.id_kategori = ?';
                        }
            
                        if ($order) {
                            $sql .= ' ORDER BY tanggal ASC';
                        } else {
                            $sql .= ' ORDER BY tanggal DESC';
                        }
            
                        if ($kategori) {
                            $params = array($kategori);
                            $stmt = sqlsrv_query($conn, $sql, $params);
                        } else {
                            $stmt = sqlsrv_query($conn, $sql);
                        }
            
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                            echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['deskripsi']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['nama_kategori']) . '</td>';
                                echo '<td>Rp ' . number_format($row['biaya'], 0, ",", ".") . '</td>';
                                $totalPengeluaran += $row['biaya'];
                                echo '<td>' . date_format($row['tanggal'], 'd-m-Y') . '</td>';
                                echo '<td class="flex gap-2 md:gap-2.5">'; 
                                echo '<a href="./edit.php?id_pengeluaran=' . $row['id_pengeluaran'] . '" class="text-sky-600 hover:underline">Edit</a>';  
                                echo '<a href="./delete.php?id_pengeluaran=' . $row['id_pengeluaran'] . '" class="text-red-500 hover:underline">Hapus</a>'; 
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Table End -->

            <div class="mt-5 totalPengeluaran">
                <p><strong class="text-gray-700">Total Pengeluaran:</strong> Rp <?php echo number_format($totalPengeluaran, 0, ",", "."); ?> </p>
            </div>
            <div class="mb-3 mt-5">
                <a href="./add.php" class="bg-green-500 hover:bg-green-600 text-white focus:ring py-2 px-3 rounded-md">Tambah Pengeluaran</a> 
            </div>
        </div>
    </section>
    
</body>
</html>
