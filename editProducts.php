<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

<?php
include('header.php');

require './includes/dbconfig.inc.php';

session_start();

if(isset($_POST['productid'])){ 

$quantity = $_POST['quantity'];

$id = $_POST['productid'];


$sql = " UPDATE products SET productCount = '$quantity' where productid = '$id' ";

$query1 = mysqli_query($conn,$sql);
     
}


if(isset($_POST['delete'])){ 

$id = $_POST['delete'];

$delete = " DELETE from products  where productid = '$id' ";

$query2 = mysqli_query($conn,$delete);
     

}

 ?>

<h4> Edit Products </h4>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>

                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product Name</div>
                  </th>

                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Update</div>
                  </th>
                
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>

              </thead>
              <tbody>

              <?php
                                           
                    
              $query  = "SELECT * FROM products";
              
              
              $result2 = mysqli_query($conn,$query);
              
               while($row = mysqli_fetch_assoc($result2)){

                  $imgsrc="uploads/".$row["productImage"];
                              
                  ?>
                <tr>

                <form method ="POST" action="editProducts.php">

                  <th scope="row" class="border-0">

                    <div class="p-2">

                      <img src="<?php echo $imgsrc;?>" width="70">

                      <div class="ml-3 d-inline-block align-middle">
                       <td> <h5 class="mb-0"> <a  class="text-dark d-inline-block align-middle"><?php echo $row['productName']?></a></h5>
                      </td>
                     
                
                  <td class="border-0 align-middle"><strong><?php echo $row['productPrice']?> </strong></td>

                  <td class="border-0 align-middle"><strong><input type = "text" name="quantity" value =<?php echo $row['productCount']?>></strong></td>
                  
                  
                  <td class="border-0 align-middle"><button type="submit" class="fas fa-update" name="productid" value="<?php echo $row['productid']?>">Update</button></td>


                  <td class="border-0 align-middle"><button type="submit" class="fas fa-trash" name="delete" value="<?php echo $row['productid']?>"><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
              </tr>
           
              </div>
                    </div>
                  </th>
                  </form>

                           
<?php  
     }
    
?>

</table>
</body>
</html>


