<?php
require './includes/dbconfig.inc.php';


$check="DESCRIBE users";

if(mysqli_query($conn,$check)){

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL


    $name= $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];
    

    //storing the data in your database
    $sql="INSERT into users(
        userName, userAddress , password, userType ,email) 
        values ('$name','$address','$pass','user','$email')";



if(mysqli_query($conn,$sql))
{
    echo "User has been added";

    header( "Refresh:3; url=viewproducts.php", true, 303);

  
}
else{
    echo "Insert not successfull.";
   }
 
 
    }
    
    }
    


$conn->close();
?>

 
<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    
</head>
<body>
     

<div class="container">

    <div id="login-form">
        <form method="post" autocomplete="off"  onsubmit="return checkForm(this);">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 align="center">Register you account here</h2>
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
                 <div class="row justify-content-center">
                 <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="name" class="form-control" style="width:10px;" placeholder="Name" required/>
                    </div>
                </div>
            </div>
                 

                <div class="row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>
            </div>

                <div class="row justify-content-center">
                <div class="form-group col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password"
                               required/>
                    </div>
                </div>
            </div>
         
                <div class="row justify-content-center">
                <div class="form-group col-md-6 ">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="address" class="form-control" placeholder="Address" required/>
                    </div>
                </div>
            </div>
            

            
            <div class="row justify-content-center" style=margin:2em;width:78em;margin-left:-7em;>
            <div class="col-5">
                <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit">Register</button>
             </div>
            </div>

            <div class="form-group">
                 <hr/>
            </div>

            
        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>