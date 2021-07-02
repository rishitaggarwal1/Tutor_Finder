<!-- Copyright (c) Rishit Aggarwal -->
<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:first-tutor.database.windows.net,1433; Database = tutor_finder", "rishit", "Nonu@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "rishit", "pwd" => "Nonu@123", "Database" => "tutor_finder", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:first-tutor.database.windows.net,1433";
$con = sqlsrv_connect($serverName, $connectionInfo);
?>