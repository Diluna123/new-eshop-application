<!DOCTYPE html>
<?php include "connection.php"; ?>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;

    }

    .mybtn {
      font-size: 90px;

    }

    .mycd {
      transition: .3s;
      height: 95%;

    }

    .mycd:hover {
      cursor: pointer;
      background-color: #bdbdbd;
    }

    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
    }

    .my-p-c {
      transition: .3s;
      cursor: pointer;
      height: 95%;


    }

    .btn-cl {
      margin: 15px 20px 5px 20px;
      opacity: 0;
      transform: translateY(-5px);
      transition: .3s;

    }

    .my-p-c:hover {
      box-shadow:
        2.4px 4.4px 24.5px rgba(0, 0, 0, 0.02),
        4.4px 8px 37.4px rgba(0, 0, 0, 0.028),
        6.3px 11.4px 43.6px rgba(0, 0, 0, 0.035),
        8.2px 14.9px 46.4px rgba(0, 0, 0, 0.042),
        10.6px 19.2px 50.3px rgba(0, 0, 0, 0.05),
        16px 29px 88px rgba(0, 0, 0, 0.07);


    }

    .my-p-c:hover .btn-cl {
      opacity: 1;
      transform: translateY(0px);

    }

    .btn-wrap {
      transition: .3s;
      height: 10px;
      opacity: 0;
      border-radius: 10px 10px 0 0;
    }

    .my-p-c:hover .btn-wrap {
      background-color: transparent;
      backdrop-filter: blur(5px);
      height: 28%;
      opacity: 1;
      box-shadow:
        0px 0px 0.2px rgba(0, 0, 0, 0.034),
        0px 0px 10.6px rgba(0, 0, 0, 0.049),
        0px 0px 22.8px rgba(0, 0, 0, 0.06),
        0px 0px 36.1px rgba(0, 0, 0, 0.071),
        0px 0px 50.2px rgba(0, 0, 0, 0.086),
        0px 0px 66px rgba(0, 0, 0, 0.13);
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

    .table {
      font-family: Roboto;
    }

    /* Custom CSS to expand offcanvas width */
    .custom-offcanvas-width {
      width: 600px !important;
      /* Set your desired width */
    }

    @media print {
      .btn {
        display: none;
      }

      .table-responsive {
        display: none;
      }

      #sidebar {
        display: none;
      }

      #content {
        display: none;
      }

      .custom-offcanvas-width {
        width: 1920px !important;
        /* Set your desired width */
      }

     

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
          <a href="#" data-content="contact">Orders</a>
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
          <h2 class="mb-1">Manage Products</h2>
          <p class="form-text mb-5 text-secondary">To Add new Products, Edite Products, Active and Inactive products</p>


          <!-- cardds -->
          <div class="col-12" id="mytb-products">
            <div class="row row-cols-1 row-cols-md-1 g-4">
              <div class="col">
                <div class="card border-secondary  d-flex justify-content-center align-items-center mycd" onclick="openAddProductModal();">

                  <div class="p-5 border-secondary text-center rounded-5">
                    <button class="btn bg-transparent btn-sm btn-outline-secondary rounded-5 border-0 mybtn opacity-25"><i class="fas fa-plus"></i></button>
                    <h3 class="text-secondary">Add Products</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3 mb-4">
              <div class="col-lg-8">
                <h3 class="">Your Products</h3>
              </div>
              <div class="col-lg-4">
                <div class="input-group">
                  <select name="" class="form-control form-control-sm" id="" placeholder="Search" onchange="searchAdProduct(this.value);">
                    <option value="00">All</option>
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



                    ?>

                  </select>
                  <button class="btn btn-outline-secondary"><i class="fab fa-searchengin "></i></button>

                </div>
              </div>
            </div>

            <div id="AdProducts">



              <div class="row row-cols-1 row-cols-md-6 g-4">


                <?php

                $resP = Database::search("SELECT * FROM `products` JOIN `catogerys` ON `products`.`catogerys_cat_id` = `catogerys`.`cat_id` JOIN `brand` ON `products`.`brand_br_id` = `brand`. `br_id` ORDER BY `products`.`p_id` ASC ");
                $numP = $resP->num_rows;
                if ($numP > 0) {

                  for ($x = 0; $x < $numP; $x++) {
                    $pData = $resP->fetch_assoc();

                ?>
                    <div class="col ">
                      <div class="card   my-p-c ">
                        <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasOffers" aria-controls="offcanvasOffers" onclick="privewProduct(<?php echo $pData['p_id']; ?>);">

                          <img src="<?php echo $pData["p_img"]; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                          <h6 class="card-title"><?php echo $pData["p_title"]; ?> (<?php echo $pData["brand_name"]; ?>)</h6>
                          <h6 class="card-text">Qty <?php echo $pData["qty"]; ?> Left</h6>
                          <p class="card-text">Rs.<?php echo $pData["price"]; ?></p>





                        </div>
                        <div class=" position-absolute d-flex justify-content-center align-items-end w-100 h-100 ">
                          <div class=" w-100 btn-wrap">
                            <div class="btn-cl">
                              <div class="row col-12 ">
                                <?php
                                if ($pData["status_s_id"] == 1) {
                                ?>
                                  <div class="col-10 d-grid">
                                    <button class="btn btn-sm btn-outline-danger  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Inactive</button>
                                  </div>

                                <?php


                                } else {

                                ?>
                                  <div class="col-10 d-grid">

                                    <button class="btn btn-sm btn-outline-success  " onclick='updateProductStatus(<?php echo $pData["p_id"] ?>)'>Active</button>
                                  </div>


                                <?php
                                }



                                ?>




                                <div class="col-2 d-grid ">

                                  <button class="btn  btn-sm btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasOffers" aria-controls="offcanvasOffers" onclick="privewProduct(<?php echo $pData['p_id']; ?>);"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>



                              </div>
                              <div class="row mt-2">
                                <div class="col-12 d-grid">

                                  <button class="btn btn-sm btn-outline-warning" onclick='openUpdateProductModal(<?php echo $pData["p_id"]; ?>);'>Update</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>




                  <?php


                  }
                } else {
                  ?>
                  <div class="row col-12 mt-5">
                    <div class="text-danger">
                      <h6>No Products in this Catogery</h6>
                    </div>
                  </div>





                <?php




                }




                ?>







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
                    <div class="row">
                      <div class="col-6">
                        <label for="" class="form-label">Product Colour :</label>
                        <div id="newColorDiv">
                          <select name="" id="p_brand" class="form-control form-control-sm">
                            <option value="00">Select Colour</option>
                            <?php

                            $res_brnad  = Database::search("SELECT * FROM `colour`");
                            $nums_brnad = $res_brnad->num_rows;
                            for ($x = 0; $x < $nums_brnad; $x++) {
                              $data_brnad = $res_brnad->fetch_assoc();
                            ?>
                              <option value="<?php echo $data_brnad["co_id"]; ?>"><?php echo $data_brnad["colour_name"]; ?></option>



                            <?php
                            }



                            ?>





                          </select>
                        </div>

                      </div>
                      <div class="col-6">
                        <label for="" class="form-label">Add new Colour:</label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" id="newColourName">
                          <button class="btn btn-sm btn-warning" onclick="addColour();">Add</button>

                        </div>

                      </div>
                    </div>


                  </div>

                  <div class="mb-2">
                    <div class="row">
                      <div class="col-6">
                        <label for="" class="form-label">Size : </label>
                        <div id="newSizeDiv">
                          <select name="" id="p_brand" class="form-control form-control-sm">
                            <option value="00">Select Size </option>
                            <?php

                            $res_size  = Database::search("SELECT * FROM `size`");
                            $nums_size = $res_size->num_rows;
                            for ($x = 0; $x < $nums_size; $x++) {
                              $data_size = $res_size->fetch_assoc();
                            ?>
                              <option value="<?php echo $data_size["s_id"]; ?>"><?php echo $data_size["size_name"]; ?></option>



                            <?php
                            }



                            ?>





                          </select>
                        </div>

                      </div>
                      <div class="col-6">
                        <label for="" class="form-label">Add new Size :</label>
                        <div class="input-group">
                          <input type="text" class="form-control form-control-sm" id="newBrandName">
                          <button class="btn btn-sm btn-warning" onclick="addSize();">Add</button>

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
                    <input type="file" id="propImageS" class="form-control-sm mb-2 " accept="image/png, image/jpeg" onchange="loadFile();"><br>

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
                <button class="btn btn-primary" onclick="updateProduct();">Update Product</button>
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
          <div class="row mt-5">
            <div class="col-12">
              <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                  <div class="col-lg-4 col-md-8 col-sm-12 col-12">
                    <div class="row">
                      <div class="col-lg-10 col-md-8 col-sm-8 col-8">
                         <input type="text" class="form-control form-control-sm" id="searchUser" placeholder="Search Users">
                      </div>
                      <div class="col-lg-2 col-md-4 col-sm-4 col-4 d-grid">
                         <button class="btn d-grid btn-sm btn-warning rounded-2" onclick="uSearch();">Search</button>
                      </div>
                     
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover" id="userTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">E - mail</th>
                      <th scope="col">Options</th>
                    </tr>
                  </thead>
                  <tbody id="uTBody">
                    <?php

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
                    ?>



                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-end">
                  <button class="btn btn-primary mb-3" onclick="printTable()">Print User List</button>
                </div>
              </div>

            </div>

          </div>

        </div>

        <div id="contact" class="content-section d-none">
          <h2>Orders</h2>
          <p>Get in touch with us through this page.</p>
          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              <div class="col-lg-5 col-md-10 col-sm-12 col-12">
                <div class="row">
                  <div class="col-3">
                    <select name="" id="filterOrder" class="form-select form-select-sm" onchange="filterOrder();">
                      <option value="00">All</option>
                      <option value="1">Processing</option>
                      <option value="2">Shipped</option>

                    </select>
                  </div>
                  <div class="col-7"> <input type="text" id="oSearch" class="form-control form-control-sm " placeholder="Search"></div>
                  <div class="col-2"><button class="btn btn-warning btn-sm" onclick="oSearch();">Search</button></div>


                </div>


              </div>
            </div>
          </div>


          <div class="table-responsive" id="oTab">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Order Number</th>
                  <th scope="col">Date</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Status</th>
                  <th scope="col">Total</th>
                  <th scope="col">Pay Method</th>


                </tr>
              </thead>
              <tbody id="newOtable">
                <?php

                $ors = Database::search("SELECT * FROM `invoice` JOIN `cutomer_details` ON `invoice`.`cutomer_details_id` = `cutomer_details`.`id` JOIN `pay_method` ON `invoice`.`pay_method_mid` = `pay_method`.`mid` WHERE `invoice`.`order_status_id`='2' ORDER BY `invoice`.`date` DESC");
                $n = $ors->num_rows;
                if ($n == 0) {
                ?>
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>

                    <td>No Orders You have</td>
                    <td></td>
                    <td></td>


                  </tr>


                  <?php
                } else {
                  for ($i = 0; $i < $n; $i++) {
                    $dataO = $ors->fetch_assoc();
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


              </tbody>
            </table>
          </div>
          <!-- Completed Orders -->
          <div class=" row mt-3">
                        <h3>Completed Orders</h3>
                        <div class="table-responsive" id="oTabC">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Date</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Pay Method</th>


                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              $ors = Database::search("SELECT * FROM `invoice` JOIN `cutomer_details` ON `invoice`.`cutomer_details_id` = `cutomer_details`.`id` JOIN `pay_method` ON `invoice`.`pay_method_mid` = `pay_method`.`mid` WHERE `invoice`.`order_status_id`='3' ORDER BY `invoice`.`date` DESC");
                              $n = $ors->num_rows;
                              if ($n == 0) {
                              ?>
                                <tr>
                                  <th scope="row"></th>
                                  <td></td>
                                  <td></td>

                                  <td>No Orders You have</td>
                                  <td></td>
                                  <td></td>


                                </tr>


                                <?php
                              } else {
                                for ($i = 0; $i < $n; $i++) {
                                  $dataO = $ors->fetch_assoc();
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


              </tbody>
            </table>
          </div>


          </div>





        </div>
      </div>
    </div>
  </div>

  <div class=" offcanvas offcanvas-end custom-offcanvas-width" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                      <div class="" id="off-content">

                                      </div>
                                      <div class="loding h-100 d-flex flex-column justify-content-center align-items-center d-none" id="loading">
                                        <div class="spinner-border text-warning" role="status">
                                          <span class="visually-hidden">Loading...</span>

                                        </div>
                                        <h5 class="mt-2 fw-light text-secondary">Processing</h5>
                                      </div>

                        </div>

                        <div class="offcanvas offcanvas-end custom-offcanvas-width" tabindex="-1" id="offcanvasExample2" aria-labelledby="offcanvasExampleLabel">
                          <div id="viewUsreCon">

                          </div>

                        </div>

                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script src="js/script.js"></script>
                        <script>
                          function printTable() {
                            var divToPrint = document.getElementById("userTable");
                            var newWin = window.open("");
                            newWin.document.write('<h1 class="mt-3 mb-4">Customer List</h1>');
                            newWin.document.write(divToPrint.outerHTML);
                            newWin.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">');
                            newWin.document.close();
                            newWin.focus();
                            newWin.print();
                            newWin.close();
                          }

                          function printDiv() {
                            print();
                          }
                        </script>
</body>

</html>