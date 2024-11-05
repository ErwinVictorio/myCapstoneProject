<?php
  session_start();
  if (!$_SESSION['admin']){
      header('Location: ./Admin_login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <!-- cdn for icons -->
    <script src="https://kit.fontawesome.com/d4532539ca.js" crossorigin="anonymous"></script>
    <!-- chart cdn -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--    cdn sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body >
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">TOY KIDS TRADING</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="./Dashboard.php" class="sidebar-link">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Products.php" class="sidebar-link">
                        <i class="fa-solid fa-list-check"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./UserManagement.php" class="sidebar-link">
                        <i class="fa-regular fa-circle-user"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="Branch.php" class="sidebar-link">
                        <i class="fa-regular fa-map"></i>
                        <span>Branches</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="./EmployeeSales.php" class="sidebar-link">
                        <i class="fa-solid fa-coins"></i>
                        <span>Employee Sales</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="./SalesReport.php" class="sidebar-link">
                        <i class="fa-regular fa-chart-bar"></i>
                        <span>Sales Report</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                 <li class="sidebar-item">
                     <a href="../../AJAX/admin_logout.php" id="logout" class="btn">
                         <i class="lni text-danger lni-exit"></i>
                         <span>Logout</span>
                     </a >
                </li>
            </ul>
        </aside>
        <div style="background-color: #DDE8F0" class="p-3">
            <div class="container-fluid">
                <!-- fox boxes-->
                <div class="container-fluid row gap-3 p-3">
                    <!-- card -->
                    <div  style="background-color: #e7515a" class="card col-lg-5 text-light border-0">
                        <div class="card-body d-flex justify-content-around align-items-center ">
                            <div>
                                <h6 class="card-title fw-bold">LOW STACK ALERT</h6>
                                <?php
                                include_once '../controller/ProductController.php';
                                $controller = new \controller\ProductController();
                                $controller->DisplayLowStack();
                                ?>
                            </div>
                            <lord-icon
                                    src="https://cdn.lordicon.com/vihyezfv.json"
                                    trigger="loop"
                                    colors="primary:#ffffff"
                                    style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <a class="text-light"  href="./LowSatackList.php" >View</a>
                        </div>
                    </div>


                    <!-- card -->
                    <div  style="background-color:#4361ee" class="card col-lg-5 text-light border-0">
                        <div class="card-body d-flex justify-content-around align-items-center ">
                            <div>
                                <h6 class="card-title fw-bold">SALES</h6>
                                <?php
                                include_once '../controller/SalesController.php';
                                $Sales_controller = new \controller\SalesController();
                                $Sales_controller->DisplaySumSales();
                                ?>
                            </div>
                            <lord-icon
                                    src="https://cdn.lordicon.com/wyqtxzeh.json"
                                    trigger="loop"
                                    stroke="bold"
                                    colors="primary:#ffffff,secondary:#ffffff"
                                    style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <a class="text-light"  href="./LowStacks_List.php" >View</a>
                        </div>
                    </div>

                     <!-- card -->
                    <div  style="background-color:#2196f3" class="card col-lg-5 text-light border-0">
                        <div class="card-body d-flex justify-content-around align-items-center ">
                            <div>
                                <h6 class="card-title fw-bold">EMPLOYEE</h6>
                                <?php
                                include_once '../controller/UserController.php';
                                $controller = new \controller\UserController();
                                $controller->SumUser();
                                ?>
                            </div>
                            <lord-icon
                                    src="https://cdn.lordicon.com/bgebyztw.json"
                                    trigger="loop"
                                    colors="primary:#ffffff,secondary:#ffffff"
                                    style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <a class="text-light"  href="./LowStacks_List.php" >View</a>
                        </div>
                    </div>

             <!-- card -->
                    <div  style="background-color:#805dca" class="card col-lg-5 text-light border-0">
                        <div class="card-body d-flex justify-content-around align-items-center ">
                            <div>
                                <h6 class="card-title fw-bold">PRODUCTS</h6>
                                <?php
                                $controller = new \controller\ProductController();
                                $controller->DisplaySum();
                                ?>
                            </div>
                            <lord-icon
                                    src="https://cdn.lordicon.com/uecgmesg.json"
                                    trigger="loop"
                                    colors="primary:#ffffff,secondary:#ffffff"
                                    style="width:50px;height:50px">
                            </lord-icon>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <a class="text-light"  href="./LowStacks_List.php" >View</a>
                        </div>
                    </div>

                    <section class="container-fluid mt-3 d-lg-flex d-md-flex p-4 gap-3">
                        <div class="card bg-transparent col-lg-8">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="container d-flex flex-column gap-2 card bg-transparent p-4">

                            <div id="char_con" class="container-fluid row gap-2 p-2">
                                <?php
                                 $Sales_controller->DisplayBranch();
                                ?>
                            </div>
                              <div id="con_">
                                  <?php
                                   include_once '../controller/SalesController.php';
                                   $defaultDis = new \controller\SalesController();
                                   $defaultDis->DefaultDisplay();
                                  ?>
                                </div>
                        </div>
                    </section>
<!--                 main end-->
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
    </script>
<script src="../../AJAX/Dashboard.js"></script>

</body>
</html>

<