<?php

include 'connection.php';

$pid = $_GET["pid"];


$rs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $pid . "'");
$num = $rs->num_rows;
if ($num == 0) {
    echo "No products found";
} else {
    $rs2 = Database::search("SELECT * FROM `products` JOIN `catogerys` ON `products`.`catogerys_cat_id` = `catogerys`.`cat_id` JOIN `brand` ON `products`.`brand_br_id` = `brand`. `br_id` WHERE `products`.`p_id` = '" . $pid . "' ");
    $dataP = $rs2->fetch_assoc();
}
?>

<div>
    Privew Your Added Full Product Details.
</div>
<div class="mb-3 mt-4">
    <div class="img-preview2" id="propImageP_P">
        <img src="<?php echo $dataP["p_img"]; ?>" class="img-fluid rounded-3" id="" alt="Responsive image">


    </div>


</div>
<div class="mb-3">
    <?php
    if ($dataP["status_s_id"] == 1) {
    ?>
        <input type="text" class="form-control form-control-sm text-center text-bg-success" value="Active" disabled>


    <?php
    }else{
        ?>
        <input type="text" class="form-control form-control-sm text-center text-bg-danger" value="Inactive" disabled>
        
        
        <?php
    }


    ?>

</div>
<div class="mb-3">
    <label for="" class="form-label">Product Id :</label>
    <input type="text" class="form-control form-control-sm " id="pIdP" value="<?php echo $dataP["p_id"]; ?>" disabled>
</div>

<div class="mb-3">
    <label for="" class="form-label">Product Title :</label>
    <input type="text" class="form-control form-control-sm" id="pTitleP" value="<?php echo $dataP["p_title"]; ?>" disabled>
</div>
<div class="row mb-3">
    <div class="col-6">
        <label for="" class="form-label">Product Brnad:</label>
        <input type="text" class="form-control form-control-sm" id="pBrandP" value="<?php echo $dataP["brand_name"]; ?>" disabled>

    </div>
    <div class="col-6">
        <label for="" class="form-label">Product Catogery:</label>
        <input type="text" class="form-control form-control-sm" id="pCatP" value="<?php echo $dataP["catogery_name"]; ?>" disabled>

    </div>
</div>
<div class="mb-3">
    <label for="" class="form-label">Product Discription</label>
    <textarea name="" id="" cols="12" rows="3" class="form-control form-control-sm" disabled><?php echo $dataP["p_dis"]; ?></textarea>
</div>
<div class="mb-3">
    <label for="" class="form-label">Quantity:</label>
    <input type="text" class="form-control form-control-sm" id="pQtyP" value="<?php echo $dataP["qty"]; ?>" disabled>
</div>


<div class="mb-5">
    <label for="" class="form-label">Product Delevery Fees:</label>
    <input type="text" class="form-control form-control-sm" id="pDcostP" value="<?php echo $dataP["d_fees"]; ?>" disabled>
</div>


<div class="d-flex justify-content-center align-content-center">
    <h4 class="text-center text-secondary">Rs.<?php echo $dataP["price"]; ?> /=</h4>

</div>








<?php











?>