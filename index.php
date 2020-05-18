
<?php
  include('server.php');

	if (!isset($_SESSION['email'])) {
    echo "
      <html>
      <head>
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
      </head>
      <body>
      <meta content='0 ; url=index.php'>
      <a href='login.php'><input type='submit' class='btn btn-secondary btn-sm' value='login' style='position: absolute;
      left: 78%;
      top: 10%;
      width: 20%;'></a>
			<script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'you must login first',
                showConfirmButton: false,
                timer: 3000
              })
			</script>
      </body>
      </html>
    ";
  }

  if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['email']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Bloger</title>
<header style="
    padding: 15px;
    background-color: #120136;
">
    <img src="logo.png" alt="logo" style="height: auto;width: 7%;">
    <p style="font-family: 'Indie Flower', cursive;position:absolute;left: 12%;top: -1%;font-size: 84px;color: aliceblue;">welcome to our blogs</p>

    <!-- <input type="submit" class="btn btn-secondary btn-sm" value="your posts" style="
    position: absolute;
    left: 78%;
    top: 10%;
    width: 20%;
"> -->

<?php  if (isset($_SESSION['email'])) : ?>
			<p style="color: chartreuse;width: 40%;position: absolute;left: 26%;top: 11%;font-size: 19px;"><strong><?php echo $_SESSION['email']; ?></strong></p>
			<a href="login.php?logout='1'"><input type="submit" class="btn btn-secondary btn-sm" value="logout" style="position: absolute;
    left: 78%;
    top: 10%;
    width: 20%;"></a>

<a href="Reg_users.php"><input type="submit" class="btn btn-secondary btn-sm" value="your post" style="position: absolute;
    left: 78%;
    top: 5%;
    width: 20%;"></a>
    <?php endif ?>

</header>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- <input type="file" name="image"/>
    <button type="submit">Upload</button> -->

    <?php 
    require_once('dbconfig.php');

    $session_email = $_SESSION['email'];
    $sql2 =mysqli_query($con, "SELECT * FROM 	register WHERE email = '$session_email';");
    while($Regrow=mysqli_fetch_array($sql2)){
        $Reg = $Regrow['id'];
      // echo "<h1> the value of id is:".$Reg."</h1>";
    }
    $_SESSION['id'] = $Reg;
?>

    <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" >
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
  </div>
</div>

<div class="input-group mb-3">
  <input type="text" id="blog_title" name="blog_title" class="form-control" placeholder="blog title" aria-label="Recipient's username" aria-describedby="button-addon2">
</div>

<div class="input-group mb-3">
  <input type="text" id="blog_text" name="blog_text" class="form-control" placeholder="blog text" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:170px;">
</div>

<div class="input-group mb-3">
  <input type="text" id="blog_id" name="blog_id" class="form-control" placeholder="blog text" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $Reg ?>" style="display: none">
</div>

<input type="submit" class="btn btn-light btn-lg btn-block" name="post_now" value="post blog now">

    </form>

    <?php 
      // echo "<h1> the value of id is:".$_SESSION['id']."</h1>";

    // echo "<h1> the value of id is:".$_SESSION['id']."</h1>";

    //     $query=mysql_query("SELECT * FROM user_login WHERE name = '$username' AND password = '$password');

    // $row=mysql_fetch_assoc($query);
    // $num=mysql_num_rows();

    // if($num==1)
    // {
    //     session_start(); 
    //     $_SESSION['user_id']= $row['user_id'];
    // }

    require_once('dbconfig.php');
    $sql =mysqli_query($con, "SELECT * FROM images;");

    echo "<div class='my_blog_img center' style='
    position: relative;
    top: 100px;
'>";
    echo "<div class='container'>";
    echo "<div class='row'>";
    while($row=mysqli_fetch_array($sql)) {
    $img = $row['img'];
    $blog_title = $row['blog_title'];
    $blog_text = $row['blog_text'];
    echo "
    <div class='col-md-4 col-sm-12'>
    <div class='card' style='margin-top: 30px;'>
    <img src='$img' class='card-img-top' alt='...'>
    <div class='card-body'>
    <h5 class='card-title'>$blog_title</h5>
    <p class='card-text'>'$blog_text'</p>
    </div>
    </div>
    </div>
    ";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    ?>
</body>
</html>
<!-- <div align='center'><img src='$img'></div> -->