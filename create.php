<?php

// Establishing connection with DB
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
// If Error while connecting DB throw Exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $_SERVER['REQUEST_METHOD'].'<br>';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                                VALUES (:title, :image, :description, :price, :date)
                                ");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', "");
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':date', $date);
    $statement->execute();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Products CRUD</title>
  </head>
  <style>
      body{
          padding: 50px;
      }
  </style>
  <body>
    <h1>Create new Product</h1>
    <form action="" method="post">
    <div class="mb-3">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">
    </div>
    <div class="mb-3">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Product Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>