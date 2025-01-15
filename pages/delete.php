<?php 

include '../config/database.php';

$id_pengeluaran = $_GET['id_pengeluaran'];

$sql = 'DELETE FROM pengeluaran WHERE id_pengeluaran = ?';
$params = array($id_pengeluaran);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    header('Location: ./view.php');
}
?>