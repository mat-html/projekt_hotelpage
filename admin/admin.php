<?php 

  include("header.php");
  include("navbar.php");
?>
<section id="hero" class="d-flex align-items-center">
    <div class=" container">
        <div class="row">
            <div class="col-12 text-center" id="div-home">
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<h1 class="home-page">Welcome back,<br>' . $_SESSION["useruid"] . '!</h1>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

  </body>
</html>
