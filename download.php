<?php

if (isset($_GET['m'])) {
    switch($_GET['m']) {
        case 'uptime':
            $filename = 'uptime'; 
        break;
        case 'wingroups':
            $filename = 'wingroups'; 
        break;
    }
    if (isset($filename)) {
        $script = $filename .'2csv.php';
        if (is_file($script)) {
            header('Content-Description: File Transfer');
            header("Content-Type: application/octet-stream");
            header('Content-Disposition: attachment; filename="ocsexports_'. $filename .'_'. date('YmdHis') .'.csv"');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Content-Transfer-Encoding: binary');
            header('Pragma: private');
            header('Expires: 0');
            include $script;
            exit();
        }
    }
    die('file not found!');
}

?>
