<?php session_start();


if (isset($_SESSION["user"])) {
    $udata = $_SESSION["user"];
?>
    <nav class="navbar fixed-top navbar-expand navbar-expand-lg navbar-expand-md navbar-expand-sm bg-body-tertiary " style="height: 35px" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-text text-decoration-none"><span class="text-warning">Hi <?php echo $udata["fname"] ?></span> | <span class="signOutTop" style="cursor: pointer; " onclick="signOut();">Sign out</span> | Help & Contacts</a>

            <div class="collapse d-flex" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item dropdown">
                        <h6><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fas fa-bars "></i>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user-profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="watchList.php">Watchlist</a></li>
                                <li><a class="dropdown-item" href="cart.php">My Cart</a></li>
                                <li><a class="dropdown-item" href="myOrders.php">My Orders</a></li>
                                <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                            </ul>
                        </h6>
                    </li>

                </ul>

            </div>
        </div>
    </nav>




<?php




} else {
   ?>
    <nav class="navbar fixed-top navbar-expand navbar-expand-lg navbar-expand-md navbar-expand-sm bg-body-tertiary " style="height: 35px" data-bs-theme="dark">
        <div class="container">
        <a class="navbar-brand" href="#">B<span class="text-warning">L</span>ACK<span class="text-warning"> 4</span>2</a>

            <div class="collapse d-flex" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item dropdown">
                        <h6><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fas fa-bars "></i>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user-profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="watchList.php">Watchlist</a></li>
                                <li><a class="dropdown-item" href="cart.php">My Cart</a></li>
                                <li><a class="dropdown-item" href="myOrders.php">My Orders</a></li>
                                <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                            </ul>
                        </h6>
                    </li>

                </ul>

            </div>
        </div>
    </nav>



   
   <?php
}


?>