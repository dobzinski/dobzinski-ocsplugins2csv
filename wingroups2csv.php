<?php

require_once 'conn.php';

if (!$conn)
    die("Error! Please, check the var.php");

$sql = "SELECT h.NAME AS HARDWARE, w.GROUPNAME AS GROUPNAME, w.NAME AS USER, w.TYPE AS TYPE, w.SOURCE as SOURCE FROM wingroups w JOIN hardware h ON (w.HARDWARE_ID = h.ID) WHERE w.GROUPNAME = 'Administradores' ORDER BY h.NAME, w.GROUPNAME, w.NAME, w.TYPE, w.SOURCE;";

$result = mysqli_query($conn, $sql);

echo "HARDWARE;GROUPNAME;USER;TYPE;SOURCE;\n";
while($row = mysqli_fetch_assoc($result)) {
    echo ($row['HARDWARE']) .";";
    echo ($row['GROUPNAME']) .";";
    echo ($row['USER']) .";";
    echo ($row['TYPE']) .";";
    echo ($row['SOURCE']) .";";
    echo "\n";
}

mysqli_free_result($result);
mysqli_close($conn);

?>
