<?php

include("navbar.php");

?>


<section id="hero" class="min-vh-100 d-flex align-items-center">
        <div class=" container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <?php
            if (isset($_SESSION["useruid"])) {
                echo '<h1 class="display-1">Welcome back, ' . $_SESSION["useruid"] . '!</h1>';
            } else {
                echo '<h1 class="display-1">Welcome to Muster Hotel!</h1>';
                echo '<a class="btn btn-brand mt-5" href="sign_up.php">Sign up</a></li>';
                echo '<a class="btn btn-brand login mt-5" href="login.php">Log in</a></li>';
            }
            ?>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>