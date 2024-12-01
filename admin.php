<?php 

  if(!isset($_SESION["userUid"]))
  {
    header('./login.php');
  }

  include("./admin/header.php");
  include("./admin/navbar.php");
?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse ps-5">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin/news_upload.php">
              <i class="bi bi-speedometer"></i> 
              News
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin/users.php">
              <i class="bi bi-person"></i> 
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="admin/reservation_confirmation.php">
              <i class="bi bi-tags"></i> 
              Reservations
            </a>
          </li>

        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
          </button>
        </div>
      </div>
  </div>
</div>


    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
