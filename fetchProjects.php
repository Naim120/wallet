<?php
require_once('../config.php');

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $stmt = $conn->prepare("SELECT projectimage, projectname, projectid FROM `web3-table` WHERE projectcategory =?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '
           
<div class="p-category p-categories">
    <img class="logo-img" src="'. htmlspecialchars($row['projectimage']). '" alt="'. htmlspecialchars($row['projectname']). '">
    <h3 data-projectid="'. $row['projectid'] .'" onclick="showPopup(this.getAttribute(\'data-projectid\'))"> '. htmlspecialchars($row['projectname']). ' </h3>
</div>
';
        }
    } else {
        echo "No projects found in this category.";
    }
}

$stmt->close();
$conn->close();
?>
<script src="latest-projects/script.js"></script>
