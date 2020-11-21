<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  
  <a class="navbar-brand">SKWD-WPDS</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarToggler">

    <div class="border-left">
      <h6 class="text-white p-2" href="?p=dashboard"> Welcome <b><?php   
          $user = $this->db->selectUserByID($_SESSION['userid']);
          echo $user['fullname'];

        ?>!</b> - <small><?php echo $user['usertype']; ?></small></h6>
    </div>

    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

      <?php if ($_SESSION['usertype'] == 'ADMIN'): ?>

        <li class="nav-item <?= ($page=='dashboard') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=dashboard">Dashboard</a>
        </li>

        <li class="nav-item <?= ($page=='users') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=users">Users</a>
        </li>

        <li class="nav-item <?= ($page=='areas') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=areas">Areas</a>
        </li>

        <li class="nav-item <?= ($page=='pumping-stations') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=pumping-stations">Pumping Stations</a>
        </li>

      <?php endif ?>

      <?php if ($_SESSION['usertype'] == 'USER'): ?>

        <li class="nav-item <?= ($page=='view-fuel-logs') ? 'active' : '' ?>">
          <a class="nav-link" href="?p=view-fuel-logs">View Fuel Logs</a>
        </li>
        
      <?php endif ?>

      <li class="nav-item">
        <a class="nav-link" href="?p=logout"><button class="btn btn-light">Logout</button></a>
      </li>

    </ul>



  </div>

</nav>

