<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="Login_v1/images/icons/logo.jpg"/>
  <title>Smart Home : Amader Adhunik Bari</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<style type="text/css">
  .bg{
    background: url("./image/backbuilding.jpg");
    background-repeat: no-repeat;
    background-size: cover;  
  }
  .custom-div{
        position: relative;
    top: 199px;
  }

 @media only screen and (max-width: 920px) {  
    .bg{
      background-size: 1500px; 
    }
}  
   @media only screen and (max-width: 720px) {  
    .bg{
      background-size: 1400px; 
    }
}  

  @media only screen and (max-width: 420px) {  
    .bg{
      background-size: 1350px; 
    }
}  
</style>
</head>

<body class="bg">
  <div class="container">
    <div class="row mt-4 custom-div">
      <div class="col-md-8 mx-auto bg-light rounded p-4">
        <a href="login.php"><button class = "btn btn-primary btn-sm">Back</button></a>
        <h5 class="text-center font-weight-bold">Smart Home:Amader Adhunik Bari search engine</h5>
        <hr class="my-1">
        <h5 class="text-center text-secondary">Write the place name where you want house</h5>
        <form action="searchdetails.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="The area example : Muradpur..." autocomplete="off" required>
            <div class="input-group-append">
              <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/scripttwo.js"></script>
</body>

</html>