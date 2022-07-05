<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cafeteria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
        </li>
       
      </ul>
      <img  src=<?="../uploads/".$_COOKIE['image']?> height="80px" width="80px" style="margin-right:20px ;"> <b>USER:<?=" " . $_COOKIE['name']?></b>
    </div>
  </div>
</nav>
