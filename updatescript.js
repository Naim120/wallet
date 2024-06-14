function updateshowPopup(updateid) {
    $.ajax({
      type: 'POST',
      url: 'get_update_details.php',
      data: { updateid: updateid },
      dataType: 'json',
      success: function(response) {
        console.log("Response object:");
        console.log(response);
        console.log("Response object keys:");
        console.log(Object.keys(response));
        var update = response.update;
        console.log("update name: " + update.updatename);
        console.log("update description: " + update.updatedesc);
        console.log("update join link: " + update.updatejoin);
        console.log("update daily update link: " + update.updatelink);
  
        const popup2 = document.getElementById("popup2");
        
  
        popup2.innerHTML =
        '<div id="popup2Container" class="popup2Container">' +
  
                  '<div class="close-button">' +
                        '<button class="closebutton" id="close-button"><span class="material-symbols-outlined">close</span></button>' +
                  '</div>' +
            '<div class="update-details">' +
                  '<div class="update-details-img">' +
                        '<img class="update-image border" src="' + update.updateimage + '" alt="' + update.updatename + '">' +
                  '</div>' +
                  '<div class="update-details-name">' +
                        '<h2>' + update.updatename + '</h2>' +
                  '</div>' +
                  '<div class="update-details-desc">' +
                        '<p>' + update.updatedesc + '</p>' +
                  '</div>' +
                  '<div class="update-details-buttons">' +
                                '<a class="updatejoin" href="' + update.updatejoin + '">Join Project</a>' +
                                '<a class="updatelink" href="' + update.updatelink + '">Go to update</a>' + 
                  '</div>' +
            '</div>' +
        '</div>';
              const popup2Container = document.getElementById("popup2Container");
              popup2Container.style.transform = 'scale(0)';
              popup2Container.style.opacity = 0;
        console.log("Popup2 innerHTML before setting display:");
        console.log(popup2.innerHTML);
  
        popup2.style.display = "block";
  
        console.log("Popup2 innerHTML after setting display:");
        console.log(popup2.innerHTML);
        setTimeout(function() {
          popup2Container.style.transition = 'transform 0.3s ease-out, opacity 0.3s ease-out';
          popup2Container.style.transform = 'scale(1)';
          popup2Container.style.opacity = 1;
        }, 100);
  
        // Add event listener to closebutton
        const closeButton = document.getElementById("close-button");
        closeButton.addEventListener("click", function() {
          popup2.style.display = "none";
        });
      }
    });
  }