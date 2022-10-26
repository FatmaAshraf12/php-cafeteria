<?php
include __DIR__ . '/layout/header.php';

require_once __DIR__ . '/classes/order.php';
$order = new Order();
$orders = $order->getWith("users" , "user_id" , "id");
?>

   

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Orders</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Orders</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
        <div class="row">
            <?php $i = 1;
            foreach ($orders as $single_order) : ?>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">EXT</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $single_order['created_at']; ?></td>
                            <td><?php echo $single_order['name']; ?></td>
                            <td><?php echo $single_order['room']; ?></td>
                            <td><?php echo $single_order['ext']; ?></td>
                            <td>
                                <select name="status" id="status">
                                    <option value="done">Processing</option>
                                    <option value="done">Done</option>
                                    <option value="ready">Ready to deliver</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="order-content w-100">
                    <div class="row m-0">
                        <div class="col-md-2 text-center single-order-product">
                            <img width="130" src='http://localhost/phpProject-main/phpProject-main/img/menu-3.jpg' class="position-relative" alt="">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-num">
                                <span class="visually-hidden">150</span>
                            </span>
                            <p>COFFEe</p>
                            <span class="amount">255</span>
                        </div>
                        <div class="col-md-2 text-center single-order-product">
                            <img width="130" src='http://localhost/phpProject-main/phpProject-main/img/menu-3.jpg' class="position-relative" alt="">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-num">
                                <span class="visually-hidden">150</span>
                            </span>
                            <p>COFFEe</p>
                            <span class="amount">255</span>
                        </div>
                        <div class="col-md-2 text-center single-order-product">
                            <img width="130" src='http://localhost/phpProject-main/phpProject-main/img/menu-3.jpg' class="position-relative" alt="">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-num">
                                <span class="visually-hidden">150</span>
                            </span>
                            <p>COFFEe</p>
                            <span class="amount">255</span>
                        </div>
                    </div>
                    <div class="total">
                        <p> Total : 450 LE</p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>

           
        </div>
    </div>
    <!-- Contact End -->

    <?php include __DIR__ . '/layout/footer.php';?>


   