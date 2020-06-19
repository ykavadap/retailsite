
<?php
require './includes/dbconfig.inc.php';
include('header.php');


session_start();
if (isset($_SESSION['user']))
{
    
$user = $_SESSION['user'];

$sql = "SELECT * FROM users WHERE userId = '$user'";

$result1 = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result1)){

    echo $user;

?>
<?php

if(isset($_POST['submitname'])){

    $name = $_POST['name'];
    echo $name;

    $sql = " UPDATE users SET userName = '$name' where userId = '$user' ";
    
    $query1 = mysqli_query($conn,$sql);

    echo "added";

}


if(isset($_POST['submitaddress'])){

    $address = $_POST['address'];
    echo $name;

    $sql = " UPDATE users SET userAddress = '$address' where userId = '$user' ";
    
    $query1 = mysqli_query($conn,$sql);

    echo "added";

}


if(isset($_POST['submitemail'])){

    $email = $_POST['email'];
    echo $name;

    $sql = " UPDATE users SET userAddress = '$email' where userId = '$user' ";
    
    $query1 = mysqli_query($conn,$sql);

    echo "added";

}

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
               <div>

                <img src="uploads/avatar.png" style="border-radius: 50%;width: 15em;height: 15em;" alt="Avatar">

                </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">

                        <form method="post">
                            <h6>Name:
                            <input type= "text" name="name" value=<?php echo $row['userName'] ?>>
                            <button type="submit" name="submitname" value=<?php echo $row['userName'] ?>>Update</button>
                            </h6>
                            <h6>
                            Address :
                            <input type="text" name="address" value=<?php echo $row['userAddress'] ?>>

                            <button type="submit" name="submitaddress" value=<?php echo $row['userAddress']?> >Update</button>
                            </h6>
                            <h6>Email :
                            <input type="text" name="email" value=<?php echo $row['email'] ?>>
                            <button type="submit" name="submitemail">Update</button>
                            </h6>
                            
                            </form>
                        </div>
                       </div>
                    <!--/row-->
                </div>
                <br>
                <br>
                <h6>Past Purchases </h6>



                

                <table class="table">
                <thead>
                <tr>
                <th> Purchase id </th>
                <th> Price </th>
                <th> Date       </th>
                </tr>
                <?php
                $sql = "SELECT * FROM purchases WHERE userId = '$user' ";

                $result = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_assoc($result)){

                    ?>
                <tr>
                
                <form method="post" action="">
                 <td>
                 <button type="submit" name="purchaseid" value="<?php echo $row['purchaseId']; ?>"><?php echo $row['purchaseId']; ?></button>
                  </td>
                            </form>
              
                <td> <?php echo $row['price']?> </td>
                <td> <?php echo $row['date']?> </td>

                </tr>
                <?php
             } 
             ?>
                </table>
        
<?php
 if(isset($_POST['purchaseid'])){ 
  
  $purchaseid=  $_POST['purchaseid'];

?>

<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">quantity</th>
                           
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                           

                           
                        </tr>
                    </thead>
                    <tbody >
                    <?php  
                        $sql="SELECT * from orders where purchaseId='$purchaseid'";

                        $result=mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                      
                        <tr>
                        <td><?php
                         printf ($row["quantity"]);

                              $pid=$row["productId"];?></td>

                               <?php $sql="SELECT * from products where productid='$pid'";

                              $result=mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_assoc($result)){
                              
                                ?>
                           
                            <td><?php printf ("%s",$row["productName"]);?></td>
                            <td><?php echo $row['productPrice']; ?></td>
                            <td></td>
                            
                        </tr>
                    <?php
                 }} 
                 ?>
                     
                    </tbody>
</table>

<?php
 } ?>
        
                   
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