<?php

include('connection.php');

$pid = $_GET["pid"];
echo $pid;

$productRs = Database::search("SELECT * FROM `products` WHERE `p_id` = '" . $pid . "'");
$productData = $productRs->fetch_assoc();








?>
<div class="row mt-5">
    <div class="col-lg-5 mt-5">
        <div class="card rounded-1">

            <img src="img/6692a042df828.jpeg" class="rounded-1" alt="">


        </div>
    </div>
    <div class="col-lg-7 mt-5">
        <h3 class="text-light fw-light"></h3>
        <p class="card-text text-secondary mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore accusantium nostrum laboriosam architecto consequuntur quidem praesentium aperiam! Facilis, aliquid explicabo!</p>
        <h2 class="text-warning fw-lighter mb-4">Rs. 2300.00</h2>
        <label for="" class="form-label text-secondary">Qty :</label>
        <div class="row mb-4">
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="input-group col-lg-5">
                    <button class="btn btn-sm btn-secondary btn-1 rounded-5 me-2" onclick="decrement();"><i class="fas fa-minus"></i></button>

                    <input type="text" class="form-control form-control-sm text-center border-0 rounded-5" disabled id="qtyInput" value="1">
                    <button class="btn btn-sm btn-secondary btn-2 rounded-5 ms-2" onclick="increment();"><i class="fas fa-plus"></i></button>
                </div>

            </div>
        </div>

        <label for="" class="form-label text-secondary">Shipping :</label>
        <div class="text-secondary mb-4">
            <div class="row">
                <div class="col-12">

                    We are committed to delivering your order promptly and efficiently. Please review our shipping details below:
                    <ul>
                        <li><b>Shipping Cost: </b>Rs. 300 for island-wide delivery.</li>
                        <li><b>Delivery Time:</b> Our standard delivery time is within 7 to 10 days for all island-wide shipments.</li>
                    </ul>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 d-grid mb-md-2 mb-lg-0 mb-sm-2 mb-2">

                <button class="btn  btn-warning rounded-4">Add To Cart</button>

            </div>
            <div class="col-lg-6 d-grid">

                <button class="btn btn-outline-warning rounded-4">Buy Now</button>

            </div>
        </div>



    </div>

</div>
<div class="row mt-5">
    <div class="col-lg-6">
        <div class="mb-3">
            <h3 class="text-light fw-light">Product Reviews</h3>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Reviews</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>

        </div>


    </div>
    <div class="col-lg-6">
        <h3 class="text-light fw-light">Questions about this Product</h3>
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </div>

</div>