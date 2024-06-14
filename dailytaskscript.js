function taskshowPopup(taskid) {
  $.ajax({
    type: 'POST',
    url: 'get_task_details.php',
    data: { taskid: taskid },
    dataType: 'json',
    success: function(response) {
      console.log("Response object:");
      console.log(response);
      console.log("Response object keys:");
      console.log(Object.keys(response));
      var task = response.task;
      console.log("Task name: " + task.taskname);
      console.log("Task description: " + task.taskdesc);
      console.log("Task join link: " + task.taskjoin);
      console.log("Task daily task link: " + task.tasklink);

      const popup2 = document.getElementById("popup2");
      

      popup2.innerHTML =
      '<div id="popup2Container" class="popup2Container">' +

                '<div class="close-button">' +
                      '<button class="closebutton" id="close-button"><span class="material-symbols-outlined">close</span></button>' +
                '</div>' +
          '<div class="task-details">' +
                '<div class="task-details-img">' +
                      '<img class="task-image border" src="' + task.taskimage + '" alt="' + task.taskname + '">' +
                '</div>' +
                '<div class="task-details-name">' +
                      '<h2>' + task.taskname + '</h2>' +
                '</div>' +
                '<div class="task-details-desc">' +
                      '<p>' + task.taskdesc + '</p>' +
                '</div>' +
                '<div class="task-details-buttons">' +
                              '<a class="taskjoin" href="' + task.taskjoin + '">Join Project</a>' +
                              '<a class="tasklink" href="' + task.tasklink + '">Go to Task</a>' + 
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