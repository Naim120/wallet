<?php
require_once '../config.php';

// Connect to the database
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$mysqli->ssl_set('ssl_key', 'sl_cert', 'sl_ca', NULL, NULL);
$mysqli->real_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: ". $mysqli->connect_error);
}

// Log the updateid parameter
error_log("update ID: ". $_POST['updateid']);

// Prepare a parameterized query to retrieve data from the database
$stmt = $mysqli->prepare("SELECT * FROM `updates` WHERE updateid =?");
$stmt->bind_param("i", $updateid);
$updateid = $_POST['updateid'];
$stmt->execute();
$stmt->bind_result($updateid, $updateimage, $updatename, $updatedesc, $updatejoin, $updatelink);
$stmt->fetch();

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();

// Return the update details as a JSON response
$response = array(
  'update' => array(
    'updateid' => $updateid,
    'updateimage' => $updateimage,
    'updatename' => $updatename,
    'updatedesc' => $updatedesc,
    'updatejoin' => $updatejoin,
    'updatelink' => $updatelink,
  )
);
echo json_encode($response);
?>