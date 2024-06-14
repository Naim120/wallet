let parent2Body;
let projects;
let currentProjectIndex;
let projectWidth;

function initCarousel() {
  parent2Body = document.querySelector('.parent2-body');
  projects = document.querySelectorAll('.project');

  if (parent2Body && projects.length > 0) {
    projectWidth = projects[0].offsetWidth;

    parent2Body.style.width = `${projects.length * projectWidth}px`;
    parent2Body.style.overflowX = 'croll';
    parent2Body.style.scrollBehavior = 'mooth';
    parent2Body.style.scrollSnapType = 'x mandatory';
    parent2Body.style.scrollPaddingRight = `${window.innerWidth - document.documentElement.clientWidth}px`;

    parent2Body.addEventListener('scroll', () => {
      const scrollPosition = parent2Body.scrollLeft;
      const projectIndex = Math.floor(scrollPosition / projectWidth);
      if (projectIndex!== currentProjectIndex) {
        currentProjectIndex = projectIndex;
        // Optional: add animation or other effects here
      }
    });

    parent2Body.addEventListener('touchstart', (event) => {
      const touchStartX = event.touches[0].clientX;
      parent2Body.addEventListener('touchmove', (event) => {
        const touchMoveX = event.touches[0].clientX;
        const deltaX = touchMoveX - touchStartX;
        parent2Body.scrollLeft += deltaX;
        touchStartX = touchMoveX;
      });
    });
  }
}

initCarousel();