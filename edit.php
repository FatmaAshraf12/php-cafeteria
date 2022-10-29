<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="assets/css/regester.css" rel="stylesheet" />
</head>
<?php
require_once('User.php');

$user=User::get_user($_REQUEST['id']);
// var_dump($user);

?>
<body>
  <div class="login-page">
    <div class="form">
      <form action="./edite_process.php" method="post" enctype="multipart/form-data">
        <input  name="id"  id="id" type="text" placeholder=" id" value="<?= $user['id']?>"> 
        <input  name="name"  id="name" type="text" placeholder=" name" value="<?= $user['name']?>">
        <input name="email"  id="email" type="email" placeholder="email" value="<?= $user['email']?>">
        <input name="password"  id="password" type="password" placeholder="password">
        <input  name="room" id="room" type="room number" placeholder="room number" value="<?= $user['room']?>" >
        <input  name="ext" id="ext" type="ext number" placeholder="ext number" value="<?= $user['ext']?>">
        <input type="file" placeholder="uplode file" name="image" value="<?= $user['image']?>">
        <button type="submit" class="btn btn-primary">SAVE</button>
      </form>
    </div>
  </div>
  <script src="index.js"></script>
  <!-- <script src="assets/js/regester.js"></script> -->
</body>

</html>