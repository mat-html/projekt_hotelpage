<?php
    include("include()/navbar.php");
?>
<main class="form-signin w-100 m-auto">
    <form action="./includes/process-reservation.php" method="POST">
        <div class="container" id="form">
            <div class="row">
                <div class="col">
                    <input class="form-control mb-3" type="date" name="check-in" placeholder="check-in date">
                </div>
                <div class="col">
                    <input class="form-control mb-3" type="date" name="check-out" placeholder="check-out date">
                </div>
            
            <!-- dropdown menu -->
             <div class="mb-3 col-3">
            <select class="form-select" name="choose-room" aria-label="Default select example">
                <option selected>Select your type of room</option>
                <option value="1">Room 1</option>
                <option value="2">Room 2</option>
                <option value="3">Room 3</option>
            </select>
          </div>
            <!-- dropdown menu ends -->
            <!-- checkboxes -->
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="true" name="breakfast" id="breakfast">
                <label class="form-check-label" for="breakfast">
                    Breakfast
                </label>
            </div>
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="true" name="parkingplace" id="parkingplace">
                <label class="form-check-label" for="parkingplace">
                    Parkingplace
                </label>
            </div>
            <div class="form-check mb-3 col">
                <input class="form-check-input" type="checkbox" value="true" name="pets" id="pets">
                <label class="form-check-label" for="pets">
                    Pets
                </label>
            </div>
          </div>
            <!-- checkboxes end -->
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-nav btn-outline mt-3">Reserve</button>
            </div>
    </form>
    </div>
</main>

<?php
    include("./include()/footer.php");
?>