
<?php include('server.php');?>

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
    <title>update_form</title>
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">

<?php 
    require_once('dbconfig.php');

    $id = $_GET['id'];
?>
    <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile02" name="image" >
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
  </div>
</div>

<div class="input-group mb-3">
  <input type="text" id="blog_title_U" name="blog_title_U" class="form-control" placeholder="blog title" aria-label="Recipient's username" aria-describedby="button-addon2">
</div>

<div class="input-group mb-3">
  <input type="text" id="blog_text_U" name="blog_text_U" class="form-control" placeholder="blog text" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:170px;">
</div>

<div class="input-group mb-3">
  <input type="text" id="id_U" name="id_U" class="form-control" placeholder="blog text" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?php echo $id ?>" style="display: none">
</div>

<input type="submit" class="btn btn-light btn-lg btn-block" name="update_now" value="post blog now">

    </form>

</body>
</html>