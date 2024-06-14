let gamefiBtn = document.getElementById("gamefi-btn");
let defiBtn = document.getElementById("defi-btn");
let projectPage = document.getElementById("project-page");

gamefiBtn.addEventListener("click", () => {
  fetchProjects("Gamefi");
});

defiBtn.addEventListener("click", () => {
  fetchProjects("DeFi");
});

function fetchProjects(category) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "fetch_projects.php?category=" + category, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      const projects = JSON.parse(xhr.responseText);
      projectPage.innerHTML = "";
      projects.forEach(project => {
        const projectHTML = `
          <div class="project animated-project" data-projectid="${project.projectid}">
            <img src="${project.projectimage}" alt="${project.projectname}">
            <h4>${project.projectname}</h4>
          </div>
        `;
        projectPage.innerHTML += projectHTML;
      });
    }
  };
  xhr.send();
}