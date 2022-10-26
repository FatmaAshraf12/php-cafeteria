<?php
 include __DIR__ . '/layout/header.php';

    /*$db = "mysql:host=127.0.0.1:4306;dbname=cafeteria";
    $connect = new PDO($db, "root2", "");

    $per_page_record = 5;  // Number of entries to show in a page.
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
      $page=1;    
    }       

    $start_from = ($page-1) * $per_page_record;     

    $q = "SELECT orders.user_id , name , amount , orders.id as ordID FROM orders , users WHERE orders.user_id = users.id group by orders.user_id LIMIT $start_from, $per_page_record" ;
    
    $sql = $connect->prepare($q);
    $sql->execute();
    $orders = $sql->fetchAll(PDO::FETCH_ASSOC);


    $q2 = "SELECT orders.user_id , name  FROM orders , users WHERE orders.user_id = users.id group by orders.user_id" ;
    $sql = $connect->prepare($q2);
    $sql->execute();
    $all_users = $sql->fetchAll(PDO::FETCH_ASSOC);*/

?>








    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Checks</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Checks</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5 checks">
        <div class="container">
            <div class="row m-0">
                <div class="date-filter">
                    <form method="POST" action="checks.php">
                            <label for="from">From:</label>
                            <input type="date" id="from" name="from" onchange="filterDate()" value="<?php echo isset($_POST['from']) ? $_POST['from'] : '' ?>">
                            <label for="to">To:</label>
                            <input type="date" id="to" name="to" onchange="filterDate()" value="<?php echo isset($_POST['to']) ? $_POST['to'] : '' ?>">
                            <select id="users" name="users" onchange="filterDate()">                                    <option value="-1">all</option>

                                <?php foreach($all_users as $k):?>

                                    <option value=<?php echo $k['user_id'];?>><?php echo $k['name'];?></option>
                                <?php endforeach;?>
                            </select>
                           <!-- <input type="submit" name="filterOrders">
                            <input type="reset" name="resetFilterOrders">-->
                    </form>
                </div>
                    
                <table class="table text-center table1-orders">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1 ;foreach($orders as $k):?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $k['name'];?></td>
                                <td><?php echo $k['amount'];?></td>
                                <td><button type="button" class="btn btn-primary btn-custom" onclick="showOrder(<?php echo $k['user_id']; ?> )">View</button></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
           
                <div class="table2-content  w-75 m-auto"></div>

                <div class="order-items d-inline-block  w-75 m-auto">
                    <div class="row m-0">
                    </div>
                </div>

            </div>
            <div class="pagination">    
      <?php  
        $query = "SELECT * FROM orders , users WHERE orders.user_id = users.id group by orders.user_id " ; 
        $sql = $connect->prepare($query);
        $sql->execute();
         $total_records=count($sql->fetch());   
          
        echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='checks.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) 
              $pagLink .= "<a class = 'active' href='checks.php?page=".$i."'>".$i." </a>";   
                      
          else    
              $pagLink .= "<a href='checks.php?page=".$i."'> ".$i." </a>";        
        }     
        echo $pagLink;   
  
        if($page<$total_pages)  
            echo "<a href='checks.php?page=".($page+1)."'>  Next </a>";   
      ?>    
      </div> 

        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Amet elitr vero magna sed ipsum sit kasd sea elitr lorem rebum</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">Domain</a>. All Rights Reserved.</a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>

        let from = document.querySelector('input#from');
        let to = document.querySelector('input#to');
        let users = document.querySelector('select#users');

        function showOrder(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.querySelector('.table2-content').innerHTML = (this.responseText);
                }
            }
            xmlhttp.open("GET","requests.php?user_id="+str,true);
            xmlhttp.send();
        }

        function showOrderProducts(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.querySelector('.order-items .row').innerHTML = (this.responseText);
                }
            }
            xmlhttp.open("GET","requests.php?id="+str,true);
            xmlhttp.send();
        }


        function filterData(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.querySelector('.order-items .row').innerHTML = (this.responseText);
                }
            }
            xmlhttp.open("GET","requests.php?id="+str,true);
            xmlhttp.send();
        }


        function filterDate(str){
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.querySelector('.table1-orders tbody').innerHTML = (this.responseText);
                }
            }
            let fromVal = from.value;
            let toVal = to.value;
            let usersVal = users.value;

            xmlhttp.open("GET","requests.php?from="+fromVal+"&to="+toVal+"&users="+usersVal,true);
            xmlhttp.send();
        }
    </script>

<?php include __DIR__ . '/layout/footer.php';?>
