<nav>
  <div class="logo">KnowHive</div>
  <input type="checkbox" id="checkbox" />
  <label for="checkbox" id="icon">
    <svg
      fill="none"
      stroke="currentColor"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M4 6h16M4 12h16M4 18h16"
      ></path>
    </svg>
  </label>
  <ul>
    <li><a href="../home/index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'home') !== false) ? 'active' : '' ?>">Home</a></li>
    <li><a href="../courses/index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'courses') !== false) ? 'active' : '' ?>">Courses</a></li>
    <li><a href="../about-us/index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'about-us') !== false) ? 'active' : '' ?>">About</a></li>
    <li><a href="../blog/index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'blog') !== false) ? 'active' : '' ?>">Blog</a></li>
    <li><a href="../contact/index.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'contact') !== false) ? 'active' : '' ?>">Contact</a></li>
    <li><a href="../login/login.php" class="<?= (basename($_SERVER['PHP_SELF']) == 'login.php' || strpos($_SERVER['REQUEST_URI'], 'login') !== false) ? 'active' : '' ?>">Login</a></li>
  </ul>
</nav>
