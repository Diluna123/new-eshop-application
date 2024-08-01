<?php
include "connection.php";

session_start();


if (isset($_SESSION["user"])) {
    $pid = $_GET["pid"];

    $rs = Database::search("SELECT * FROM `products` WHERE `p_id` = '$pid'");
    $data = $rs->fetch_assoc();

?>
    <div class="modal-content">

        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <img src="<?php echo $data["p_img"] ?>" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <h4 class="text-warning fw-light">Rs. <?php echo $data["price"] ?></h4>
                    <div class="text-light fw-lighter mb-5" style="latter-spacing: 1px;""><?php echo $data["p_title"]; ?></div>
            <label for="" class=" form-label">Qty :</label>
                        <div class="input-group">
                            <button class="btn btn-secondary btn-sm btn1" onclick="minus();"><i class="fa-solid fa-minus"></i></button>
                            <input type="text" id="cartInputQty" value="1" class="form-control text-center form-control-sm" disabled>
                            <button class="btn btn-secondary btn-sm btn2" onclick="plus(<?php echo $data['qty']; ?>);"><i class="fa-solid fa-plus"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">

                <button type="button" class="btn btn-warning rounded-5" onclick="addToCartmain('<?php echo $pid; ?>')">Add To Cart </button>
            </div>
        </div>
    </div>









<?php





} else {


?>
    <div class="modal-content">

        <div class="modal-body">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center">
                    <h5 class="mb-3">Please Login First</h5>
                    <a href="signin.php" class="btn btn-sm btn-warning rounded-3">Sign In</a>

                </div>

            </div>
        </div>

    </div>
    </div>
<?php
}




?>