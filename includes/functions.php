<?php
function encryptPassword($password) {
    return sha1($password);
}

function getUniqueDataFromTable($columnName, $tableName) {
    global $conn;
    $sql = "SELECT DISTINCT $columnName FROM $tableName";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row[$columnName];
    }

    return $data;
}
?>