<?php

include('../includes/config.php');

/* get tables */
$sql = 'SHOW TABLES';
$allTables = mysqli_query($con, $sql);

// print
foreach ($allTables as $table) {
    $sql = 'DESCRIBE '.$table["Tables_in_visit_anderson"];
    $describe = mysqli_query($con, $sql);
    echo '<strong>'.$table["Tables_in_visit_anderson"].'</strong><br>';
    foreach ($describe as $des) {
        echo $des['Field'].' '.$des['Type'].' '.$des['Null'].' '.$des['Key'].' '.$des['Extra'].'<br>';
    }
    echo '<br><br>';
}

// print to file
$current = "";
foreach ($allTables as $table) {
    $sql = 'DESCRIBE '.$table["Tables_in_visit_anderson"];
    $describe = mysqli_query($con, $sql);
    $current += $table["Tables_in_visit_anderson"].'\n';
    foreach ($describe as $des) {
        $current += $des['Field'].' '.$des['Type'].' '.$des['Null'].' '.$des['Key'].' '.$des['Extra'].'\n';
    }
    $current += '\n\n';
}
$file = 'databaseSchema.txt';
file_put_contents($file, $current);
