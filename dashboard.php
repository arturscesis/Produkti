<?php
include('auth_session.php');
include('db.php');

$query = "SELECT * FROM `produkti`";
$products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

if(isset($_POST['submit'])){
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Manager - Panel</title>
    <style>
        .flex-container {
            display: flex;
        }

        .flex-container > div {
            background-color: #f1f1f1;
            margin: 10px;
            padding: 20px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-container"><?php
        foreach($products as $prod){?>
            <?php 
            $location_id = $prod['location_id'];
            $query = "SELECT * FROM `location` WHERE id='$location_id'";
            $location = $conn->query($query);

            $category_id = $prod['category_id'];
            $query = "SELECT * FROM `category` WHERE id='$category_id'";
            $category = $conn->query($query);
            ?>
            <div>
                <form class="form" method="post" name="product">
                    <h1 class="login-title"><?= $prod['name'] ?></h1>
                    <h4>Choose quantity for store:</h4><input type="int" class="login-input" name="quantity" placeholder="1 - <?= $prod['quantity'] ?>" min="1" max="<?= $prod['quantity'] ?>" required/><hr>
                    <h4>Brand: <?= $prod['brand'] ?></h4>
                    <h4>Price: <?= $prod['price'] ?>$</h4>
                    <label for="product_loc">Product location:</label>
                    <select name="product_loc" id="product_loc">
                        <?php foreach($location as $loc){?>
                            <option value="<?= $loc['id'] ?>"><?= $loc['location'] ?></option>
                    <?php }?>
                    </select><hr><?php
                    foreach($category as $cat){
                        ?> <p><?= $cat['category'] ?></p>
                    <?php }?>
                    <button type="submit" value="submit" name="submit" class="login-button">EDIT QUANTITY</button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>