<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebTest - A journey to web3</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Strike&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Anek+Gurmukhi:wght@100..800&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Strike&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="rocket.css">
<script type="module" src="spline-viewer.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script src="dailytaskscript.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<?php include 'header.php';?>

<body>

<?php include 'bg.php';?>

<div class="parent1">
        <div class="introduction-section">
            <p class="introduction">A Community for Airdrops</p>
            <p class="sub-introduction">Dive into Web3 with new projects and<br>earn together as a community</p>
            <a href="#latest-projects" class="get-started">Get Started</a>
        </div>
        <div class="spline-model">
            <spline-viewer class="spline" url="https://prod.spline.design/R3wTfuGDwj3fLYva/scene.splinecode"></spline-viewer>
        </div>
    </div>

<?php include 'projects.php';?>

<?php include 'daily-task.php';?>

<?php include 'quest.php';?>

<?php include 'category.php'; ?>

<button class="interact-button">test</button>

<?php include 'footer.php';?>

<script>
    const getStartedButton = document.querySelector('.get-started');
const latestProjectsSection = document.querySelector('#latest-projects');
console.log(getStartedButton);
getStartedButton.addEventListener('click', () => {
  latestProjectsSection.scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
});
</script>
<script>
const parent2Body = document.querySelector('.parent2-body');

let isDown = false;
let startX;
let scrollLeft;

parent2Body.addEventListener('mousedown', (e) => {
  isDown = true;
  startX = e.pageX - parent2Body.offsetLeft;
  scrollLeft = parent2Body.scrollLeft;
});

parent2Body.addEventListener('mousemove', (e) => {
  if (isDown) {
    e.preventDefault();
    const x = e.pageX - parent2Body.offsetLeft;
    const scroll = x - startX;
    parent2Body.scrollLeft = scrollLeft - scroll;
  }
});

parent2Body.addEventListener('mouseup', () => {
  isDown = false;
});

parent2Body.addEventListener('mouseleave', () => {
  isDown = false;
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script src="dailytaskscript.js"></script>
<script src="updatescript.js"></script>

<script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.3/dist/purify.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script>
  const splineViewer = document.querySelector('.spline');
  const mobileScreenWidth = 768; // adjust this value to your desired mobile screen width

  function checkScreenSize() {
  const screenWidth = window.innerWidth;
  console.log(`Screen width: ${screenWidth}`);
  if (screenWidth <= mobileScreenWidth) {
    splineViewer.url = 'https://prod.spline.design/eTxsjdW40ku-zpeZ/scene.splinecode';
  } else {
    splineViewer.url = 'https://prod.spline.design/R3wTfuGDwj3fLYva/scene.splinecode';
  }
}

  window.addEventListener('resize', checkScreenSize);
  checkScreenSize(); // initial check
</script>

</body>
</html>