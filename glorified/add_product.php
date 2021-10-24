<?php

    $con = mysqli_connect("localhost","root","","login_db");
    if(isset($_POST['submit'])){
        $name=ucwords(strtolower(TRIM($_POST['pname'])));
    		$site=ucfirst(strtolower(TRIM($_POST['psite'])));
        $catagory=strtoupper(TRIM($_POST['pcatagory']));
        $link=TRIM($_POST['plink']);
        $brand=strtoupper(TRIM($_POST['pbrand']));
        
        $imagename = $_FILES['pimg']['name']; //storing image name
        $tempimagename = $_FILES['pimg']['tmp_name']; //temp name 
        move_uploaded_file($tempimagename,"product_image/$imagename");
        
        $q = mysqli_query($con,"insert into product_table(p_name,p_site,p_catagory,p_image,p_link,p_brand) VALUES 
			('{$name}','{$site}','{$catagory}','{$imagename}','{$link}','{$brand}')") or die(mysqli_error($con));
		  if($q){
       		echo "<script>alert('Image Uploaded Successfully');</script>";
               //header("location:main_page.php");	
   
        }/*
        $result = mysqli_query($con,"select * from catagory where c_name='{$catagory}'") or die(mysqli_error($con));
		    $num_rows = mysqli_num_rows($result);
		    if($num_rows >= 1){

		    }else{
		    	$q = mysqli_query($con,"insert into signup_table(u_fname,u_lname,u_email,u_password) VALUES 
		    	('{$f_name}','{$l_name}','{$email}','{$password}')") or die(mysqli_error($con));
			    if($q){
       		echo "<script>alert('User Registered Successfully');</script>";
    		}
		  }*/
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <?php
	    include "header_admin.php";
	  ?>    
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Product </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Add Product</a></li>
                  <li class="breadcrumb-item active" aria-current="#">Add Product</li>
                </ol>
              </nav>
            </div>
            <div class="row" style="background-image: url('images/bg-01.jpg');">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Details About Product</h4>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Name</label>
                        <input type="text" name="pname" class="form-control"  placeholder="Enter The Product Name" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Choose Site</label>
                        <input type="text" name="psite" class="form-control"  placeholder="Enter The Site Name" required>
                      </div>

                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Choose Catagory</label>
                        <input type="text" name="pcatagory" class="form-control"  placeholder="Enter The Catagory" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Choose Brand</label>
                        <input type="text" name="pbrand" class="form-control"  placeholder="Enter The Brand Name">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Choose Image</label>
                        <input class="form-control" type="file" accept="image/*" name="pimg" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1">Prouduct Link</label>
                        <input type="text" name="plink" class="form-control"  placeholder="Enter The Link" required>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2" name="submit" >Add</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>              
</html>