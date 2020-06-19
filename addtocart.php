<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    include('header.php');

    ?>

<?php
require './includes/dbconfig.inc.php';
session_start();

if (isset($_SESSION['user']))
{

    $id = $_GET['id'];

    $user = $_SESSION['user'];
   
    
    $query3  = "SELECT * FROM cart WHERE userId = '$user' and productid= '$id' ";
    $result =mysqli_query($conn,$query3);
    

    if(mysqli_num_rows($result)>0){

      while($row = mysqli_fetch_assoc($result)){
      $increase = $row['quantity'];
    }

    $quantity =  $increase + 1;
    $query = "UPDATE cart set productid= '$id', userId = '$user', quantity='$quantity'
    where userId = '$user' and productid= '$id' ";

   
  }

  
  else {
  $quantity =1;
  $query = "INSERT INTO `cart`(`userId`, `productid`, quantity) VALUES ('$user','$id','$quantity')";


}


$result =mysqli_query($conn,$query);

    $query3  = "SELECT * FROM cart WHERE userId = $user";
   
    $result1 =mysqli_query($conn,$query3);
         
   
?>

    <div class="container">
      <div class="row">
        
       
          <div class="table-responsive">


            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>

              <?php
                              
                            
                          
    $totalamount = 0;
    $shipping = 0;

                 
               while($row = mysqli_fetch_assoc($result1)){
          
                  $proid = $row['productid'];
                  $quantity1=$row['quantity'];
                  
      
                    
              $query4  = "SELECT * FROM products WHERE productid = '$proid' ";
              
              
              $result2 = mysqli_query($conn,$query4);
    
               while($row = mysqli_fetch_assoc($result2)){
                  $imgsrc="uploads/".$row["productImage"];
    
                   
                  ?>
                <tr>
                  <th scope="row" class="border-0">

                    <div class="p-2">
                      <img src="<?php echo $imgsrc;?>" width="70">

                  
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $row['productName']?></a></h5>
                      </div>
                    </div>
                  </th>
                

                  <td class="border-0 align-middle"><strong><?php echo $row['productPrice']?> </strong></td>
                  <?php $totalamount =   $totalamount +($row['productPrice'] * $quantity1) ;

               }
                  ?>
                
                  <td class="border-0 align-middle">

                  <strong><?php echo $quantity1; ?></strong></td>
                 
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
              </tr>
              
 
             

                           
<?php  

     
    }

     
?>


<tr>
<td></td>
<?php 

              $shipping = ($totalamount * 0.005) ?>
             
              <td class="border-0 align-middle"> <strong>Shipping price </strong></td>
              <td class="border-0 align-middle"><strong>$<?php echo $shipping ?></strong> </td>

  </tr>
<tr>

              <td></td>
             
              <td class="border-0 align-middle"> <strong>Total Price </strong></td>
              <td class="border-0 align-middle"> <strong>$<?php echo ($shipping + $totalamount) ?></strong> </td>
              </tr>

</table>


         <div class="row bottom" style=margin:bottom;margin-left:25em; >
            <div class="form-group col-5" >

            <form action="buynow.php" method="post">

                <button type="submit"  name ="buy" class="btn btn-block btn-success" value="<?php echo ($shipping + $totalamount) ?>" >Buy Now</button>

                </form>
             </div>
            </div>



  
<?php
}

else{

  header( "Location: login.php");
}
?>

</body>
</html>


