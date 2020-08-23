<?php

include_once 'header.php';

$stmt = $item->getUsers();
$itemCount = $stmt->rowCount();
?>
<div class="container mt-5" style="max-width: 800">
    <h3 class="text-center mb-5">Users data</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Details</th>
                <th scope="col">Created</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($itemCount > 0) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    echo "<tr><th scope=row>$id</th><td>$name</td><td>$email</td><td>$mobile</td><td>$details</td><td>$created</td></tr>";
                }
            } else {
                echo "No user data found";
            }

            ?>
        </tbody>
    </table>


    <?php

    include_once 'footer.php';
