<?php
session_start();

include "connection.php";

$pid = $_GET['pid'];

$rs = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
$data = $rs->fetch_assoc();
$onum = uniqid();

?>

<div class="card mb-3">

    <img src="<?php echo $data['p_img']; ?>" alt="">
</div>
<div class="row">

    <h4 class="fw-light mb-4"><?php echo $data['p_title']; ?> <span class="text-secondary">#<?php echo $onum; ?></span> </h4>

</div>

<div class="row mt-4">
    <h5 class="text-secondary mb-5 text-warning fw-light">Rs. <?php echo $data['price']; ?> .00</h5>
</div>
<div class="row mb-1 mb-3">
    <div class="col-lg-12 col-md-4 col-sm-6 col-6">
        <div class="input-group col-lg-5">
            <button class="btn btn-sm btn-secondary btn-1 rounded-5 me-2" onclick="minus2();"><i class="fas fa-minus"></i></button>

            <input type="text" class="form-control form-control-sm text-center border-0 rounded-5" id="cartInputQty2" disabled id="qtyInput" value="1">
            <button class="btn btn-sm btn-secondary btn-2 rounded-5 ms-2" onclick="plus2(<?php echo $data['qty']; ?>);"><i class="fas fa-plus"></i></button>
        </div>

    </div>
</div>


<div class="h-25 d-flex align-items-end mt-5">
    <div class="col-12 ">

        <button class="btn btn-warning w-100" onclick="buyNowContinue(<?php echo $pid; ?>, '<?php echo $onum; ?>');">Continue to Payment</button>
    </div>

</div>



<?php




?>