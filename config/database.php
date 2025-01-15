<?php 
$serverName = "DESKTOP-23PP0QB";
$connectionInfo = ["Database" => "expense_tracker"];

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>