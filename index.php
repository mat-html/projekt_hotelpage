<?php

include("navbar.php");

?>


<section id="hero" class="d-flex align-items-center">
        <div class=" container">
    <div class="row">
        <div class="col-sm-12 text-center" id="div-home">
            <?php
            if (isset($_SESSION["useruid"])) {
                echo '<h1 class="display-1">Welcome back, ' . $_SESSION["useruid"] . '!</h1>';
            } else {
                echo '<h1 class="display-1">Welcome to Muster Hotel!</h1>';
                echo '<a class="btn btn-lg btn-outline-success mt-5" href="sign_up.php">Sign up</a>';
                echo '<a class="btn btn-lg btn-outline-secondary mt-5" href="login.php">Log in</a>';
            }
            ?>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>