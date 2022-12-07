<?php
include('auth_session.php');
include('db.php');


$query = "SELECT * FROM `category`";
$categories = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

$query = "SELECT * FROM `location`";
$locations = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $location_id = $_POST['product_loc'];
    $category_id = $_POST['product_cat'];

    $query = "INSERT INTO `produkti` (name, quantity, brand, price, location_id, category_id) VALUES ('$name', '$quantity', '$brand', '$price', '$location_id', '$category_id')";
    $result = $conn->query($query);
    if($result){
        header("Location: admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Add Product - Admin</title>
</head>
<body>
    <form class="form" method="post" name="product">
        <h1 class="login-title">Add Product</h1>
        <input type="text" class="login-input" name="name" placeholder="Product name" autofocus="true" required/>
        <input type="int" class="login-input" name="quantity" placeholder="Product quantity" min="1" max="10" required/>
        <input type="text" class="login-input" name="brand" placeholder="Product brand" required/>
        <input type="int" class="login-input" name="price" placeholder="Product price" required/>
        <label for="product_loc">Product location:</label>
        <select name="product_loc" id="product_loc">
            <?php foreach($locations as $location){?>
                <option value="<?= $location['id'] ?>"><?= $location['location'] ?></option>
           <?php }?>
        </select><hr>
        <label for="product_cat">Product category:</label>
        <select name="product_cat" id="product_cat">
            <?php foreach($categories as $category){?>
                <option value="<?= $category['id'] ?>"><?= $category['category'] ?></option>
           <?php }?>
        </select><hr>
        <button type="submit" value="submit" name="submit" class="login-button">ADD PRODUCT</button>
  </form>
</body>
</html>