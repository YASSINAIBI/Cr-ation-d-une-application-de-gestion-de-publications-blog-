<?php include('server.php') ?>
<?php 

 //importing dbDetails file 
 require_once 'dbconfig.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_SESSION['email'])){

// $session_email = $_SESSION['email'];
// $sql2 =mysqli_query($con, "SELECT * FROM register WHERE email = '$session_email';");
// while($Regrow=mysqli_fetch_array($sql2)){
//     $Reg = $Regrow['id'];
//   echo "<html>
//   <head>
//   <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
//   </head>
//   <body>
//       <meta content='0 ; url=index.php'>
//   </body>
//   </html>";
// }
// $_SESSION['id'] = $Reg;



    $blog_title = mysqli_real_escape_string($con, $_REQUEST['blog_title']);
    $blog_text = mysqli_real_escape_string($con, $_REQUEST['blog_text']);
    $blog_id = mysqli_real_escape_string($con, $_REQUEST['blog_id']);

 //checking the required parameters from the request 
 if(isset($_FILES['image']['name'])){

 //getting file info from the request 
 $fileinfo = pathinfo($_FILES['image']['name']);

 //getting the file extension 
 $extension = $fileinfo['extension'];

 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
 	{
        echo 'Unknown image format.';
    }

//jpg-jpeg     
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
        $insert=mysqli_query($con, "INSERT INTO images (img , blog_title, blog_text, publication_id) VALUES ('$filename1', '$blog_title', '$blog_text', '$blog_id');");

        // REFRESH
        echo "
        <h1> the value of id is: $filename1 </h1>
        <h1> the value of id is: $blog_title </h1>
        <h1> the value of id is: $blog_text </h1>
        <h1> the value of id is: $blog_id </h1>
        ";

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
        $insert=mysqli_query($con, "INSERT INTO images (img , blog_title, blog_text, publication_id) VALUES ('$filename1', '$blog_title', '$blog_text', '$Reg');");

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
    $insert=mysqli_query($con, "INSERT INTO images (img , blog_title, blog_text, publication_id) VALUES ('$filename1', '$blog_title', '$blog_text', '$Reg');");

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
else{
    echo "<html>
    <head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>
    </head>
    <body>
        <meta http-equiv='REFRESH' content='0 ; url=index.php'>
        <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'you are not login',
            showConfirmButton: false,
            timer: 1500
          })
        </script>
    </body>
    </html>";
}
}
