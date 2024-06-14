
        <div class="updatee">
            <div class="updatee-head">
                <p>Updates</p>
            </div>
            <div class="updatee-body">
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
$stmt = $mysqli->prepare("SELECT * FROM `updates` ORDER BY updateid DESC LIMIT 5");
$stmt->bind_result($updateid, $updateimage, $updatename, $updatedesc, $updatejoin, $updatelink);

// Execute the prepared statement
$stmt->execute();

// Loop through the results and generate the HTML
while ($stmt->fetch()) {
    

    echo "<div class='update' data-updateid='". $updateid. "' >";
    echo "<img class='update-image' src='". $updateimage. "' alt='". $updatename. "'>";
    echo "<h3 class='update-name' onclick='updateshowPopup($updateid)' data-taskid='$updateid'>". $updatename. "</h3>";
    echo "</div>";


}

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();
?>
</div>
        </div>

<div id="popup2" class="popup2">
            
        </div>
        <script>
            const updateElements = document.querySelectorAll('.update');

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in-view');
    } else {
      entry.target.classList.remove('in-view');
    }
  });
}, { threshold: 1.0 });

updateElements.forEach((element) => {
  observer.observe(element);
});
        </script>