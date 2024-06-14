function showPopup(projectid) {
  console.log("projectid:", projectid);
    // Send an AJAX request to a PHP script with the projectid as a parameter
    $.ajax({
      type: 'POST',
      url: 'get_project_details.php',
      data: { projectid: projectid },
      dataType: 'json',
      success: function(response) {
        console.log("Response:", response);
        // Parse the JSON response and populate the popup-container with the project details
        var project = response.project;
        $('#popup').html(
          '<div id="popupContainer" class="popupContainer">' +

              '<div class="close-button">' +
                '<button class="closebutton" onclick="closePopup()"><span class="material-symbols-outlined">close</span></button>' +
              '</div>' +
              '<div class="project-details">' +
                '<div class="project-details-head">' +
                  '<div class="project-details-head-img">' +
                        '<img class="project-image border" src="../' + project.projectimage + '" alt="' + project.projectname + '">' +
                  '</div>' +
                  '<div class="project-details-head-details">' +
                        '<div class="project-details-head-details-name">' +
                            '<h2>' + project.projectname + '</h2>' +
                        '</div>' +
                        '<div class="project-details-head-details-body">' +
                          '<div class="project-details-head-details-body-status">' +
                            '<p><span style="font-weight: 500;">Status:  </span> ' + project.projectstatus + '</p>' +
                          '</div>' +
                          '<div class="project-details-head-details-body-cost">' +
                            '<p><span style="font-weight: 500;">Cost:  </span> ' + project.projectcost + '</p>' +
                          '</div>' +
                          '<div class="project-details-head-details-body-phase">' +
                            '<p><span style="font-weight: 500;">Phase:  </span> ' + project.projectphase + '</p>' +
                          '</div>' +
                          '<div class="project-details-head-details-body-raised">' +
                            '<p><span style="font-weight: 500;">Raised:  </span> ' + project.projectraised + '</p>' +
                          '</div>' +
                          '<div class="project-details-head-details-body-backedby">' +
                            '<p><span style="font-weight: 500;">Backed By:  </span> ' + project.projectbackedby + '</p>' +
                          '</div>' +
                          '<div class="project-details-head-details-body-category">' +
                            '<p><span style="font-weight: 500;">Category:  </span> ' + project.projectcategory + '</p>' +
                          '</div>' +
                        '</div>' +
                        '<a href="' + project.projectwebsite + '" target="_blank"">' +
                        '<div class="visitwebsitebtn">' +
                          '<button class="visit-website">Join Project</button>' +
                        '</a>' +
                        '</div>' +
                  '</div>' +
                  '</div>' +
                        '<div class="project-details-body">' +
                            '<h4>What is ' + project.projectname + '?</h4>' +
                            '<p class="projectshortdesc">' + project.projectshortdesc + '</p>' +
                            '<h4>Tasks: </h4>' +
                            '<p class="projectlongdesc">' + project.projectlongdesc + '</p>' +
                        '</div>' +
              '</div>' +
          '</div>');
          const popupContainer = document.getElementById("popupContainer");
          popupContainer.style.transform = 'scale(0)';
          popupContainer.style.opacity = 0;
          popup.style.display = "block";

      console.log("Popup innerHTML after setting display:");
      console.log(popup.innerHTML);
      setTimeout(function() {
        popupContainer.style.transition = 'transform 0.3s ease-out, opacity 0.3s ease-out';
        popupContainer.style.transform = 'scale(1)';
        popupContainer.style.transform += 'translate(0%, 0%)';
        popupContainer.style.opacity = 1;
      }, 100);
      }
    });
  }
    // Function to close the popup
    function closePopup(projectid) {
      $('#popup').hide();
    }






