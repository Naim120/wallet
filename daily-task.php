<section id="daily-task" class="daily-task">
        <div class="section-bg">
        
        <div class="parent2">
            <div class="parent2-head">
                <p>Daily Task</p>
                <p><a href="./daily-tasks/">View All
                <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFF"><path d="m560-242-43-42 168-168H160v-60h525L516-681l43-42 241 241-240 240Z"/></svg>
                </a>
                </p>
            </div>
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
$stmt = $mysqli->prepare("SELECT * FROM `daily-task` ORDER BY taskid DESC LIMIT 5");
$stmt->bind_result($taskid, $taskimage, $taskname, $taskdesc, $taskjoin, $tasklink);

// Execute the prepared statement
$stmt->execute();

// Loop through the results and generate the HTML
while ($stmt->fetch()) {
    

    echo "<div class='task' data-taskid='". $taskid. "' >";
    echo "<img class='task-image' src='". $taskimage. "' alt='". $taskname. "'>";
    echo "<h3 class='task-name' onclick='taskshowPopup($taskid)' data-taskid='$taskid'>". $taskname. "</h3>";
    echo "</div>";


}

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();
?>
</div>
        </div>
</div>
</section>
<div id="popup2" class="popup2">
            
        </div>

