<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p class="show-hide1"><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<?php  if (count($errors2) > 0) : ?>
  <div class="error2">
  	<?php foreach ($errors2 as $error2) : ?>
  	  <p class="show-hide2"><?php echo $error2 ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
