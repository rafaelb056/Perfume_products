<?php
include 'global/config.php';
include 'global/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Store of Perfume</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">logo de empresa</a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page">Home
              <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Carrito(0)</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdownId">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Action 2</a>
            </div>
          </li>
        </ul>
        <form class="d-flex my-2 my-lg-0">
          <input class="form-control me-sm-2" type="text" placeholder="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <br>
    <div class="alert alert-success" role="alert">
      <strong>Alert Heading</strong> <a href="#" class="badge badge-success">shoping car</a>
    </div>
    <div class="row justify-content-center align-items-center g-2">
    <?php
          $sentencia=$pdo->prepare("SELECT * FROM tblproducts");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          //print_r($listaProductos);
    ?>
    <?php foreach($listaProductos as $producto){?>
      <div class="col-3">
        <div class="card">
          <img 

          title="<?php echo $producto['Nombre'];?>" 
          alt="<?php echo $producto['Nombre'];?>" 
          class="card-img-top" 
          src="<?php echo $producto['Imagen'];?>" 
          data-toggle="popover" 
          data-trigger="hover" 
          data-content="<?php echo $producto['Descripcion'];?>"
          
          >
          <div class="card-body">
            <span><?php echo $producto['Nombre'];?><span>
                <h5><span><?php echo $producto['Creador'];?></span></h5>
                <h5 class="cart-title">USD<?php echo $producto['Precio'];?></h5>
                <p class="card-text">description</p>

                <button class="btn btn-primary" value="add" type="submit">add to cart</button>
          </div>
        </div>
      </div>
    <?php }?>    
    </div>
  </div>
  <script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>