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
<main>
    <div class="row">
        <div class="col-5">
            <p>
                This 4-star superior hotel with panoramic views of the Arlberg ski area is located in the car-free village of Oberlech, directly on the ski slopes. It features an award-winning gourmet restaurant and an indoor pool.
            </p>
        </div>
        <div class="col-5">
            <p>
                The Hotel & Chalet Montana is owned by the famous Austrian skier Patrick Ortlieb and offers comfortable and elegant rooms in Alpine style with wooden furniture. All rooms are equipped with a flat-screen cable TV and a modern bathroom. Some rooms include a whirlpool and a balcony.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
                <h4 class="h4">SPA & WELLNES</h4>
        </div>
        <div class="col-5">
            <p>
                The wellness facilities include various saunas, a steam bath, an infrared cabin, and a fitness room. Massages are also available upon request. In winter, you can relax on the sun terrace. A ski school is located directly opposite Hotel Montana.
            </p>
        </div>
    </div>
</main>

<?php
include("./include()/footer.php");
?>