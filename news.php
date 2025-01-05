<?php

  require("includes/dbh.php");

  $sql = "Select * From news";

  $result = mysqli_query($conn, $sql);

  include("./include()/navbar.php");
?>

<div class="container-fluid page-title">
  <div clas="row">
    <div class="text-center col-sm-12">
      <h1 class="h1">News</h1>
    </div>
  </div>
</div>

<div class="album py-5 bg-body-tertiary mt-3">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
        while ($row = mysqli_fetch_assoc($result)) {

      ?>

        <div class="col">
          <form action="includes/process-open-news.php" method="GET" class="d-inline">
            <div class="card shadow-sm">
              <img src="<?php echo $row['newsImg'] ?>" class="bd-placeholder-img card-img-top" width="100%"
                height="225" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#55595c"></rect>
              <div class="card-body">
                <p class="card-title" style="font-weight: bold;"><?php echo $row['newsTitle'] ?></p>
                <p class="card-text">
                  <?php
                    $fullDescription = $row['newsDescription'];
                    $preview = substr($fullDescription, 0, 100);
                    echo $preview . (strlen($fullDescription) > 100 ? '...' : '');
                  ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                <input type="hidden" name="newsId" value="<?php echo $row['newsId']; ?>">
                <button type="submit" name="submit" class="btn btn-nav btn-outline mt-3">View</button>
                  <small class="text-body-secondary">9 mins</small>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php 
        }
      ?>
    </div>
  </div>
</div>

<?php
include("./include()/footer.php");
?>