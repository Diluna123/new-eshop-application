<?php
include "connection.php";
$sKey = $_GET['searchKey'];
if(empty($sKey)){
    $rs = Database::search("SELECT * FROM `invoice` JOIN `cutomer_details` ON `invoice`.`cutomer_details_id` = `cutomer_details`.`id` JOIN `pay_method` ON `invoice`.`pay_method_mid` = `pay_method`.`mid`  WHERE `invoice`.`order_status_id`='2' ORDER BY `invoice`.`date` DESC");
    for ($i = 0; $i < $rs->num_rows; $i++) {
        $dataO = $rs->fetch_assoc();

?>
        <tr onclick="viewOrder('<?php echo $dataO['order_num'] ?>')" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <th scope="row" class="fw-light">#<?php echo $dataO['order_num'] ?></th>
            <td><?php echo $dataO['date'] ?></td>
            <td><?php echo $dataO['email'] ?> </td>
            <?php
            if ($dataO["ad_order_s_ad_o_s"] == 1) {
            ?>
                <td><span class="badge bg-info">Processing</span></td>

            <?php

            } else if ($dataO["ad_order_s_ad_o_s"] == 2) {
            ?>
                <td><span class="badge bg-warning">Shipped</span></td>

            <?php

            } else if ($dataO["ad_order_s_ad_o_s"] == 3) {
            ?>
                <td><span class="badge bg-success">Completed</span></td>

            <?php

            } else {
            ?>
                <td><span class="badge bg-danger">Canceled</span></td>
            <?php

            }


            ?>


            <td>Rs. <?php echo $dataO['total'] ?></td>
            <td class="text-capitalize""><?php echo $dataO['method'] ?></td>
                  
        </tr>



        
        
        <?php






    }










}else{

    
    $rs = Database::search("SELECT * FROM `invoice` JOIN `cutomer_details` ON `invoice`.`cutomer_details_id` = `cutomer_details`.`id` JOIN `pay_method` ON `invoice`.`pay_method_mid` = `pay_method`.`mid`  WHERE `invoice`.`order_num` LIKE '%$sKey%' ");

    if ($rs->num_rows == 0) {
    
    ?>
        <tr>
            <th scope=" row">
            </th>
            <td></td>
            <td></td>
    
            <td>No Orders</td>
            <td></td>
            <td></td>
    
    
        </tr>
    
    <?php
    
    
    
    } else {
        $dataO = $rs->fetch_assoc();
    ?>
        <tr onclick="viewOrder('<?php echo $dataO['order_num'] ?>')" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <th scope="row" class="fw-light">#<?php echo $dataO['order_num'] ?></th>
            <td><?php echo $dataO['date'] ?></td>
            <td><?php echo $dataO['email'] ?> </td>
            <?php
            if ($dataO["ad_order_s_ad_o_s"] == 1) {
            ?>
                <td><span class="badge bg-info">Processing</span></td>
    
            <?php
    
            } else if ($dataO["ad_order_s_ad_o_s"] == 2) {
            ?>
                <td><span class="badge bg-warning">Shipped</span></td>
    
            <?php
    
            } else if ($dataO["ad_order_s_ad_o_s"] == 3) {
            ?>
                <td><span class="badge bg-success">Completed</span></td>
    
            <?php
    
            } else {
            ?>
                <td><span class="badge bg-danger">Canceled</span></td>
            <?php
    
            }
    
    
            ?>
    
    
            <td>Rs. <?php echo $dataO['total'] ?></td>
            <td class="text-capitalize""><?php echo $dataO['method'] ?></td>
                      
                      </tr>
        
    
    
        
        
        <?php
    
    }


}




    ?>