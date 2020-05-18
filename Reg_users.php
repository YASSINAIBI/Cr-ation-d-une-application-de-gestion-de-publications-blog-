
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
    <title>your posts</title>
    <link rel="stylesheet" href="style/style2.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<header style="
    padding: 15px;
    background-color: #120136;
">
    <img src="logo.png" alt="logo" style="height: auto;width: 7%;">
    <p style="font-family: 'Indie Flower', cursive;position:absolute;left: 12%;top: -1%;font-size: 84px;color: aliceblue;">welcome to yours blogs</p>

    <input type="submit" class="btn btn-secondary btn-sm" value="your posts" style="
    position: absolute;
    left: 78%;
    top: 10%;
    width: 20%;
">

<?php  if (isset($_SESSION['email'])) : ?>
			<p style="color: chartreuse;width: 40%;position: absolute;left: 32%;top: 13%;font-size: 19px;"><strong><?php echo $_SESSION['email']; ?></strong></p>
			<a href="login.php?logout='1'"><input type="submit" class="btn btn-secondary btn-sm" value="logout" style="position: absolute;
    left: 78%;
    top: 10%;
    width: 20%;"></a>

<a href="index.php"><input type="submit" class="btn btn-secondary btn-sm" value="home" style="position: absolute;
    left: 78%;
    top: 5%;
    width: 20%;"></a>
    <?php endif ?>

</header>

<body>

<?php

require_once('dbconfig.php');

$this_id = $_SESSION['id'];
    $sql3 =mysqli_query($con, "SELECT * FROM images WHERE publication_id ='$this_id';");

echo "
<div class='all'>
<div class='container'>
<div class='row'>
";
    while($publicat_post=mysqli_fetch_array($sql3)) {
    $img = $publicat_post['img'];
    $blog_title = $publicat_post['blog_title'];
    $blog_text = $publicat_post['blog_text'];
    $id = $publicat_post['id'];
    echo "
    <div class='col-md-6'> 
    <div class='scene'>
        <div class='card'>
          <div class='card__face card__face--front'>
            <img src='$img' class='card-img-top' alt='img'>
          </div>
          <h5 class='card-title'>$blog_title . $id </h5>
          <div class='card__face card__face--back'>
          <p class='card-text'>$blog_text</p>
          </div>
        </div>
    </div>
    <a href='delete.php?id=$id'><input type='submit' class='btn btn-danger' value='delete' style='margin-top:8%'></a>
    <a href='update_form.php?id=$id'><input type='submit' class='btn btn-warning' value='update' style='margin-top:8%'></a>
</div>
    ";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    ?>
			<a href="login.php?logout='1'"><input type="submit" class="btn btn-secondary btn-sm" value="logout" style="position: absolute;
    left: 78%;
    top: 10%;
    width: 20%;"></a>
<script src="script/script.js"></script>
</body>
</html>
