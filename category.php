<?php
// Include the config file with database credentials
require_once('../config.php');

// Create a connection to the database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Prepare the HTML for the category containers
$categoryContainers = '
<section class="categories">
<<div class="section-bg">
<div class="parent2 gap">
<div class="parent2-head padding"
    <h2>Categories</h2>
    </div>
    <div class="parent2-body">
        <div class="category" data-category="Gamefi"><img class="logo-img" src="upload/gamefi.png">Gamefi</div>
        <div class="category" data-category="Defi"><img class="logo-img" src="upload/defi.jpg">Defi</div>
    
    </div>
</div>
</div>
</section>
<div class="project-container">
</div>
';

// Output the category containers
echo $categoryContainers;

?>

<script>
    $(document).ready(function() {
        $('.category').on('click', function() {
            var category = $(this).data('category');
            $('.category').removeClass('active'); // Remove the active class from all categories
            $(this).addClass('active'); // Add the active class to the clicked category
            $.ajax({
                type: 'POST',
                url: 'fetchProjects.php',
                data: {category: category},
                success: function(response) {
                    $('.project-container').html(response);
                }
            });
        });
    });
</script>
<script src="latest-projects/script.js"></script>
