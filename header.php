<head>
<script charset="UTF-8" type="text/javascript" src="./39eb5fdb-4b23-47de-ad5e-0048131b6493.js"></script>
  <header class="menubar">
  <div class="logo">
    <img src="logo.png">
  </div>
  <div class="hamburger-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="menu-items">
    <a href="http://localhost:5420">Home</a>
    <a href="http://localhost:5420/latest-projects/">Projects</a>
    <a href="http://localhost:5420/ongoing-airdrops">Airdrops</a>
    <a href="http://localhost:5420/about">About</a>
    <a href="http://localhost:5420/contact">Contact</a>
  </div>
  <div class="register-buttons">
    <a href="admin/login.php"> <button class="sign-in">Sign-In</button></a>
    <button class="sign-out">Sign-Out</button>
  </div>
</header>
</head>
<script>
    const hamburgerMenu = document.querySelector('.hamburger-menu');
const menuItems = document.querySelector('.menu-items');

hamburgerMenu.addEventListener('click', () => {
  menuItems.classList.toggle('show');
});
</script>