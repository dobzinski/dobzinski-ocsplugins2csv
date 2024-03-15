<?php

require_once 'conn.php';

if (!$conn)
    die("Error! Please, check the var.php");

$sql = "SELECT h.NAME AS HARDWARE, u.LOG_DATE AS LOG_DATE, u.DURATION as DURATION FROM uptime u JOIN hardware h ON (u.HARDWARE_ID = h.ID) ORDER BY h.NAME, u.LOG_DATE, u.DURATION;";

$result = mysqli_query($conn, $sql);

echo "HARDWARE;LOG_DATE;DURATION;\n";
while($row = mysqli_fetch_assoc($result)) {
    echo ($row['HARDWARE']) .";";
    echo ($row['LOG_DATE']) .";";
    echo ($row['DURATION']) .";";
    echo "\n";
}

mysqli_free_result($result);
mysqli_close($conn);

?>
