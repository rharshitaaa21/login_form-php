<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 9px 14px 10px 14px">
  <a class="navbar-brand" href="#">29Kreativ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
   
    </ul>
    <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  </div>
</nav>


    <div class="container">
        <h1 class="form-heading">Please Register</h1>
        <?php
    
if(isset($_POST["submit"]))
{
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirm-password"];
  $errors = array();
  if( empty($fullname) OR empty($email) OR empty($password) OR empty($confirmpassword))
  {
    array_push($errors, "All fields are required");

  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    array_push($errors, "Email is not valid");
  }
  if( strlen($password)<8)
  {
    array_push($errors,"Password must be 8 characters long");
  }
  if($password != $confirmpassword){
    array_push( $errors, " Password does not match");
  }

  if( count($errors)>0)
  {
    foreach( $errors as $error )
    {
      echo "<div class='alert alert-danger'>$error</div>";
    }
  }
  else{ }
}
        ?>

        <form action="registration.php" method="post" >
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password"  class="form-control"name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text"  class="form-control" name="confirm-password" placeholder="Confirm Password">
            </div>
            <div class="form-group ">
                <input type="submit" class="btn btn-success" value="Register" name="submit" >
            </div>
        </form>
    </div>
    
</body>
</html>