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
    <?php
     require '../../includes/cdn.php'
    ?>
</head>
<style>
    ::root{
        Steel #7E7F90
        Blueberry #303150
        Night Sky #2B2B46
        Dodger #69ADFF
        Ice Cream #F7F7F8
        Light Grey #BDBDCB
        White #FFFFFF
        Baby Blue #C1DDFF , #74ACEF
    }
</style>
<body style="background-color: #2B2B46">

<!-- Modal for change password and username for admin -->
<div class="modal fade" id="updateCredentialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="updateCrdentialForm" class="modal-dialog modal-dialog-centered">
        <div  class="modal-content">
            <div style="background-color: #2B2B46" class="modal-header">
                <h5 class="modal-title fs-5 text-light" id="staticBackdropLabel">Update Credential</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $username = $_SESSION['admin'];
                include '../controller/authController.php';
                $admin = new \controller\authController();
                $admin->showCredential($username)
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button style="background-color: #2B2B46" type="submit" class="btn text-light">Save Changes</button>
            </div>
        </div>
    </form>
</div>


<!-- Modal for create new account for admin -->
<div class="modal fade" id="CreateCredentialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="createAdninAccount" action="../controller/authController.php" class="modal-dialog modal-dialog-centered">
        <div  class="modal-content">
            <div style="background-color: #2B2B46" class="modal-header">
                <h5 class="modal-title fs-5 text-light" id="staticBackdropLabel">Create New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input name="Newfullname" type="text" class="form-control" id="Newfullname" placeholder="Username">
                    <label for="Newfullname">Username</label>
                    <div id="Newfullname_msg" class="invalid-feedback"></div>
                </div>

                <div class="form-floating mb-3">
                    <input name="NewUsername" type="text" class="form-control" id="NewUsername" placeholder="Username">
                    <label for="NewUsername">Username</label>
                    <div id="NewUsername_msg" class="invalid-feedback"></div>
                </div>

                <div class="form-floating mb-3">
                    <input name="NewPassword" type="password" class="form-control" id="NewPassword" placeholder="Password">
                    <label for="NewPassword">Password</label>
                    <div id="NewPassword_msg" class="invalid-feedback"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button style="background-color: #2B2B46" type="submit" class="btn text-light">Create Now</button>
            </div>
        </div>
    </form>
</div>

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
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                       data-bs-target="#Settings" aria-expanded="false" aria-controls="auth">
                        <i class="fa-solid fa-gear"></i>
                        <span>Settings</span>
                    </a>
                    <ul id="Settings" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li style="cursor: pointer" class="sidebar-item">
                            <a data-bs-target="#updateCredentialModal" data-bs-toggle="modal" class="sidebar-link">Change Password</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" data-bs-target="#CreateCredentialModal" data-bs-toggle="modal" class="sidebar-link">Create New Account</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                     <a href="../../AJAX/admin_logout.php" id="logout" class="btn">
                         <i class="lni text-danger lni-exit"></i>
                         <span style="font-size: 10px" class="text-light">Logout</span>
                     </a >
                </li>
            </ul>
        </aside>
        <div class="p-3">
            <div class="container-fluid">
                <!-- fox boxes-->
                <div class="container-fluid row gap-3 p-3">
                    <!-- card -->
                    <div  style="background-color: #3b82f6" class="card col-lg-5 text-light border-0">
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
                    <div  style="background-color: #818cf8" class="card  col-lg-5 text-light border-0">
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
                    <div style="background-color: #34d399"  class="card  col-lg-5 text-light border-0">
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
                    <div  style="background-color: #14B898" class="card col-lg-5 text-light border-0">
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