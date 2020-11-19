<nav class="navbar navbar-expand-lg navbar-light bg-light mt-1">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand">Fuel Log Information System</a>
  <div class="w-100 text-right mr-3">
    <p>Welcome <b><?php   

      $user = $this->db->selectUserByID($_SESSION['userid']);
      echo $user['fullname'];

    ?>!</b> - <small><?php echo $user['usertype']; ?></small></p>
  </div>


  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

      <?php if ($_SESSION['usertype'] == 'Admin'): ?>

        <li class="nav-item <?= ($page=='dashboard') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=dashboard">Dashboard</a>
        </li>

        <li class="nav-item <?= ($page=='users') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=users">Users</a>
        </li>

        <li class="nav-item <?= ($page=='drivers') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=drivers">Drivers</a>
        </li>

        <li class="nav-item <?= ($page=='vehicles') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=vehicles">Vehicles</a>
        </li>

        <li class="nav-item <?= ($page=='view-fuel-logs') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=view-fuel-logs">View Fuel Logs</a>
        </li>

        
        
      <?php endif ?>

      <?php if ($_SESSION['usertype'] == 'Boss'): ?>

        <li class="nav-item <?= ($page=='view-fuel-logs') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=view-fuel-logs">View Fuel Logs</a>
        </li>
        
      <?php endif ?>

      <?php if ($_SESSION['usertype'] == 'Encoder'): ?>
        <li class="nav-item <?= ($page=='fuel-logs') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=fuel-logs">Fuel Logs</a>
        </li>
      <?php endif ?>

      <li class="nav-item">
          <a class="nav-link" href="?p=logout">Logout</a>
      </li>
      


    </ul>

  </div>
</nav>

