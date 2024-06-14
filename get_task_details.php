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

// Log the taskid parameter
error_log("task ID: ". $_POST['taskid']);

// Prepare a parameterized query to retrieve data from the database
$stmt = $mysqli->prepare("SELECT * FROM `daily-task` WHERE taskid =?");
$stmt->bind_param("i", $taskid);
$taskid = $_POST['taskid'];
$stmt->execute();
$stmt->bind_result($taskid, $taskimage, $taskname, $taskdesc, $taskjoin, $tasklink);
$stmt->fetch();

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();

// Return the task details as a JSON response
$response = array(
  'task' => array(
    'taskid' => $taskid,
    'taskimage' => $taskimage,
    'taskname' => $taskname,
    'taskdesc' => $taskdesc,
    'taskjoin' => $taskjoin,
    'tasklink' => $tasklink,
  )
);
echo json_encode($response);
?>