<?php
session_start();
require_once '../config.php';

// Connect to the database
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$mysqli->ssl_set('ssl_key', 'sl_cert', 'sl_ca', NULL, NULL);
$mysqli->real_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: ". $mysqli->connect_error);
}

// Log the projectid parameter
error_log("Project ID: ". $_POST['projectid']);

// Prepare a parameterized query to retrieve data from the database
$stmt = $mysqli->prepare("SELECT projectimage, projectname, projectstatus, projectcost, projectphase, projectraised, projectbackedby, projectcategory, projectwebsite, projectshortdesc, projectlongdesc FROM `web3-table` WHERE projectid =?");
$stmt->bind_param("i", $projectid);
$projectid = $_POST['projectid'];
$stmt->execute();
$stmt->bind_result($projectimage, $projectname, $projectstatus, $projectcost, $projectphase, $projectraised, $projectbackedby, $projectcategory, $projectwebsite, $projectshortdesc, $projectlongdesc);
$stmt->fetch();

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();

// Return the project details as a JSON response
$response = array(
    'project' => array(
        'projectid' => $_POST['projectid'], // use the posted projectid
        'projectimage' => $projectimage,
        'projectname' => $projectname,
        'projectstatus' => $projectstatus,
        'projectcost' => $projectcost,
        'projectphase' => $projectphase,
        'projectraised' => $projectraised,
        'projectbackedby' => $projectbackedby,
        'projectcategory' => $projectcategory,
        'projectwebsite' => $projectwebsite,
        'projectshortdesc' => $projectshortdesc,
        'projectlongdesc' => $projectlongdesc
    )
);
echo json_encode($response);
?>