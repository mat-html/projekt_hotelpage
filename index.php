<?php

  include("navbar.php");

?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center ">
                
                <?php 
                    if(isset($_SESSION["useruid"])){
                        echo '<h1 class="mt-3">Willkommen back, '. $_SESSION["useruid"] .'</h1>';
                    }
                ?>

            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>
