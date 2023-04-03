    
 <?php
     $product_data = file_get_contents('../database/product.txt');
           
     $product_array = json_decode($product_data, true); 
     
     $product = $product_array[$_GET['product_id']];

 ?>

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
        <input value="<?php echo $product['title'];?>" class="form-control" type="text" name="title" required>
        
        <label>About this item</label>
        <textarea class="form-control" type="text" name="inform" required>
                <?php echo $product['inform'];?> 
        </textarea>
        
        <label>Price</label>
        <input value="<?php echo $product['price'];?>" class="form-control" type="text" name="price" required>
        
        <label>Image</label>
        <input value="<?php echo $product['img'];?>" class="form-control" type="text" name="img" required>
        
        <label>Image size</label>
        <input value="<?php echo $product['wid'];?>" class="form-control" type="number" placeholder="width" name="wid" required>
        
        <label></label>
        <input value="<?php echo $product['het'];?>" class="form-control" type="number" placeholder="height" name="het" required>
        
        <button class="btn btn-info mt-3" type="submit" name="edit_product">Edit</button>
    </form>
    </div>
    </div>

    <?php
        
        if(isset($_POST['edit_product'])){
           
            $product_data = file_get_contents('../database/product.txt');
           
            $product_array = json_decode($product_data, true);
           
            $product_array[$_GET['product_id']] = $_POST;
           
            $json = json_encode($product_array);
           
            file_put_contents('../database/product.txt', $json);
            
            header("Location: index.php?page=products");
            
        }
    ?>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
</script>
</html>


