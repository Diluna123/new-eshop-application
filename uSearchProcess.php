<?php
include 'connection.php';
$sKey = $_GET['searchKey'];
if (empty($sKey)) {
    $urs = Database::search("SELECT * FROM `cutomer_details`");
    $n = $urs->num_rows;
    if ($n == 0) {
?>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>No Users</td>
            <td></td>
            <td></td>
        </tr>




        <?php






    } else {
        for ($i = 0; $i < $n; $i++) {
            $data = $urs->fetch_assoc();
        ?>
            <tr onclick="viewUser('<?php echo $data['id']; ?>');" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample2" aria-controls="offcanvasExample2">
                <th scope="row"><?php echo $data["id"]; ?></th>
                <td><?php echo $data["fname"]; ?></td>
                <td><?php echo $data["lname"]; ?></td>
                <td><?php echo $data["mobile"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td>
                    <div class="op">
                        <?php

                        if ($data["status_s_id"] == 1) {
                        ?>

                            <button class="btn btn-danger btn-sm" onclick="blockUser('<?php echo $data['id']; ?>');"><i class="fas fa-ban"></i></button>

                        <?php

                        } else {
                        ?>

                            <button class="btn btn-success btn-sm" onclick="blockUser('<?php echo $data['id']; ?>');"><i class="fas fa-check"></i></button>
                        <?php

                        }
                        ?>
                    </div>
                </td>
            </tr>


        <?php
        }
    }
} else {

    $rs = Database::search("SELECT * FROM `cutomer_details` WHERE `fname` LIKE '%" . $sKey . "%' OR `lname` LIKE '%" . $sKey . "%' OR `mobile` LIKE '%" . $sKey . "%' OR `email` LIKE '%" . $sKey . "%' ");
    if ($rs->num_rows == 0) {

        ?>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>No Users</td>
            <td></td>
            <td></td>
        </tr>




        <?php
    } else {

        for ($i = 0; $i < $rs->num_rows; $i++) {
            $data = $rs->fetch_assoc();
        ?>
            <tr onclick="viewUser('<?php echo $data['id']; ?>');" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample2" aria-controls="offcanvasExample2">
                <th scope="row"><?php echo $data["id"]; ?></th>
                <td><?php echo $data["fname"]; ?></td>
                <td><?php echo $data["lname"]; ?></td>
                <td><?php echo $data["mobile"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td>
                    <div class="op">
                        <?php

                        if ($data["status_s_id"] == 1) {
                        ?>

                            <button class="btn btn-danger btn-sm" onclick="blockUser('<?php echo $data['id']; ?>');"><i class="fas fa-ban"></i></button>

                        <?php

                        } else {
                        ?>

                            <button class="btn btn-success btn-sm" onclick="blockUser('<?php echo $data['id']; ?>');"><i class="fas fa-check"></i></button>
                        <?php

                        }
                        ?>
                    </div>
                </td>
            </tr>


<?php
        }
    }
}



?>