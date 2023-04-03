    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    
<div class="container mt-4">
    <div class="row">
        <div class="col-2">
        <a href="?logout_admin">
            <button class="btn btn-secondary btn-sm" type="button">Quit</button>
        </a>        
        <a href="?page=products">
            <button class="btn btn-secondary btn-sm" type="button">Back</button>
        </a>
        </div>
        <h4><sub>Add product:</sub></h4>
    </div>
    <div class="row mt-3">
    
        <div class="col-3">
    <form method="POST" class="form-control">
        <label>Title</label>
        <input class="form-control" type="text" name="title" required>
        
        <label>About this item</label>
        <textarea class="form-control" type="text" name="inform" required></textarea>
        
        <label>Price</label>
        <input class="form-control" type="text" name="price" required>
        
        <label>Image</label>
        <input class="form-control" type="text" name="img" required>
        
        <label>Image size</label>
        <input class="form-control" type="number" placeholder="width" name="wid" required>
        
        <label></label>
        <input class="form-control" type="number" placeholder="height" name="het" required>
        
        <button class="btn btn-info mt-3" type="submit" name="add_product">Add</button>
    </form>
    </div>
    </div>
    <?php
        
        if(isset($_POST['add_product'])){
           
            $product_data = file_get_contents('../database/product.txt');
           
            $product_array = json_decode($product_data, true);
           
            $product_array[] = $_POST;
           
            $json = json_encode($product_array);
           
            file_put_contents('../database/product.txt', $json);
            
            header("Location: index.php?page=products");
            
        }
    ?>
    <?php
            $array = file_get_contents('../database/product.txt');
            $product_array = json_decode($array, true);
            //echo '<pre>'; print_r($user_array); echo '</pre>';            
    ?>
    <?php
        if(isset($_GET['delete'])){
            unset($product_array[$_GET['delete']]);
            $unset = json_encode($product_array);
            file_put_contents('../database/product.txt', $unset);
            header("Location: index.php?page=products");
        }
    ?>
     <?php
        if(isset($_GET['product_id'])){
            header("Location: index.php?page=products_edit");
        }
    ?>

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">About this item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($product_array as $key => $product):?>
                    <tr>
                        <td><?php echo $product['title'];?></td>
                        <td><?php echo $product['inform'];?></td>
                        <td><?php echo $product['price'];?></td>
                        <td><img src="<?php echo $product['img'];?>" alt="" width="<?php echo $product['wid'];?>px" height="<?php echo $product['het'];?>px"></td>
                        <div>
                        <td><a href="?page=edit&product_id=<?php echo $key;?>"><button class="btn btn-dark btn-sm" type="button">Edit</button>
                        </a></td>
                        </div>
                        <td><a href="?page=products&delete=<?php echo $key;?>"><button class="btn btn-danger btn-sm" type="button">Delete</button></a></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>


