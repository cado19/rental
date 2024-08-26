<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php?page=client/catalog/all">Kizusi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=client/catalog/all">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_SESSION['client_logged_in'])): ?>
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Booking Requests</a>
            <a class="dropdown-item" href="#">My Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?page=client/auth/logoout">Logout</a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=client/auth/login">Login</a>
        </li>
      <?php endif;?>


      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>


    </ul>
  </div>
</nav>