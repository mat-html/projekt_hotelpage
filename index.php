<?php

include("./include()/navbar.php");
include("cockie_handler.php");

?>


<section id="hero" class="d-flex align-items-center">
    <div class=" container">
        <div class="row">
            <div class="col-12 text-center" id="div-home">
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<h1 class="home-page">Welcome back,<br>' . $_SESSION["useruid"] . '!</h1>';
                } else {
                    echo '<h1 class="home-page">Welcome to Muster<br>Hotel!</h1>';
                    echo '<div class="btn-group">';
                    echo '<a class="btn btn-nav btn-outline mt-3" href="sign_up.php">Sign up</a>';
                    echo '<a class="btn btn-nav btn-outline mt-3" href="login.php">Log in</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="arrow-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-arrow-down"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
            </svg>
        </div>

    </div>
</section>

<?php
include("./include()/footer.php");
//test
?>