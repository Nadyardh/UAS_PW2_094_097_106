<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
 
<head>
   <title>Index</title>
   <link rel="stylesheet" href="assets/style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
 
<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom sticky-sm-top" style="height: 80px;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-danger fs-4" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <form action="" method="POST" class="login-email">
                    <a href="logout.php" class="nav-link text-primary fw-bold fs-5"><i class="fas fa-sign-out-alt"></i>Logout</a>
                 </form>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid"">
        <div class="row align-items-md-stretch mt-lg-4">
          <div class="p-2 pb-4 border rounded-3 w-75 mx-auto text-center shadow-lg">
            <h1 class="text-danger fw-bolder my-lg-3" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Selamat datang <?php echo $_SESSION['username'] ."!"; ?></h1>
            <hr class="p-1 w-50 mx-auto">
          </div>
        </div>
      </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>