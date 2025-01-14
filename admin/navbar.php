<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container mt-3">
            <a class="navbar-brand text-white" href="../admin.php">Muster Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="news_upload.php">News upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="reservation_confirmation.php">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="rooms.php">Rooms</a>
                    </li>
                    <?php
                        $current_page = $_SERVER['REQUEST_URI'];

                        // Check if the user is on the homepage
                        $is_home = ($current_page === '/projekt_hotel/index.php' || $current_page === '/projekt_hotel/');
                        if (isset($_SESSION["useruid"])) {
                        echo '<li class="nav-btn"><a class="btn btn-nav btn-outline" href="../includes/logout.php">Log out</a></li>';
                        } 
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>