<?php

  include("navbar.php");

?>

    <div class="container">
        <h1 class="display-2">Sign Up</h1>
    </div>
    <div class="container">
        <form action="includes/process-signup.php" method="POST">
            <div class="input-group mt-3">
                <label for="last-name"></label>
                <span class="input-group-text">Last name</span>
                <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter your last name" required>
            </div>
            <br>
            <div class="input-group">
                <label for="first-name"></label>
                <span class="input-group-text">First name</span>
                <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter your first name" required>
            </div>
            <br>
            <div class="input-group">
                <label for="username"></label>
                <span class="input-group-text">Username</span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <br>
            <div class="input-group">
                <label for="email"></label>
                <span class="input-group-text">E-mail</span>
                <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" required>
            </div>
            <br>
            <div class="input-group">
                <label for="password"></label>
                <span class="input-group-text">Password</span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <br>
            <div class="input-group">
              <label for="confirm_password"></label><br>
              <span class="input-group-text">Confirm password</span>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password" required>
            </div>
            <br>
            <div class="input-group">
                <label for="phone-numb"></label>
                <span class="input-group-text">Phone number</span>
                <input type="text" class="form-control" name="phone-numb" id="phone-numb" placeholder="123 456 789" required>
            </div>
            <br>
            <div class="input-group">
                <lable for="date-of-birth"></lable>
                <span class="input-group-text">Date of birth</span>
                <input class="form-control" type="date" name="date-of-birth" id="date-of-birth" placeholder="DD.MM.YYYY" required>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-text">Gender</span>
                <select for="gender" name="gender" class="form-control">
                    <option name="gender" id="female" value="female">Female</option>
                    <option name="gender" id="male" value="male">Male</option>
                    <option name="gender" id="other" value="other">Other</option> 
                </select>
            </div>
            <br>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
            </div>
        </form>
    </div>
<?php
    include("footer.php");
?>
