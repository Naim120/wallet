<section id="latest-projects" class="latest-projects">
<div class="project-and-update">
        
        <div class="parent2">
            <div class="parent2-head">
                <p>Latest Projects</p>
                <p><a href="./latest-projects/">View All
                <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFF"><path d="m560-242-43-42 168-168H160v-60h525L516-681l43-42 241 241-240 240Z"/></svg>
                </a>
                </p>
            </div>
            <div class="parent2-body-container">
            <div class="parent2-body">
            <?php
require_once '../config.php';

// Create a secure connection to the database server
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$mysqli->ssl_set('ssl_key', 'sl_cert', 'sl_ca', NULL, NULL);
$mysqli->real_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: ". $mysqli->connect_error);
}

// Prepare a parameterized query to retrieve data from the database
$stmt = $mysqli->prepare("SELECT * FROM `web3-table` ORDER BY projectid DESC LIMIT 5");
$stmt->bind_result($projectid, $projectimage, $projectname, $projectstatus, $projectcost, $projectphase, $projectraised, $projectbackedby, $projectcategory, $projectwebsite, $projectshortdesc, $projectlongdesc);

// Execute the prepared statement
$stmt->execute();

// Loop through the results and generate the HTML
while ($stmt->fetch()) {
    

    echo "<div class='project'>";
    echo "<img class='project-image' src='". $projectimage. "' alt='". $projectimage. "'>";
    echo "<h3 class='project-name' onclick='showPopup(".$projectid.")'>". $projectname. "</h3>";
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
        </div>
        <?php include 'update.php';?>
</div>

</section>
<div id="popup" class="popup">
            
        
            </div>
        </div>
        