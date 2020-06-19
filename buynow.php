<?php
require './includes/dbconfig.inc.php';
include('header.php');


session_start();

$user = $_SESSION['user'];

if(isset($_POST['buy'])){

    $price = $_POST['buy'];
    
    $sql = "INSERT into purchases (userId, price) values ('$user','$price') ";

    $query = mysqli_query($conn,$sql);


    $sql2 ="SELECT * FROM purchases  where userId ='$user' ORDER BY purchaseId DESC LIMIT 1";

    $query2 = mysqli_query($conn,$sql2);
    
  while($row = mysqli_fetch_assoc($query2)){
    $purchaseid= $row['purchaseId'];
  }


  $query="SELECT * from cart where userId = '$user'";
  $result=mysqli_query($conn,$query);
  while($row = mysqli_fetch_assoc($result)){

    $productid=$row['productid'];


    $quantity=$row['quantity'];

    $sql="INSERT INTO orders(purchaseId,productId,quantity) VALUES('$purchaseid','$productid','$quantity')";
    $result=mysqli_query($conn,$sql);
  }

  $query="DELETE FROM cart WHERE userid='$user'";
  $result=mysqli_query($conn,$query);

  $sql2 ="SELECT * from orders ORDER BY purchaseId DESC";
  $result=mysqli_query($conn,$sql2);
  while($row = mysqli_fetch_assoc($result)){
    $quantity=$row['quantity'];
    $productid=$row['productId'];

    $sql="SELECT * from products where productid='$productid'";
    $result=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $remaining=$row['productCount'];
    }

    $currentquantity=$remaining-$quantity;
    $sql="UPDATE products SET productCount='$currentquantity' where productid='$productid'";
    $result=mysqli_query($conn,$sql);
    
}

}
if (isset($_SESSION['user']))
{
    
$user = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE userId = '$user'";

$result1 = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result1)){

?>
<!DOCTYPE html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
        
           
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
            
                    <br>
                    <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing Information</h4>
          <form method ="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name: <?php echo $row['userName']?></label>
               
              </div>
              
            </div>
          
            <div class="mb-3">
              <label for="email">Email:  <?php echo $row['email']?> </label>
             
            </div>

            <div class="mb-3">
              <label for="address">Address: <?php echo $row['userAddress']?></label>
             
            </div>

             
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
           
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name"  required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number"  required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="password" class="form-control" id="cc-cvv" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
        
            <a href="test.php"  class="btn btn-primary btn-lg btn-block" id="submit" type="submit">Continue to checkout</a>
          
          </form>
        </div>
      </div>
               
            </div>
                                  
                </div>
               
            </div>
        </div>
       
    </div>
</div>
<?php
}
}
else{

    header( "Location: login.php");
  }
?>

</body>
</html>