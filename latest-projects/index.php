<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTest - A journey to web3</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Strike&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Anek+Gurmukhi:wght@100..800&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Strike&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" type="text/css" href="latest-style.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

<?php include '../header.php';?>

<body>

<?php include '../bg.php';?>

<div class="section-bg">
        
        <div class="parent2">
            <div class="parent2-head">
                <p>Latest Projects</p>
            </div>
            <div class="parent2-body">
            <?php
require_once '../../config.php';

// Create a secure connection to the database server
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$mysqli->ssl_set('ssl_key', 'sl_cert', 'sl_ca', NULL, NULL);
$mysqli->real_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: ". $mysqli->connect_error);
}

// Prepare a parameterized query to retrieve data from the database
$stmt = $mysqli->prepare("SELECT * FROM `web3-table` ORDER BY projectid DESC");
$stmt->bind_result($projectid, $projectimage, $projectname, $projectstatus, $projectcost, $projectphase, $projectraised, $projectbackedby, $projectcategory, $projectwebsite, $projectshortdesc, $projectlongdesc);

// Execute the prepared statement
$stmt->execute();

// Loop through the results and generate the HTML
while ($stmt->fetch()) {
    echo "<div class='project' data-projectid='". $projectid. "' >";
    echo "<img class='project-image' src='../". $projectimage. "' alt='". $projectimage. "' onclick='showPopup($projectid)'>";
    echo "<h3 class='project-name' onclick='showPopup($projectid)'>". $projectname. "</h3>";
    echo "<div class='project-info'>";
    echo "<div class='projectstatus'>";
    echo "<p class='project-status'>". $projectstatus. "</p>";
    echo "</div>";
    echo "<div class='projectcost'>";
    echo "<p class='project-cost'>". $projectcost. "</p>";
    echo "</div>";
    echo "<div class='projectphase'>";
    echo "<p class='project-phase'>". $projectphase. "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";


}

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();
?>
</div>
        </div>
        <div id="popup" class="popup">
            <div class="popup-container">
        <?php
            echo json_encode($response);
        ?>
            </div>
        </div>
        <?php include '../update.php';?>
</div>
</body>
<?php include '../footer.php';?>
</html>