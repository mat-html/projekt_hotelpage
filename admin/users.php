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
                    <?php echo $row['usersBirthday'] ?>
                </td>
                <td>
                    <?php echo $row['usersType'] ?>
                </td>
            </tr>
        <?php

        }

        ?>
    </tr>
</table>
</div>