<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cafeteria</title>
    <link href="css/index.css" rel="stylesheet">

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
          <a class="nav-link" href="#">My Orders</a>
        </li>
       
      </ul>
     <img src="img/team-3-800x800.jpg" height="80px" width="80px" style="margin-right:20px ;"> <span>userName</span>
    </div>
  </div>
</nav>


<section class="left_side" style="width:32%;display:inline-block">
    <form class="row g-3" style="margin: 20px 10px;">

        <div class="col-md-12">
            <h4 class="product">Tea</h4>
            <div class="counter">
                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" id="number" value="0" />
                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
            </div>
            <h4 style="display:inline-block;">EGP 25</h4>
        </div>

        <div class="col-md-12">
            <h4 class="product">Tea</h4>
            <div  class="counter">
                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" id="number" value="0" />
                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
            </div>
            <h4 style="display:inline-block;">EGP 25</h4>
        </div>


        <div class="col-md-12">
            <h4 class="product">Tea</h4>
            <div class="counter">
                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                <input type="number" id="number" value="0" />
            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
            </div>
            <h4 style="display:inline-block;">EGP 25</h4>
        </div>


        <div class="col-md-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                <label for="floatingTextarea">Notes</label>
            </div>
        </div>

        <div class="col-md-12">
                <label for="inputCategory" class="form-label">Rooms</label>
                    <select id="inputCategory" class="form-select">
                        <option selected>Choose...</option>
                        <option>222222</option>
                        <option>777777</option>
                        <option>888888</option>
                    </select>
        </div>

        <div class="col-md-12">
                <label for="inputCategory" class="form-label">EXT</label>
                    <select id="inputCategory" class="form-select">
                        <option selected>Choose...</option>
                        <option>2</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
        </div>
        <hr>
            <div class="col-md-8"></div>

            <div class="col-md-4">
                <input type="text" class="form-control" value="55 EGP" id="inputProduct" placeholder="Enter Product Name" readonly>
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-primary" style="width: 120px;margin-bottom: 10px;">Confirm</button>
            </div>

    </form>
</section>

<section class="right_side" style="width:60%;display:inline-block">
<div class="row g-3">
        <h4 style="text-align:center;font-weight: bold;">Latest Order</h4>
        <div class="card col-md-3">
        <img src="img/tea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Tea </h4>
            <h5 class="card-text">Price : 5 EPG </h5>
        </div>
        </div>
        <div class="card col-md-3">
        <img src="img/mango.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Mango </h4>
            <h5 class="card-text">Price : 20 EPG </h5>
        </div>
    </div>
    
    <hr>

    <h3 class="category">Hot Drinks</h3>
    <div class="card col-md-3">
        <img src="img/tea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Tea </h4>
            <h5 class="card-text">Price : 5 EPG </h5>
        </div>
    </div>

    <div class="card col-md-3">
        <img src="img/tea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Tea </h4>
            <h5 class="card-text">Price : 5 EPG </h5>
        </div>
    </div>

    <div class="card col-md-3">
        <img src="img/tea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Tea </h4>
            <h5 class="card-text">Price : 5 EPG </h5>
        </div>
    </div>

    <div class="card col-md-3">
        <img src="img/tea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Tea </h4>
            <h5 class="card-text">Price : 5 EPG </h5>
        </div>
    </div>


    <h3 class="category">Cold Drinks</h3>
    <div class="card col-md-3">
        <img src="img/mango.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Mango </h4>
            <h5 class="card-text">Price : 20 EPG </h5>
        </div>
    </div>

    <div class="card col-md-3">
        <img src="img/mango.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Mango </h4>
            <h5 class="card-text">Price : 20 EPG </h5>
        </div>
    </div>

   <div class="card col-md-3">
        <img src="img/mango.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Mango </h4>
            <h5 class="card-text">Price : 20 EPG </h5>
        </div>
    </div>

    <div class="card col-md-3">
        <img src="img/mango.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
            <h4 class="card-text">Mango </h4>
            <h5 class="card-text">Price : 20 EPG </h5>
        </div>
    </div>
    
</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>










</html>
