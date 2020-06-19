
<html>
<head>
  <meta charset="utf-8">
  
  <base href="/">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<?php include('header.php');
?>

    <div class="container form">
        <center>
        <h1 >View Products</h1></center>
  <div>
    <div>
        <hr>
      
      
        
        <div class="container">
            <div class="row">
            <?php
      require './includes/dbconfig.inc.php';
      $check="DESCRIBE products";


      if(!isset($_GET['search'])){
      


         $query = "SELECT * FROM products";
         $result = mysqli_query($conn,$query);


        while($row = mysqli_fetch_assoc($result)){
           $imgsrc="retailsite/uploads/".$row["productImage"];
        ?>
            <div class="col-md-6">
                        
        <div class="card mb-3 shadow-sm">
            <img src="<?php echo $imgsrc;?>" style="width: 100%;height: 300px;object-fit: cover;">
       
              <h2 class="title"><?php printf ("%s",$row["productName"]);?></h2>
              
              
          <div class="bottom-wrap">
            <div class="h6">
              <span class="price-new">$<?php printf ("%s",$row["productPrice"]);?></span>
              
              <h6 class="title"><?php printf ("%s",$row["description"]);?></h6>
             

            </div>
            <a href='retailsite/addtocart.php?id=<?php echo $row['productid']?>' class="btn btn-block btn-dark">Add to Cart</a>
          </div> 
        </div>
            <br>
            <br>
            </div>
            <?php
          }
          ?>
        </div>
        </div>
          
    
      </div>
  </div>
</div>
<?php
} 


else
{
  $search = $_GET['search'];

  $searchquery = "SELECT * from products where productName LIKE '%$search%'" ;
  $result1 = mysqli_query($conn,$searchquery);

  while($row = mysqli_fetch_assoc($result1)){
    $imgsrc="retailsite/uploads/".$row["productImage"];

  ?><div class="col-md-6">
                        
  <div class="card mb-3 shadow-sm">
      <img src="<?php echo $imgsrc;?>" style="width: 100%;height: 300px;object-fit: cover;">
 
        <h2 class="title"><?php printf ("%s",$row["productName"]);?></h2>
        
        
    <div class="bottom-wrap">
      <div class="h6">
        <span class="price-new">$<?php printf ("%s",$row["productPrice"]);?></span>
        
        <h6 class="title"><?php printf ("%s",$row["description"]);?></h6>
       

      </div>
      <a href='retailsite/addtocart.php?id=<?php echo $row['productid']?>' class="btn btn-block btn-dark">Add to Cart</a>
    </div> 
  </div>
      <br>
      <br>
      </div>
<br>
<?php
}
}
?>



</body>
</html>
