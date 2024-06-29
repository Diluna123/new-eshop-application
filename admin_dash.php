<!DOCTYPE html>
<?php include "connection.php"; ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .mybtn {
      font-size: 90px;

    }
    .mycd{
      transition: .3s;

    }
    .mycd:hover{
      cursor: pointer;
      background-color: #bdbdbd;
    }

    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      background: #343a40;
      color: #fff;
      transition: all 0.3s;
    }

    #sidebar.active {
      margin-left: -250px;
    }

    #sidebar .sidebar-header {
      padding: 20px;
      background: #343a40;
    }

    #sidebar ul.components {
      padding: 20px 0;
    }

    #sidebar ul li a {
      padding: 10px;
      font-size: 1.1em;
      display: block;
      color: #fff;
      text-decoration: none;
    }

    #sidebar ul li a:hover {
      color: #343a40;
      background: #f1b901;
    }

    #content {
      width: 100%;
      padding: 20px;
      min-height: 100vh;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .card {
      margin-bottom: 20px;
    }

    .table-responsive {
      margin-top: 20px;
    }

    .d-none {
      display: none;
    }

    .img-preview img {
      max-width: 100%;
      max-height: 50%;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>BLACK 42 Dashboard</h3>
      </div>

      <ul class="list-unstyled components">
        <li class="active">
          <a href="#" data-content="home">Home</a>
        </li>
        <li>
          <a href="#" data-content="manage-products">Manage Products</a>
        </li>
        <li>
          <a href="#" data-content="m-users">Manage Users</a>
        </li>
        <li>
          <a href="#" data-content="contact">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <i id="sidebarCollapse" class="fas fa-bars menu-icon"></i>
      <div id="main-content">
        <!-- Home Section Content -->
        <div id="home" class="content-section">
          <h2>Dashboard</h2>
          <div class="row">
            <div class="col-md-3">
              <div class="card text-white bg-primary">
                <div class="card-body">
                  <h5 class="card-title">Users</h5>
                  <p class="card-text">1,234</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white bg-success">
                <div class="card-body">
                  <h5 class="card-title">Revenue</h5>
                  <p class="card-text">$12,345</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white bg-warning">
                <div class="card-body">
                  <h5 class="card-title">Orders</h5>
                  <p class="card-text">345</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card text-white bg-danger">
                <div class="card-body">
                  <h5 class="card-title">Issues</h5>
                  <p class="card-text">23</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Sales Chart</h5>
                </div>
                <div class="card-body">
                  <canvas id="salesChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Recent Activities</h5>
                </div>
                <div class="card-body">
                  <ul class="list-unstyled">
                    <li>User John registered</li>
                    <li>Order #1234 was placed</li>
                    <li>Revenue of $543 was recorded</li>
                    <li>New issue reported by user Jane</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Home Section Content -->

        <!-- Manage Products Section Content -->
        <div id="manage-products" class="content-section d-none">
          <h2 class="mb-5">Manage Products</h2>
          

          <!-- cardds -->
          <div class="col-12" id="mytb-products">
            <div class="row row-cols-1 row-cols-md-6 g-4">
              <?php

              $resP = Database::search("SELECT * FROM `products` JOIN `catogerys` ON `products`.`catogerys_cat_id` = `catogerys`.`cat_id` JOIN `brand` ON `products`.`brand_br_id` = `brand`. `br_id` ORDER BY `products`.`p_id` ASC ");
              $numP = $resP->num_rows;
              if ($numP > 0) {

                for ($x = 0; $x < $numP; $x++) {
                  $pData = $resP->fetch_assoc();

              ?>
                  <div class="col">
                    <div class="card  border-success h-100">
                      <img src="<?php echo $pData["p_img"]; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h6 class="card-title"><?php echo $pData["p_title"]; ?> (<?php echo $pData["brand_name"]; ?>)</h6>
                        <h6 class="card-text">Qty <?php echo $pData["qty"]; ?> Left</h6>
                        <p class="card-text">Rs.<?php echo $pData["price"]; ?></p>
                        <div class="card-footer">
                          <div class="row">
                            <button class="btn btn-sm btn-outline-warning" onclick='openUpdateProductModal(<?php echo $pData["p_id"]; ?>);'>Update</button>
                          </div>
                          <div class="row mt-2 ">
                            <?php
                            if ($pData["status_s_id"] == 1) {
                            ?>
                              <button class="btn btn-sm btn-outline-danger col-6 " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Inactive</button>
                            <?php


                            } else {

                            ?>
                              <button class="btn btn-sm btn-outline-success col-6 " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Active</button>


                            <?php
                            }



                            ?>





                            <button class="btn btn-sm btn-outline-secondary col-6" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOffers" aria-controls="offcanvasOffers" onclick="privewProduct(<?php echo $pData['p_id']; ?>);"><i class="fa-solid fa-magnifying-glass"></i></button>



                          </div>

                        </div>
                      </div>
                    </div>
                  </div>




                <?php


                }
              } else {
                ?>
                <div class="col">
                  <div class="card h-100 d-flex justify-content-center align-items-center">

                    <div class="card-body">
                      <h5 class="card-title">Add Product</h5>

                    </div>
                  </div>
                </div>





              <?php




              }




              ?>
              <div class="col">
                <div class="card border-secondary h-100 d-flex justify-content-center align-items-center mycd" onclick="openAddProductModal();">

                  <div class="p-5 border-secondary rounded-5">
                    <button class="btn bg-transparent btn-sm btn-outline-secondary rounded-5 border-0 mybtn opacity-25"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>






            </div>
          </div>



















          <!-- cards end -->

          <!-- offcanvas start -->
          <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasOffers" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasExampleLabel">Privew Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" id="canBody">
              





            </div>
          </div>
          <!-- offcanvas end -->







          <div class="table-my" id="mytb-products">
            <!-- product table begin -->

            <!-- table end product -->




          </div>
        </div>
        <!-- Manage product / add product section add product model -->

        <div class="modal fade" id="addProduct" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-theme="dark">
          <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-light">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Add New Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <!-- modal form begin -->


                  <div class="mb-2">
                    <label for="" class="form-label">Product Title :</label>
                    <input type="text" id="p_ti" class="form-control form-control-sm">
                  </div>
                  <div class="mb-2">
                    <div class="row">
                      <div class="col-6">
                        <label for="" class="form-label">Product Catogery :</label>
                        <div id="newCatDiv">
                          <select name="" id="p_cat" class="form-control form-control-sm">
                            <option value="00">Select Catogery</option>
                            <?php
                            $res = Database::search("SELECT * FROM `catogerys`");
                            $nums = $res->num_rows;
                            for ($x = 0; $x < $nums; $x++) {
                              $dataa = $res->fetch_assoc();
                            ?>
                              <option value="<?php echo $dataa["cat_id"]; ?>"><?php echo $dataa["catogery_name"]; ?></option>

                            <?php
                            }


                            ?>



                          </select>

                        </div>


                      </div>
                      <div class="col-6">
                        <label for="" class="form-label">Add new Catogery :</label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" id="newCat">
                          <button class="btn btn-sm btn-warning" onclick="addCatogery();">Add</button>

                        </div>

                      </div>
                    </div>


                  </div>

                  <div class="mb-2">
                    <div class="row">
                      <div class="col-6">
                        <label for="" class="form-label">Product Brand :</label>
                        <div id="newBrandDiv">
                          <select name="" id="p_brand" class="form-control form-control-sm">
                            <option value="00">Select Brand</option>
                            <?php

                            $res_brnad  = Database::search("SELECT * FROM `brand`");
                            $nums_brnad = $res_brnad->num_rows;
                            for ($x = 0; $x < $nums_brnad; $x++) {
                              $data_brnad = $res_brnad->fetch_assoc();
                            ?>
                              <option value="<?php echo $data_brnad["br_id"]; ?>"><?php echo $data_brnad["brand_name"]; ?></option>



                            <?php
                            }



                            ?>





                          </select>
                        </div>

                      </div>
                      <div class="col-6">
                        <label for="" class="form-label">Add new Brand :</label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" id="newBrandName">
                          <button class="btn btn-sm btn-warning" onclick="addBrand();">Add</button>

                        </div>

                      </div>
                    </div>


                  </div>

                  <div class="mb-2">
                    <label for="" class="form-label">Product Qty :</label>
                    <input type="number" id="p_qty" min="1" class="form-control form-control-sm" value="1">
                  </div>

                  <div class="mb-2">
                    <label for="" class="form-label">Price Per Product :</label>
                    <div class="input-group">
                      <span class="input-group-text">Rs.</span>
                      <input type="text" id="p_price" class="form-control form-control-sm" placeholder="Ex : Rs. 2300">
                    </div>

                  </div>

                  <div class="mb-2">

                    <label for="" class="form-label">Delevery Cost :</label>
                    <div class="input-group">
                      <span class="input-group-text">Rs.</span>
                      <input type="text" id="d_cost" class="form-control form-control-sm" placeholder="Ex : Rs. 300">
                    </div>

                  </div>

                  <div class="mb-2">
                    <label for="" class="form-label">Product Discription :</label>
                    <textarea id="p_dis" class="form-control form-control-sm" name="" id="" cols="12" rows="5"></textarea>
                  </div>

                  <div class="mb-2">


                    <label for="" class="form-label">Image Privew :</label><br>
                    <div class="img-preview" id="propImageP">
                      <img src="img/img-ng.png" class="img-fluid rounded-3" id="" alt="Responsive image">


                    </div>

                  </div>
                  <div class="mb-2">
                    <label for="" class="form-label">Product Image :</label> <br>
                    <input type="file" id="propImageS" class="form-control-sm mb-2 " onchange="loadFile();"><br>

                  </div>



                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" onclick="addProduct();">Add Product</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Update product model Begin -->

        <div class="modal fade" id="UpdateProduct" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-theme="dark">
          <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content text-light">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="modelUpdateBody">

              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" onclick="updateProduct(<?php echo $pData['p_id']; ?>);">Update Product</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Update product model End -->





        <!-- Manage product / add product section add product model section end -->
        <!-- End Manage Products Section Content -->

        <!-- Additional sections like Services and Contact -->
        <div id="m-users" class="content-section d-none">
          <h2>Manage Users</h2>
          <p>These are the services we offer.</p>
        </div>

        <div id="contact" class="content-section d-none">
          <h2>Contact</h2>
          <p>Get in touch with us through this page.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="js/script.js"></script>
</body>

</html>