<?php include('server.php') ?>
<?php

require_once 'dbconfig.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $blog_title = mysqli_real_escape_string($con, $_REQUEST['blog_title_U']);
    $blog_text = mysqli_real_escape_string($con, $_REQUEST['blog_text_U']);
    $id_U = mysqli_real_escape_string($con, $_REQUEST['id_U']);

    if(isset($_FILES['image']['name'])){

        //getting file info from the request 
        $fileinfo = pathinfo($_FILES['image']['name']);
       
        //getting the file extension 
        $extension = $fileinfo['extension'];

        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
        {
           echo 'Unknown image format.';
       }

       if($extension=="jpg" || $extension=="jpeg" )
    {
        $uploadedfile = $_FILES['image']['tmp_name'];
        $src = imagecreatefromjpeg($uploadedfile);
        list($width,$height)=getimagesize($uploadedfile);
        
        //set new width
        $newwidth1=350;
        $newheight1=($height/$width)*$newwidth1;
        $tmp1=imagecreatetruecolor($newwidth1,$newheight1);

        imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

        //new random name        
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
                
        $filename1 = "img/". $newfilename;

        imagejpeg($tmp1,$filename1,100);

        imagedestroy($src);
        imagedestroy($tmp1);
        //insert in database
        $insert=mysqli_query($con, "UPDATE images SET img='$filename1', blog_title='$blog_title', blog_text='$blog_text' WHERE id='$id_U'");
        // UPDATE images SET blog_title= 'yassinnnnneeeeee', blog_text='eeeeeeeeeeeeeeeeeeeeeeeeeefdkdsngdskgsdn' WHERE id= 25
        // REFRESH

        echo "<html>
        <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
        </head>
		<body>
			<meta http-equiv='REFRESH' content='0 ; url=index.php'>
			<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'your blog has been added succesfuly',
                showConfirmButton: false,
                timer: 3000
              })
			</script>
		</body>
        </html>";
    }

    //png
    else if($extension=="png")
    {
        $uploadedfile = $_FILES['image']['tmp_name'];
        $src = imagecreatefrompng($uploadedfile);
        list($width,$height)=getimagesize($uploadedfile);

        //set new width            
        $newwidth1=350;
        $newheight1=($height/$width)*$newwidth1;
        $tmp1=imagecreatetruecolor($newwidth1,$newheight1);
                
        imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);

        //new random name
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
                
        $filename1 = "img/". $newfilename;
                    
        imagejpeg($tmp1,$filename1,100);
        
        imagedestroy($src);
        imagedestroy($tmp1);

        //insert in database
        $insert=mysqli_query($con, "UPDATE images SET img='$filename1', blog_title='$blog_title', blog_text='$blog_text' WHERE id='$id_U'");

        echo "<html>
        <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
		</head>
		<body>
			<meta http-equiv='REFRESH' content='0 ; url=index.php'>
			<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'your blog has been added succesfuly',
                showConfirmButton: false,
                timer: 3000
              })
			</script>
		</body>
        </html>";
    }    
    else if($extension=="gif") {
    $uploadedfile = $_FILES['image']['tmp_name'];
    
    //new random name

    $temp = explode(".", $_FILES["image"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
                
    $filename1 = "img/". $newfilename;

	move_uploaded_file($uploadedfile,$filename1);

    //insert in database
    $insert=mysqli_query($con, "UPDATE images SET img='$filename1', blog_title='$blog_title', blog_text='$blog_text' WHERE id='$id_U'");

    echo "<html>
    <head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
    </head>
    <body>
        <meta http-equiv='REFRESH' content='0 ; url=index.php'>
        <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'your blog has been added succesfuly',
            showConfirmButton: false,
            timer: 3000
          })
        </script>
    </body>
    </html>";
    }


    
}
}

