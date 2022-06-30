<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cafeteria</title>
</head>
<body>
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
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Manual Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Checks</a>
        </li>
      </ul>
     <img src="team-3-800x800.jpg" height="80px" width="80px" style="margin-right:20px ;"> <span>Admin</span>
    </div>
  </div>
</nav>
<section>
<form class="row g-3" style="width: 80%;margin: 20px 355px;">

  <div class="col-md-6">
    <label for="inputProduct" class="form-label">Product</label>
    <input type="text" class="form-control" id="inputProduct" placeholder="Enter Product Name">
  </div>
  <br>
  <div class="col-md-6">
    <label for="inputPrice" class="form-label">Price</label>
    <input type="number" class="form-control" id="inputPrice">
  </div><br>

  <div class="col-md-6">
    <label for="inputCategory" class="form-label">Category</label>
    <select id="inputCategory" class="form-select">
      <option selected>Choose...</option>
      <option>Hot Drinks</option>
      <option>soft Drinks</option>
      <option>Cold Drinks</option>
    </select>
  </div>
  <div class="col-md-2">
    <a href="../admin_category/add_category.php" style="margin-top: 33px;display: inline-block;">Add category</a>
  </div>
  <div class="mb-3 col-md-6">
  <label for="formFile" class="form-label">Product Picture</label>
  <input class="form-control" type="file" id="formFile">
</div>
<div class="col-md-6">
</div>

  <div class="col-3">
    <button type="submit" class="btn btn-primary" style="width: 100px;">Save</button>
  </div>
  <div class="col-3">
    <button type="reset" class="btn btn-primary" style="width: 100px;">Reset</button>
  </div>
</form>
</section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


















</html>