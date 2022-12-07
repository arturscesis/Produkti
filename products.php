<?php
include('auth_session.php');
include('db.php');

$query = "SELECT * FROM `produkti`";
$products = $conn->query($query)->fetch_all(MYSQLI_ASSOC);

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
            border: solid black 3px;
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
                <h1 class="login-title"><?= $prod['name'] ?></h1>
                <h4>Quantity: <?= $prod['quantity'] ?><h4>
                <h4>Brand: <?= $prod['brand'] ?></h4>
                <h4>Price: <?= $prod['price'] ?>$</h4>
                <label for="product_loc">Product location:</label>
                <?php foreach($location as $loc){?>
                    <p><?= $loc['location'] ?></p>
                <?php }
                foreach($category as $cat){
                    ?> <p><?= $cat['category'] ?></p>
                <?php }?>
            </div>
        <?php } ?>
    </div>
</body>
</html>