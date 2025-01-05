<?php

require("../includes/dbh.php");

$sql = "Select * From user1";

$result = mysqli_query($conn, $sql);

include("header.php");
include("navbar.php");

?>
<div class="container mt-5">
    <table>
        <tr>
            <th>ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phonenumber</th>
            <th>Birthday</th>
            <th>User type</th>
            <th>Delete user</th>
        </tr>
            <form action="../includes/process-delete-user.php" method="POST">
                <?php
        while($row = mysqli_fetch_assoc($result))
        {

        ?>
        <tr>
            <td>
                <?php echo $row['id'] ?>
            </td>
            <td>
                <?php echo $row['usersLastName'] ?>
            </td>
            <td>
                <?php echo $row['usersFirstName'] ?>
            </td>
            <td>
                <?php echo $row['usersUid'] ?>
            </td>
            <td>
                <?php echo $row['usersEmail'] ?>
            </td>
            <td>
                <?php echo $row['usersPhonenumber'] ?>
            </td>
            <td>
                <?php echo $row['usersBirthday'] ?>
            </td>
            <td>
                <?php echo $row['usersType'] ?>
            </td>
            <td>
                <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                <button type="submit" name="submit">Delete</button>
            </td>
        
        <?php

        }

        ?>
        </form>
        </tr>
    </table>
</div>