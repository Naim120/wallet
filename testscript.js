function showPopup(projectid) {
    // Send an AJAX request to a PHP script with the projectid as a parameter
    $.ajax({
      type: 'POST',
      url: 'get_project_details.php',
      data: { projectid: projectid },
      dataType: 'json',
      success: function(response) {
        // Parse the JSON response and populate the popup-container with the project details
        var project = response.project;
        $('#popup').html(
          '<div class="popup-container">' +
              '<div class="close-button">' +
                '<button class="closebutton" onclick="closePopup()"><span class="material-symbols-outlined">close</span></button>' +
              '</div>' +
              '<div class="project-details">' +
                '<div class="project-details-head>' +
                  '<div class="project-details-head-img>' +
                        '<img class="project-image" src="../' + project.projectimage + '" alt="' + project.projectname + '">' +
                  '</div>' +
                  '<div class="project-details-head-details>' +
                        '<h2>' + project.projectname + '</h2>' +
                        '<p><strong>Status:</strong> ' + project.projectstatus + '</p>' +
                        '<p><strong>Cost:</strong> ' + project.projectcost + '</p>' +
                        '<p><strong>Phase:</strong> ' + project.projectphase + '</p>' +
                  '</div>' + 
                '</div>' +
                        '<p>' + project.projectlongdesc + '</p>' +
              '</div>' +
          '</div>');
        $('#popup').show();
      }
    });
  }
    // Function to close the popup
    function closePopup(projectid) {
      $('#popup').hide();
    }