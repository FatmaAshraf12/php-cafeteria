<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link href="./assets/css/login.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
  div
  <section id="formSection">
    <?php
session_start();
  // var_dump('cnxllncxln');
if (isset($_SESSION['errors'])) {

	echo '<div class="alert alert-danger">';
	foreach ($_SESSION['errors'] as $error) {
		echo "<div>{$error}</div>";
	}
	echo '</div>';
	unset($_SESSION['errors']);
}

?>
    <div class="container align-content-center">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col col-md-6 p-3">
          <div class="outForm w-75 border-1 p-2 p-lg-5 p-3 m-auto mb-5 rounded">
            <form action="login_process.php" method="post" class="p-0">
              <div class="input-group mb-2">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                  aria-describedby="emailFeedback" />
                <div id="userNameFeedback" class="invalid-feedback">
                  Please enter valid Email.
                </div>
              </div>

              <div class="input-group mb-2">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                  aria-describedby="passwordFeedback" />
                <div id="passwordFeedback" class="invalid-feedback">
                  Password must be 8 chars at least and at least 1 capital
                  letter , 1 small , 1 number .
                </div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary" type="submit">
                  Submit form
                </button>
                <button class="btn btn-primary mt-2" type="reset">
                  reset
                </button>
                <a href="login2.html">
                  <h6 class="pt-2">Forgit Password ?</h6>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <script src="./assets/js/login.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</body>

</html>