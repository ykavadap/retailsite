<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<form  method="GET">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="nav-link" href="retailsite/viewProducts.php">Retail Site</a>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

    <li class="nav-item active ">
        <a class="nav-link " href="retailsite/login.php">Login </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="retailsite/profile.php">Profile</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="addtocart.php">Cart</a>
      </li>
    
     
    </ul>
    <div class="input-group col-md-4">
      <input class="form-control py-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <span class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fa fa-search"></i>
        </button>
      </span>
</div>

<a href="logout.php" style="color:white";><i class="fa fa-sign-out"></i> Logout</a>


  </div>
</nav>
</form>

</body>
</html>
