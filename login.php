
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/f84ba90e3b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="loggin_register_forget">
<div class="container">
<div class="card" style="width: 34rem; height: 50rem; background-color: #EE5A24;">
  <div class="card-body">
          <ul>
            <li class="active log">
            <h5 class="card-title"><i class="fas fa-sign-in-alt fa-2x" style="
    border: 5px solid white;
    padding: 25px;
    border-radius: 50%;
    color: white;
"></i></br><p class="ml-4">login</p></h5>
            </li>
            <li class="reg">
            <h5 class="card-title"><i class="fas fa-sign-in-alt fa-2x" style="
    border: 5px solid white;
    padding: 25px;
    border-radius: 50%;
    color: white;
"></i></br> <p class="ml-3">register</p></h5>
            </li>
            </ul>

    <h6 class="card-subtitle mb-2 text-muted show-hide2">Welcome Back</h6>
<form method="post" action="login.php">
<?php include('errors.php'); ?>
    <div class="input-group show-hide2">
  <div class="input-group-prepend">
    <div class="input-group-text">
    <i class="far fa-envelope fa-2x"></i>
    </div>
  </div>
  <input type="text" class="form-control show-hide2" name="email" require autocomplete="off" placeholder="enter your email" />
    </div>

    <div class="input-group show-hide2">
  <div class="input-group-prepend">
    <div class="input-group-text">
    <i class="fas fa-key fa-2x show-hide2"></i>
    </div>
  </div>
  <input type="password" class="form-control" name="password" require autocomplete="off" placeholder="enter your password" />

  <button type="submit" class="btn btn-lg btn-block button show-hide2" name="login_user"> LOGIN </button>
    </div>
</form>

    <form class="form2" method="post" action="login.php">
    <?php include('errors.php'); ?>
        <label for="firstName" class="show-hide1">firstName</label>
        <input type="text" class="form-control show-hide1" name="firstname" value="<?php echo $firstName; ?>" require autocomplete="off" placeholder="enter your firstName" />

        <label for="lastName" class="show-hide1">lastName</label>
        <input type="text" class="form-control show-hide1" name="lastname" value="<?php echo $lastName; ?>" require autocomplete="off" placeholder="enter your lastName" />

        <label for="email" class="show-hide1">email</label>
        <input type="text" class="form-control show-hide1" name="email" value="<?php echo $email; ?>" require autocomplete="off" placeholder="enter your email" />
        
        <label for="password" class="show-hide1">password</label>
        <input type="password" class="form-control show-hide1" name="password_1" require autocomplete="off" placeholder="enter your password" />

        <label for="password" class="show-hide1">password</label>
        <input type="password" class="form-control show-hide1" name="password_2" require autocomplete="off" placeholder="enter your password again" />

      <!-- <input type="button" class="btn btn-lg btn-block button show-hide2" value="LOGIN">
      <input type="button" class="btn btn-lg btn-block button show-hide1" value="REGISTR" name="reg_user"> -->

      <button type="submit" class="btn btn-lg btn-block button show-hide1" name="reg_user"> REGISTER </button>
    </form>

  </div>
  </div>
  </div>
    <script src="js/script.js"></script>
</body>
</html>
