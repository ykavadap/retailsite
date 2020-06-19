
<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Products</title>
    <link href="register.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <script src='https://www.google.com/recaptcha/api.js' async defer >   </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</head>
<body>


<?php
require './includes/dbconfig.inc.php';
include("imageUpload.php");
include('header.php');


if($conn === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}

$check="DESCRIBE products";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ 

    // Fetching variables of the form which travels in URL

    $productname= $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
       
    //storing the data in your database
    $sql="INSERT into products(
        productName, description, productPrice ,productImage,productCount ) 
        values ('$productname', '$description', '$price' , '$name', '$quantity')";



if(mysqli_query($conn,$sql))
{
       echo "Product add successfull";

    
    }
}
}

    $conn->close();
?>
      

<div class="container">

    <div id="login-form">
        <form method="post" enctype="multipart/form-data">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 align="center">Add Products here</h2>
                </div>
                <br>

                <div class="form-group">
                
                </div>

                <?php
                if (isset($errMSG)) {
                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                 <div class="row">
               
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="productname" class="form-control" style="width:10px;" placeholder="Product name" required/>
               
                </div>
            </div>
              <br>   

                <div class="row">
                
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="textarea" name="description" class="form-control" placeholder="Description" required/>
                    </div>
                
            </div>

               <br>

                <div class="row ">
           
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="price" class="form-control" placeholder="Price" required/>
                    </div>
               
            </div>

            <br>

            <div class="row ">
           
           <div class="input-group">
               <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
               <input type="text" name="quantity" class="form-control" placeholder="Quantity"/>
           </div>
      
   </div>

            <br>
            </div>

                Upload Image here 
                <input type="file" name="file"  />
                   
            
          
            <div class="row justify-content-center" style=margin:2em;width:78em;margin-left:-7em;>
            <div class="col-5">
                <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit">Add Product</button>
             </div>
            </div>

           <hr>

           <div class="row justify-content-center" style=margin:2em;width:78em;margin-left:-7em;>
            <div class="col-2">
                <a href="editProducts.php">Edit Products here</button>
             </div>
            </div>
            
        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>
